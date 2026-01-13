<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Category\StoreCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\ProductService;
use Illuminate\Http\Request;

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
        return view('server.pages.products.index', compact('products'));
    }
    public function create(): View
    {
        return view('server.pages.products.create');
    }
    public function update() {}
    public function destroy(Request $request)
    {
        dd($request->id);
    }
}
