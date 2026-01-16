<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Product\StoreProductRequest;
use App\Services\BienTheService;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ProductService;
use App\Services\ThuongHieuService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $bientheService;
    protected $thuonghieuService;
    public function __construct(
        ProductService $productService,
        CategoryService $categoryService,
        BienTheService $bientheService,
        ThuongHieuService $thuonghieuService,
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->bientheService = $bientheService;
        $this->thuonghieuService = $thuonghieuService;
    }
    public function index(Request $request): View
    {
        $products = $this->productService->pagination($request);
        $breadcrumb = [
            ['title' => 'Danh sách sản phẩm', 'route' => 'products.index']
        ];
        return view('server.pages.products.index', compact(
            'breadcrumb',
            'products',
        ));
    }
    public function create(): View
    {
        $categories = $this->categoryService->getPublish();
        $bienthe = $this->bientheService->getTrangThai();
        $thuonghieu = $this->thuonghieuService->getTrangThai();
        $sku = 'SP' . time() . rand(1, 1000);
        $breadcrumb = [
            ['title' => 'Danh sách sản phẩm', 'route' => 'products.index'],
            ['title' => 'Thêm sản phẩm', 'route' => 'products.create']
        ];
        return view('server.pages.products.create', compact(
            'sku',
            'breadcrumb',
            'categories',
            'bienthe',
            'thuonghieu'
        ));
    }
    public function store(StoreProductRequest $request)
    {
        $products = $this->productService->create($request);
        if (!empty($request->bienthe_id)) {
            $products->bienthe()->attach($request->bienthe_id);
        }
        return redirect()->route('products.create')->with('success', 'Tạo mới sản phẩm thành công');
    }
    public function update() {}
    public function destroy(Request $request)
    {
        // $products = $this->productService->delete($request->id);
        dd($request->id);
    }
}
