<?php

namespace App\Services;

use App\Models\SanphamVariant;
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
    protected function beforeCreate(Request $request): array
    {
        $data = $request->except(['_token', 'send']);
        $data['album'] = $this->convertToJsonArray($request->input('album', []));
        return $data;
    }
    protected function afterCreate($model, Request $request): void {}
    public function handleRelation(Request $request): self
    {
        // dd($request);
        $relations = $this->repository->getRelationable();
        if (count($relations)) {
            foreach ($relations as $relation) {
                if (
                    $request->has($relation) &&
                    $this->model->{$relation}() instanceof BelongsToMany
                ) {
                    $this->model->{$relation}()->sync($request->{$relation});
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
        }
        // Xóa variants cũ khi update
        $variantsData = $request->input('sanpham_variants');
        foreach ($variantsData as $variantData) {
            $variant = $this->model->sanpham_variants()->create([
                ...$variantData,
                'sku' => $variantData['sku'] ?? '',
                'giaban' => str_replace([',', '.'], ['', ''], $variantData['giaban']),
                'soluong' => (int)($variantData['soluong'] ?? 0),
            ]);
            // Xử lý attributes - attach từng cặp type_id và value_id
            if (isset($variantData['attributes']) && is_array($variantData['attributes'])) {
                $variant->attributesValues()->attach($variantData['attributes']);
            }
        }
    }
}
