<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Trait\HasTransaction;
use Illuminate\Http\Request;

abstract class BaseService
{
    use HasTransaction;
    protected $repository;
    protected $perpage = 20;
    protected $with = [];
    protected $sort = ['id', 'asc'];
    // protected $field = ['name'];
    public function __construct(
        Baserepository $repository
    ) {
        $this->repository = $repository;
    }
    public function specifications(Request $request): array
    {
        return [
            'type' => $request->type === 'all',
            'sort' => $request->sort ? explode(',', $request->sort) : $this->sort,
            'with' => $this->with,
            'perpage' => $request->perpage ?? $this->perpage,
            // 'keyword' => [
            //     'q' => $request->keyword,
            //     'fields' => $this->field
            // ],
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
    public function create(Request $request)
    {
        try {
            $this->beginTransaction();
            $fillable = $this->repository->getFillable();
            $payload = $request->only($fillable);
            $model = $this->repository->create($payload);
            $this->commit();
            return $model;
        } catch (\Throwable $th) {
            $this->rollBack();
            throw $th;
        }
    }
    public function show(string $field, $value)
    {
        return $this->repository->findByField($field, $value);
    }
    public function getTrangThai()
    {
        return $this->repository->getTrangThai();
    }
    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
