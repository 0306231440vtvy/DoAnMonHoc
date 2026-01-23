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

   
    // public function show($products) 
    // {
    // // Lấy sản phẩm theo ID
    // // Load kèm theo các biến thể và giá trị (màu, size) của chúng
    // $product = Sanpham::with([
    //     'variants',                          // Lấy các dòng giá/kho
    //     'variants.attributeValues',          // Chạy tiếp qua bảng trung gian lấy Màu/Size
    //     'variants.attributeValues.attributeType' // Chạy tiếp lấy tên loại "Màu sắc" hay "Kích thước"
    // ])->findOrFail($products);

    // return view('client.pages.products.show', compact('product'));
    // }
    
        public function show($products) 
    {
        $product = Sanpham::with(['variants.attributeValues.attributeType','binhluans.user'])->findOrFail($products);

        $product->increment('view');
        // Lấy tất cả các giá trị (ví dụ: Trắng, Đen, S, M) từ tất cả biến thể
        // Sau đó gom nhóm chúng theo tên loại (Màu sắc, Kích thước)
        $groupedAttributes = $product->variants->flatMap->attributeValues
            ->groupBy(function($item) {
                return $item->attributeType->name; // Nhóm theo "Màu sắc" hoặc "Kích thước"
            })
            ->map(function($group) {
                return $group->pluck('value')->unique(); // Chỉ lấy tên giá trị và không trùng lặp
            });

            $relatedProducts = Sanpham::where('category_id', $product->category_id) // Dùng category_id thay vì iddanhmuc
                ->where('id', '!=', $product->id)
                ->where('trangthai', '<>', 0)
                ->withAvg('binhluans', 'danhgia') // Tính trung bình cột danhgia
                ->take(5) // Lấy 5 sản phẩm cho đẹp giao diện
                ->get();

        return view('client.pages.products.show', compact('product', 'groupedAttributes','relatedProducts'));
    }
    

        public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // 1. XỬ LÝ AJAX (Gợi ý nhanh khi đang gõ vào ô tìm kiếm)
        if ($request->ajax()) {
            $products = Sanpham::where(function($q) use ($keyword) {
                    $q->where('tensp', 'LIKE', "%$keyword%")
                    ->orWhere('mota', 'LIKE', "%$keyword%");
                })
                ->with('variants')
                ->limit(5)
                ->get();

            $output = '';
            foreach ($products as $item) {
                $price = number_format($item->variants->first()->giaban ?? 0, 0, ',', '.');
                $img = asset('client/img/' . basename($item->hinhnen));
                $url = route('client.products.show', $item->id);

                $output .= "
                    <a href='{$url}' class='list-group-item list-group-item-action d-flex align-items-center p-2'>
                        <img src='{$img}' style='width: 45px; height: 45px; object-fit: cover;' class='me-3 border rounded'>
                        <div>
                            <div class='fw-bold small text-dark'><i class='fa-solid fa-magnifying-glass me-1 opacity-50'></i>{$item->tensp}</div>
                            <div class='text-danger small fw-bold'>{$price}đ</div>
                        </div>
                    </a>";
            }
            return $products->isEmpty() ? '<div class="p-3 text-center text-muted small">Không thấy sản phẩm</div>' : $output;
        }

        // 2. XỬ LÝ TRANG KẾT QUẢ (Khi nhấn nút Lọc hoặc Enter)
        $query = Sanpham::query()->with('variants');

        // Lọc theo từ khóa (Tên hoặc Mô tả)
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('tensp', 'LIKE', "%$keyword%")
                ->orWhere('mota', 'LIKE', "%$keyword%");
            });
        }

        // Lọc theo giá tối thiểu (Tìm trong bảng variants)
        if ($minPrice) {
            $query->whereHas('variants', function($q) use ($minPrice) {
                $q->where('giaban', '>=', $minPrice);
            });
        }

        // Lọc theo giá tối đa (Tìm trong bảng variants)
        if ($maxPrice) {
            $query->whereHas('variants', function($q) use ($maxPrice) {
                $q->where('giaban', '<=', $maxPrice);
            });
        }

        // Phân trang và giữ lại các tham số trên URL (để khi sang trang 2 không bị mất kết quả lọc)
        $products = $query->paginate(10)->withQueryString();

        return view('client.pages.products.search_results', compact('products', 'keyword'));
    }


    

    public function toggle($id) {
        $user = auth()->user();
        // Kiểm tra xem đã thích chưa
        $isFavorite = $user->favorites()->where('sanpham_id', $id)->exists();

        if ($isFavorite) {
            $user->favorites()->detach($id); // Bỏ thích
            return response()->json(['status' => 'removed']);
        } else {
            $user->favorites()->attach($id); // Thêm thích
            return response()->json(['status' => 'added']);
        }
    }

}
