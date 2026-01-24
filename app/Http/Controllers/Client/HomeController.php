<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use App\Models\Category;
use App\Services\SlideService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Models\Slide;
use App\Services\CartService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $slideService;
    protected $categoryService;
    protected $productService;
    protected $cartService;
    public function __construct(
        SlideService $slideService,
        CategoryService $categoryService,
        ProductService $productService,
        CartService $cartService,
    ) {
        $this->cartService = $cartService;
        $this->slideService = $slideService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }
    public function index(Request $request)
    {
        $sliderequest = new request();
        $slide = $this->slideService->pagination($sliderequest->merge([
            'type' => 'all',
            'sort' => 'stt,asc',
        ]));
        $sanphamRequest = new request();
        $sanphamRequest->merge([
            'trangthai' => 1,
        ]);
        $sanpham = $this->productService->pagination($sanphamRequest);
        $sanphamMoiRequest = clone $request;
        $sanphamMoiRequest->merge([
            'sort' => 'created_at,desc',
            'perpage' => 10,
        ]);
        $sanphamMoi = $this->productService->pagination($sanphamMoiRequest);
        return view('client.pages.home', compact(
            'slide',
            'sanphamMoi',
            'sanpham'
        ));
    }
    public function newProducts(Request $request)
    {
        $request->merge([
            'sort' => 'created_at,desc',
            'trangthai' => 1
        ]);
        $products = $this->productService->pagination($request);
        return view('client.pages.products.new', compact(
            'products',
        ));
    }
}
