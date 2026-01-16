<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class ProductService extends BaseService
{
    protected $repository;
    public function __construct(
        ProductRepository $repository
    ) {
        $this->repository = $repository;
    }
    protected function beforeCreate(Request $request, ?int $id = null): array
    {
        $data = $request->except(['_token', 'send']);
        $data['giaban'] = $this->sanitizePrice($data['giaban'] ?? 0);
        $data['discount'] = $this->sanitizePrice($data['discount'] ?? 0);
        // if ($request->hasFile('hinhanh')) {
        //     // $data['image'] = $this->uploadImage($request->file('image'));
        // }
        return $data;
    }
    private function sanitizePrice($price)
    {
        return (float) str_replace([',', '.', ' ', 'VNĐ'], '', $price);
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
}
