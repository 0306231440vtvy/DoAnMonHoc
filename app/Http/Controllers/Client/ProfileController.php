<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// Import thêm các Service cần thiết (UserService, ProductService...)

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Giả sử quan hệ trong Model User: $user->wishlist(), $user->reviewedProducts()
        // Mục 33: Sản phẩm yêu thích & Đã chấm điểm
        $favorites = $user->wishlist; 
        $reviewed = $user->reviewedProducts;

        // Mục 30: Trả về view kèm thông tin user
        return view('client.pages.profile.index', compact('user', 'favorites', 'reviewed'));
    }
}