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
        $products = $this->productService->pagination($request);
        // dd($products);
        $categories = $this->categoryService->pagination($request);
        return view('client.pages.products.index', compact(
            'products',
            'categories'
        ));
    }
    // ProductController.php
    // public function index(Request $request)
    // {
    //     $query = Sanpham::query();

    //     // 1. Từ khóa (tên hoặc mô tả)
    //     if ($request->filled('keyword')) {
    //         $query->where(function ($q) use ($request) {
    //             $q->where('tensp', 'like', '%' . $request->keyword . '%')
    //                 ->orWhere('mota', 'like', '%' . $request->keyword . '%');
    //         });
    //     }

    //     // 2. Danh mục
    //     if ($request->filled('category_id')) {
    //         $query->where('category_id', $request->category_id);
    //     }

    //     // 3. Giá từ
    //     if ($request->filled('price_from')) {
    //         $query->where('giaban', '>=', $request->price_from);
    //     }

    //     // 4. Giá đến
    //     if ($request->filled('price_to')) {
    //         $query->where('giaban', '<=', $request->price_to);
    //     }

    //     // 5. Phân trang + giữ query string
    //     $products = $query->paginate(12)->withQueryString();

    //     $categories = Category::all();

    //     return view('client.pages.products.index', compact('products', 'categories'));
    // }

    public function show(string $slug): View
    {
        // $products = $this->productRepository->findById($id);
        $products = Sanpham::where('slug', $slug);
        // dd($products);
        return view('client.pages.products.show', compact('products'));
    }
}
