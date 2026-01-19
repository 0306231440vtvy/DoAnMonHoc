<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Product\StoreProductRequest;
use App\Http\Requests\Server\Product\UpdateProductRequest;
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
        $products = $this->productService->pagination($request);
        return view('server.pages.products.index', compact(
            'products',
        ));
    }
    public function show($id)
    {
        dd($id);
    }
    public function create(): View
    {
        $categories = $this->categoryService->getPublish();
        $bienthe = $this->bientheService->getTrangThai();
        $thuonghieu = $this->thuonghieuService->getTrangThai();
        $sku = 'SP' . time() . rand(1, 1000);
        return view('server.pages.products.save', compact(
            'sku',
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
    public function edit($id)
    {
        $products = $this->productRepository->findById($id, ['categories', 'bienthe', 'thuonghieu']);
        //dd($products);
        $categories = $this->categoryService->getPublish();
        $bienthe = $this->bientheService->getTrangThai();
        $thuonghieu = $this->thuonghieuService->getTrangThai();
        return view('server.pages.products.update', compact(
            'products',
            'categories',
            'bienthe',
            'thuonghieu'
        ));
    }
    public function update(UpdateProductRequest $request, $id)
    {
        // dd($request);
        $products = $this->productService->update($request, $id);
        // dd($products);
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }
    public function delete($id)
    {
        $products = $this->productService->delete($id);
        // dd($products);
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
