<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\Product\StoreProductRequest;
use App\Http\Requests\Server\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Sanpham;
use App\Repositories\ProductRepository;
use App\Services\BienTheService;
use App\Services\CategoryService;
use Illuminate\View\View;
use App\Services\ProductService;
use App\Services\ThuongHieuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BienThe;

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
        // request()->merge([
        //     'with' => ['variants']
        // ]);
        $products = $this->productService->pagination($request);
        // dd($products);
        return view('server.pages.products.index', compact(
            'products',
        ));
    }
    public function show($id)
    {
        // ->leftJoin('order_details', function ($join) {
        //         $join->on('products.sku', '=', 'order_details.sku')
        //             ->orOn('product_variants.sku', '=', 'order_details.sku');
        //     })
        // $products = $this->productRepository->findById($id, ['thuonghieu', 'categories', 'variants']);
        $products = Sanpham::join('sanpham_variants', 'sanpham.id', '=', 'sanpham_variants.sanpham_id')
            ->select('sanpham_variants.soluong', 'sanpham_variants.id')
            ->join('sanpham_variants', 'sanpham_variants.id', '=', '')
            ->where('sanpham.id', '=', $id)
            ->get();
        dd($products);
    }
    public function create(): View
    {
        $categories = Category::where('publish', 1)->get();
        // dd($categories);
        $thuonghieu = $this->thuonghieuService->getTrangThai();
        $sku = 'SP' . time() . rand(1, 1000);
        $bienthe = BienThe::with(['bienthe_values' => function ($query) {
            $query
                ->where('trangthai', 1)
                ->orderBy('value', 'asc');
        }])
            ->where('trangthai', 1)
            ->orderBy('name')
            ->get();
        // $bienthe = DB::table('bienthe')
        //     ->join('bienthe_values', 'bienthe.id', '=', 'bienthe_values.bienthe_id')
        //     ->where('bienthe.trangthai', 1)
        //     ->orderBy('bienthe.id', 'asc')
        //     ->get();
        // dd($bienthe);
        return view('server.pages.products.save', compact(
            'sku',
            'categories',
            'thuonghieu',
            'bienthe'
        ));
    }
    public function store(StoreProductRequest $request)
    {
        // dd($request);
        $products = $this->productService->save($request);
        // dd($products);
        return redirect()->route('products.create')->with('success', 'Tạo mới sản phẩm thành công');
    }
    public function edit($id)
    {
        $products = $this->productRepository->findById($id, [
            'categories',
            'thuonghieu',
            'sanpham_variants' => function ($query) {
                $query->with(['attributesValues' => function ($q) {
                    $q->select(
                        'bienthe_values.id',
                        'bienthe_values.value',
                        'variant_attribute_values.variant_id'
                    );
                }]);
            }
        ]);
        //dd($products);
        $bienthe = BienThe::with(['bienthe_values' => function ($query) {
            $query
                ->where('trangthai', 1)
                ->orderBy('value', 'asc');
        }])
            ->where('trangthai', 1)
            ->orderBy('name')
            ->get();
        $categories = Category::where('publish', 1)->get();
        $bienthe = $this->bientheService->getTrangThai();
        $thuonghieu = $this->thuonghieuService->getTrangThai();
        $sku = $products->sku ?? '';
        $giaban = $products->giaban ?? 0;
        return view('server.pages.products.update', compact(
            'products',
            'categories',
            'thuonghieu',
            'bienthe',
            'sku',
            'giaban'
        ));
    }
    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->productService->save($request, $id);

        return redirect()
            ->route('products.index', $product)
            ->with('success', 'Cập nhật sản phẩm thành công');
    }
    public function delete($id)
    {
        $products = $this->productService->trash($id);
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
