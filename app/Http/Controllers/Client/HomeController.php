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
        // 1. Lấy sản phẩm mới nhất (8 sản phẩm)
        // Đã xóa ->where('publish', 1) để tránh lỗi
        $newProducts = Sanpham::orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        // 2. Lấy danh mục nổi bật
        // Lưu ý: Nếu bảng categories cũng chưa có cột 'publish' thì bạn xóa đoạn ->where('publish', 1) đi nhé
        $categories = Category::where('publish', 1)->take(3)->get();
        // Nếu lỗi ở dòng trên, hãy sửa thành: $categories = Category::take(3)->get();

        // 3. Lấy sản phẩm nổi bật/ngẫu nhiên
        // Đã xóa ->where('publish', 1) để tránh lỗi
        $hotProducts = Sanpham::inRandomOrder()
            ->take(4)
            ->get();
        $sliderequest = clone request();
        $slide = $this->slideService->pagination($sliderequest->merge([
            'sort' => 'stt,asc',
            'perpage' => 4
        ]));
        // $sanphamMoi = Sanpham::with(['thuonghieu', 'sanpham_variants', 'categories'])
        //     ->where('trangthai', 1)
        //     ->whereNull('deleted_at')
        //     ->orderBy('created_at', 'desc')
        //     ->limit(10)
        //     ->get();
        // $danhMucNoiBat = Category::with(['sanphams' => function($query) {
        //         $query->where('trangthai', 1)
        //             ->whereNull('deleted_at')
        //             ->with(['thuonghieu', 'sanpham_variants'])
        //             ->limit(10);
        //     }])
        //     ->where('trangthai', 1)
        //     ->whereHas('sanphams')
        //     ->limit(5)
        //     ->get();
        //  $sanpham = Sanpham::with(['thuonghieu', 'sanpham_variants', 'categories'])
        //     ->where('trangthai', 1)
        //     ->whereNull('deleted_at');

        // // Xử lý sắp xếp
        // if(request()->has('sort')) {
        //     switch(request('sort')) {
        //         case 'price_asc':
        //             $sanpham->orderBy('giaban', 'asc');
        //             break;
        //         case 'price_desc':
        //             $sanpham->orderBy('giaban', 'desc');
        //             break;
        //         case 'newest':
        //             $sanpham->orderBy('created_at', 'desc');
        //             break;
        //         case 'bestseller':
        //             $sanpham->withCount(['chiTietHoadon as total_sold' => function($query) {
        //                 $query->select(DB::raw('COALESCE(SUM(soluong), 0)'));
        //             }])->orderBy('total_sold', 'desc');
        //             break;
        //     }
        // } else {
        //     $sanpham->orderBy('created_at', 'desc');
        // }

        // $sanpham = $sanpham->paginate(20);
        $sanphamMoi = $this->productService->pagination($request);
        // $danhMucNoiBat
        // dd($sanphamMoi);
        return view('client.pages.home', compact(
            'newProducts',
            'categories',
            'hotProducts',
            'slide',
            'sanphamMoi'
        ));
    }
    // public function newProducts()
    // {
    //     $sanpham = Sanpham::with(['thuonghieu', 'sanpham_variants', 'categories'])
    //         ->where('trangthai', 1)
    //         ->whereNull('deleted_at')
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(20);

    //     return view('client.products.index', [
    //         'sanpham' => $sanpham,
    //         'title' => 'Sản Phẩm Mới'
    //     ]);
    // }
    // public function bestsellerProducts()
    // {
    //     $sanpham = Sanpham::with(['thuonghieu', 'sanpham_variants', 'categories'])
    //         ->where('trangthai', 1)
    //         ->whereNull('deleted_at')
    //         ->withCount(['chiTietHoadon as total_sold' => function ($query) {
    //             $query->select(DB::raw('COALESCE(SUM(soluong), 0)'));
    //         }])
    //         ->orderBy('total_sold', 'desc')
    //         ->paginate(20);

    //     return view('client.products.index', [
    //         'sanpham' => $sanpham,
    //         'title' => 'Sản Phẩm Bán Chạy'
    //     ]);
    // }
    // public function categoryShow($slug)
    // {
    //     $category = Category::where('slug', $slug)
    //         ->where('trangthai', 1)
    //         ->firstOrFail();

    //     $sanpham = $category->sanphams()
    //         ->with(['thuonghieu', 'sanpham_variants'])
    //         ->where('trangthai', 1)
    //         ->whereNull('deleted_at')
    //         ->paginate(20);

    //     return view('client.products.index', [
    //         'sanpham' => $sanpham,
    //         'title' => $category->name,
    //         'category' => $category
    //     ]);
    // }
}
