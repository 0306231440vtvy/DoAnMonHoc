<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Order\OrderRepository;

use Illuminate\Http\Request;

class CheckoutService extends BaseService
{
    protected $repository;
    protected $payload;
    protected function prepageModeldata(Request $request): self
    {
        $fillable = $this->repository->getFillable();
        $payload = $request->only($fillable);
        $this->modelData = $payload;
        return $this;
    }
    public function __construct(
        OrderRepository $repository,
    ) {
        $this->repository = $repository;
    }
    public function handleRelation(Request $request): self
    {
        $relations = $this->repository->getRelationable();
        if (count($relations)) {
            foreach ($relations as $key => $relation) {
                // nếu có belongs to many thì xử lý tự động thêm sync có trong laravel
                if ($request->has($relation)) {
                    // {} là gọi dữ liệu động method quan hệ
                    $this->model->{$relation}()->sync($request->$relation);
                }
            }
        }
        $this->handleOrderDetails($request);
        return $this;
    }
    private function handleOrderDetails(Request $request)
    {
        if (!$request->has('ct_hoadon')) {
            return $this;
        }
        foreach ($request->chiTiet as $ct_hoadonData) {
            $ct_hoadon = $this->model->chiTiet([
                ...$ct_hoadonData,
                'thanhtien' => $ct_hoadonData['thanhtien'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
