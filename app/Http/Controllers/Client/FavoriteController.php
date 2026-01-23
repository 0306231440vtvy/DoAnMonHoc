<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FavoriteController extends Controller
{
    // 1. Hiển thị danh sách yêu thích
    public function index()
    {
        /** @var \App\Models\User $user */  // <--- Thêm dòng này
        $user = Auth::user();
        // Lấy danh sách sản phẩm user đã thích (có phân trang)
        $favorite = $user->yeuthich()->paginate(10); 
        
        return view('client.pages.profile.favorite.index', compact('favorite'));
    }

    // 2. Xử lý Thêm/Xóa yêu thích (Toggle)
    public function toggle($id)
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'Vui lòng đăng nhập để sử dụng tính năng này!');
        }

        $user = Auth::user();
        
        // Hàm toggle cực hay: Nếu có rồi thì xóa, chưa có thì thêm
        // Tham số thứ 2 dùng để chèn thêm dữ liệu vào cột phụ (ngaythem)
        /** @var \App\Models\User $user */  // <--- Thêm dòng này
        $result = $user->yeuthich()->toggle([$id => ['ngaythem' => Carbon::now()]]);

        // Kiểm tra kết quả để thông báo
        if (count($result['attached']) > 0) {
            return redirect()->back()->with('success', 'Đã thêm vào danh sách yêu thích!');
        } else {
            return redirect()->back()->with('success', 'Đã bỏ yêu thích!');
        }
    }
}