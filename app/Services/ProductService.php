<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class ProductService extends BaseService
{
    protected $repository;
    protected $filterSearch = ['tensp'];
    protected $simpleFilter = ['trangthai'];
    protected $complexFilter = ['soluong'];
    public function __construct(
        ProductRepository $repository
    ) {
        $this->repository = $repository;
    }
    protected function beforeCreate(Request $request): array
    {
        $data = $request->except(['_token', 'send']);
        $data['album'] = $this->convertToJsonArray($request->input('album', []));
        return $data;
    }
    protected function afterCreate($model, Request $request): void
    {
        if (!empty($request->bienthe_id)) {
            $model->bienthe()->attach($request->bienthe_id);
        }
        if (!empty($request->category_id)) {
            $model->categories()->attach($request->category_id);
        }
    }
    protected function beforeUpdate(Request $request, ?int $id): array
    {
        $data = $request->except(['_token', 'send']);
        $oldProduct = $this->repository->find($id);
        $oldAlbum = $oldProduct ? ($oldProduct->album ?? []) : [];
        $newAlbum = $this->convertToJsonArray($request->input('album', []));
        $data['album'] = $newAlbum;
        $data['album'] = $this->convertToJsonArray($request->input('album', []));
        return $data;
    }
    protected function afterUpdate($model, Request $request): void
    {
        if (!empty($request->bienthe_id)) {
            $model->bienthe()->attach($request->bienthe_id);
        }
        if (!empty($request->category_id)) {
            $model->categories()->attach($request->category_id);
        }
    }
}
