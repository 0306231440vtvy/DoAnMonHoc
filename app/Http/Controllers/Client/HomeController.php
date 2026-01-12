<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
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

        return view('client.pages.home', compact('newProducts', 'categories', 'hotProducts'));
    }
}