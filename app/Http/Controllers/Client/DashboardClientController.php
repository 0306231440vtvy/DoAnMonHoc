<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SlideService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardClientController extends Controller
{
    protected $slideService;
    protected $categoryService;
    protected $productService;
    public function __construct(
        SlideService $slideService,
        CategoryService $categoryService,
        ProductService $productService
    ) {
        $this->slideService = $slideService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }
    public function index(Request $request): View
    {
        $slides = $this->slideService->pagination($request);
        $categories = $this->categoryService->pagination($request);
        $products = $this->productService->pagination($request);
        return view('client.pages.home', compact(
            'slides',
            'categories',
            'products'
        ));
    }
}
