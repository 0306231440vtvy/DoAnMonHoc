<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Import Model Post

class PageController extends Controller
{
    // === REQ 21: TRANG GIỚI THIỆU ===
    public function about() {
        return view('client.pages.about');
    }

    // === REQ 22 & 23: BLOG + TÌM KIẾM + PHÂN TRANG ===
    public function blog(Request $request) {
        // Khởi tạo query lấy bài viết đang active
        $query = Post::where('is_active', true);

        // Xử lý tìm kiếm (Req 23)
        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        // Sắp xếp bài mới nhất và Phân trang (Req 23 - mỗi trang 6 bài)
        $posts = $query->orderBy('created_at', 'desc')->paginate(6);

        return view('client.pages.blog.index', compact('posts'));
    }

    // Xem chi tiết bài viết (Tùy chọn thêm)
    public function blogDetail($id) {
        $post = Post::find($id);
        if(!$post) return abort(404);
        return view('client.pages.blog.detail', compact('post'));
    }
}