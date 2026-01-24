<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sanpham;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService
    ) {
        $this->productService  = $productService;
        $this->categoryService = $categoryService;
    }
    public function index(Request $request): View
    {
        // Tạo request merge với các params cần thiết
        $baseRequest = clone $request;
        // Lấy query từ repository model
        $query = Sanpham::query();
        // Áp dụng keyword search
        if ($request->filled('keyword')) {
            $query->where('tensp', 'LIKE', '%' . $request->keyword . '%');
        }
        // Filter theo category (many-to-many)
        if ($request->filled('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category_id);
            });
        }
        // Filter theo giá (relation sanpham_variants)
        if ($request->filled('min_price')) {
            $query->whereHas('sanpham_variants', function ($q) use ($request) {
                $q->where('giaban', '>=', $request->min_price);
            });
        }
        if ($request->filled('max_price')) {
            $query->whereHas('sanpham_variants', function ($q) use ($request) {
                $q->where('giaban', '<=', $request->max_price);
            });
        }
        // Eager load
        $query->with(['categories', 'thuonghieu', 'sanpham_variants']);
        // Pagination
        $product = $query->paginate(20)->withQueryString();
        $categories = Category::where('publish', 1)->get();
        return view('client.pages.products.index', compact(
            'product',
            'categories'
        ));
    }
    public function show($slug)
    {
        // Tìm theo slug thay vì id
        $product = Sanpham::where('slug', $slug)
            ->with([
                'categories',
                'thuonghieu',
                'sanpham_variants.attributesValues.attributeType',
                'binhluan.user'
            ])
            ->firstOrFail();
        // Tăng lượt xem
        $product->increment('view');
        // Lấy variant mặc định
        $defaultVariant = $product->sanpham_variants->first();
        // Lấy tất cả ảnh từ album của các variants (loại bỏ trùng lặp)
        $albumImages = $product->sanpham_variants
            ->pluck('album')
            ->filter() // Loại bỏ null
            ->flatMap(function ($album) {
                // Album có thể là JSON array hoặc string
                return is_array($album) ? $album : json_decode($album, true) ?? [];
            })
            ->unique()
            ->values();
        // Nhóm attributes theo type
        $groupedAttributes = $product->sanpham_variants
            ->flatMap->attributesValues
            ->groupBy(function ($item) {
                return optional($item->attributeType->first())->name;
            })
            ->map(fn($group) => $group->unique('id')->values());
        // Lấy ID categories để tìm sản phẩm liên quan
        $categoryIds = $product->categories->pluck('id');
        // Sản phẩm liên quan
        $relatedProducts = Sanpham::whereHas('categories', function ($q) use ($categoryIds) {
            $q->whereIn('categories.id', $categoryIds);
        })
            ->where('id', '!=', $product->id)
            ->where('trangthai', '!=', 0)
            ->withAvg('binhluan', 'danhgia')
            ->with('sanpham_variants')
            ->take(5)
            ->get();

        return view('client.pages.products.show', compact(
            'product',
            'defaultVariant',
            'groupedAttributes',
            'relatedProducts',
            'albumImages'
        ));
    }
    public function toggle($id)
    {
        $user = auth()->user();

        if ($user->favorites()->where('sanpham_id', $id)->exists()) {
            $user->favorites()->detach($id);
            return response()->json(['status' => 'removed']);
        }

        $user->favorites()->attach($id);
        return response()->json(['status' => 'added']);
    }
}
