<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Giohang;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(
        CartService $cartService,
    ) {
        $this->cartService = $cartService;
    }
    public function index(Request $request): View
    {
        $request->merge(
            [
                'user_id' => auth()->id(),
                // 'with' => ['users', 'sanpham'],
            ]
        );
        $carts = $this->cartService->pagination($request);
        // dd($carts);
        return view('client.pages.carts.index', compact(
            'carts'
        ));
    }


        public function addToCart(Request $request)
    {
        // Kiểm tra đăng nhập
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để mua hàng!');
        }

        $userId = auth()->id();
        $productId = $request->product_id;
        $variantId = $request->variant_id;
        $quantity = $request->quantity;

        // Lấy giá từ biến thể
        $product = Sanpham::findOrFail($productId);
        $price = $product->variants->where('id', $variantId)->first()->giaban ?? 0;

        // Kiểm tra sản phẩm đã tồn tại trong giỏ chưa
        $cartItem = Giohang::where('user_id', $userId)
                            // ->where('sanpham_id', $productId)
                            // ->where('variant_id', $variantId) // Nếu bạn có lưu biến thể
                            ->first();

        if ($cartItem) {
            $cartItem->soluong += $quantity;
            $cartItem->giaban = $price;
            $cartItem->save();
        } else {
            Giohang::create([
                'user_id' => $userId,
                'sanpham_id' => $productId,
                'variant_id' => $variantId,
                'giaban' => $price,
                'soluong' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

}
