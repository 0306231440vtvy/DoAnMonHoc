<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sanpham;
use App\Repositories\ProductRepository;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $productService;
    protected $productRepository;
    protected $categoryService;
    public function __construct(
        ProductRepository $productRepository,
        ProductService $productService,
        CategoryService $categoryService,
    ) {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index(Request $request): View
    {
        $product = $this->productService->pagination($request);
        // dd($products);
        $categories = $this->categoryService->pagination($request);
        return view('client.pages.products.index', compact(
            'product',
            'categories'
        ));
    }
    public function show(string $slug): View
    {
        $products = Sanpham::where('slug', $slug)
            ->with([
                'categories',
                'thuonghieu',
                'sanpham_variants.attributesValues'
            ])
            ->firstOrFail();
        return view('client.pages.products.show', compact('products'));
    }
}
