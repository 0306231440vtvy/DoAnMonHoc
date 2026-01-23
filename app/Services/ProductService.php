<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductService extends BaseService
{
    protected $repository;
    protected $filterSearch = ['tensp'];
    protected $simpleFilter = ['trangthai'];
    protected $complexFilter = ['soluong'];
    protected $sort = ['created_at', 'desc'];
    protected $perpage = 10;
    protected $with = ['categories', 'thuonghieu', 'sanpham_variants'];
    public function __construct(
        ProductRepository $repository
    ) {
        $this->repository = $repository;
    }
    protected function prepageModeldata(Request $request): self
    {
        $fillable = $this->repository->getFillable();
        $payload = $request->only($fillable);
        $this->modelData = $payload;
        return $this;
    }
    public function handleRelation(Request $request): self
    {
        // dd($request);
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
        $this->handleProductVariants($request);
        return $this;
    }
    private function handleProductVariants(Request $request)
    {
        if (!$request->has('sanpham_variants') || !is_array($request->input('sanpham_variants'))) {
            return $this;
        };
        $variantsData = $request->input('sanpham_variants');
        if (!is_array($variantsData) || empty($variantData)) {
            $this->model->sanpham_variants()->each(function ($variants) {
                $variants->attributesValues()->detach();
                $variants->delete();
            });
            return $this;
        };
        foreach ($variantsData as $variantData) {
            $variant = $this->model->sanpham_variants()->create([
                ...$variantData,
                'sku' => $variantData['sku'] ?? '',
                'giaban' => str_replace([',', '.'], ['', ''], $variantData['giaban']),
                'soluong' => (int)($variantData['soluong'] ?? 0),
                'trangthai' => $request->trangthai ?? 1,
            ]);
            // Xử lý attributes - attach từng cặp type_id và value_id
            if (isset($variantData['attributes']) && is_array($variantData['attributes'])) {
                $variant->attributesValues()->attach($variantData['attributes']);
            }
        }
    }
}
