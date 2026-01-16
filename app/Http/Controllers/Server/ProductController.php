<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Product\StoreProductRequest;
use App\Repositories\ProductRepository;
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
    protected $productRepository;
    public function __construct(
        ProductRepository $productRepository,
        ProductService $productService,
        CategoryService $categoryService,
        BienTheService $bientheService,
        ThuongHieuService $thuonghieuService,
    ) {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->bientheService = $bientheService;
        $this->thuonghieuService = $thuonghieuService;
    }
    public function index(Request $request): View
    {
        $products = $this->productService->index();
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
        return view('server.pages.products.save', compact(
            'sku',
            'breadcrumb',
            'categories',
            'bienthe',
            'thuonghieu'
        ));
    }
    public function store(StoreProductRequest $request)
    {
        // dd($request);
        $products = $this->productService->save($request);
        return redirect()->route('products.create')->with('success', 'Tạo mới sản phẩm thành công');
    }
    public function update($id)
    {
        $products = $this->productRepository->findById($id, ['categories', 'bienthe', 'thuonghieu']);
        $categories = $this->categoryService->getPublish();
        $bienthe = $this->bientheService->getTrangThai();
        $thuonghieu = $this->thuonghieuService->getTrangThai();
        $breadcrumb = [
            ['title' => 'Danh sách sản phẩm', 'route' => 'products.index', 'params' => []],
            ['title' => 'Cập nhật sản phẩm', 'route' => 'products.update', 'params' => ['id' => $id]]
        ];
        return view('server.pages.products.save', compact(
            'products',
            'breadcrumb',
            'categories',
            'bienthe',
            'thuonghieu'
        ));
    }
    public function edit() {}
    public function delete($id)
    {
        $products = $this->productService->delete($id);
        dd($products);
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }
}
