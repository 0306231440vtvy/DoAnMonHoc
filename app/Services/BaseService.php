<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Trait\HasTransaction;
use Illuminate\Http\Request;

abstract class BaseService
{
    use HasTransaction;
    protected $repository;
    protected $type;
    protected $perpage = 20;
    protected $sort = ['id', 'asc'];
    protected $with = [];
    protected $filterSearch = ['name'];
    protected $simpleFilter = ['publish'];
    protected $complexFilter = ['dongia'];
    public function __construct(
        Baserepository $repository
    ) {
        $this->repository = $repository;
    }
    private function buildFilter(Request $request, array $filter = []): array
    {
        $condition = [];
        if (count($filter)) {
            foreach ($filter as $key => $val) {
                if ($request->has($val)) {
                    $condition[$val] = $request[$val];
                }
            }
        }
        return $condition;
    }
    public function specifications(Request $request): array
    {
        return [
            'type' => $request->type === 'all' ?? $this->type,
            'perpage' => $request->perpage ?? $this->perpage,
            'sort' => $request->sort ? explode(',', $request->sort) : $this->sort,
            'with' => $this->with,
            'keyword' => [
                'q' => $request->keyword,
                'fields' => $this->filterSearch,
            ],
            'filter' => [
                'simple' => $this->buildFilter($request, $this->simpleFilter),
                'complex' => $this->buildFilter($request, $this->complexFilter)
            ],
        ];
    }
    public function pagination(Request $request)
    {
        $specs = $this->specifications($request);
        return $this->repository->pagination($specs);
    }
    public function index()
    {
        return $this->repository->index();
    }
    public function save(Request $request, ?int $id = null)
    {
        try {
            $this->beginTransaction();
            // xử lý raw data
            $processedData = $this->beforeCreate($request, $id);
            // lọc filter
            $fillable = $this->repository->getFillable();
            $payload = collect($processedData)->only($fillable)->toArray();
            $model = $this->repository->create($payload);
            $this->afterCreate($model, $request);
            $this->commit();
            return $model;
        } catch (\Throwable $th) {
            $this->rollBack();
            throw $th;
        }
    }
    //  hàm để xử lý dữ liệu trước khi tạo dữ liệu
    protected function beforeCreate(Request $request, ?int $id)
    {
        // mặc định trả về tất cả dữ liệu
        return $request->all();
    }
    // hàm trả về sau khi tạo dữ liệu
    protected function afterCreate($model, Request $request): void {}
    public function show(string $field, $value)
    {
        return $this->repository->findByField($field, $value);
    }
    // lấy trạng thái
    public function getTrangThai()
    {
        return $this->repository->getTrangThai();
    }
    // xóa vĩnh viễn
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}
