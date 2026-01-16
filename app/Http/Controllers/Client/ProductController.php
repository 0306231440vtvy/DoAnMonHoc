<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(
        ProductService $productService
    ) {
        $this->productService = $productService;
    }
    public function index(Request $request): View
    {
        $products = $this->productService->pagination($request);
        return view('client.pages.products.index', compact('products'));
    }
    public function show(): View
    {
        return view('client.pages.products.show');
    }
}
