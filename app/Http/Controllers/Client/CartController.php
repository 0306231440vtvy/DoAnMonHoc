<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\CartService;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    protected $userservice;
    protected $productservice;
    public function __construct( 
        CartService $cartService
    )
    {
        $this->cartService = $cartService;
    }
    public function index(CartService $cartService)
    {
        $user = auth()->user();
        $cart = $cartService->getCart($user->id);
        return view('client.pages.carts.index', ['cartItems' => $cart['cartItems'],
                                                             'totalItems'=> $cart['totalItems']]);
    }

    public function summary(Request $request, CartService $cartService)
    {
        $data = $request->validate([
            'checked_items' => 'array',
            'checked_items.*' => 'integer',
            'discount_percent' => 'nullable|integer|min:0|max:100',
        ]);

        $summary = $cartService->calSummary(
            auth()->id(),
            $data['checked_items'] ?? []
        );

        return response()->json($summary);
    }
    public function updateQuantity(Request $request, CartService $cartService)
    {
        $data = $request->validate([
            'cart_item_id' => 'required|integer',
            'type' => 'required|in:plus,minus',
        ]);

        $result = $cartService->updateQuantity(
            auth()->id(),
            $data['cart_item_id'],
            $data['type']
        );

        return response()->json($result);
    }

    //Xoas 1 sản phẩm
    public function deleteItem(Request $request, CartService $cartService)
    {
        $data = $request->validate([
            'sanpham_id' => 'required|integer',
        ]);

        $cartService->deleteItem(
            auth()->id(),
            $data['sanpham_id']
        );

        return response()->json(['success' => true]);
    }

    // Xóa toàn bộ giỏ
    public function clear(CartService $cartService)
    {
        $cartService->clearCart(auth()->id());

        return response()->json(['success' => true]);
    }
    
    public function checkoutPrepare(Request $request, CartService $cartService)
    {
        $data = $request->validate([
            'checked_items' => 'required|array|min:1',
            'checked_items.*' => 'integer',
        ]);

        $checkout = $cartService->getCheckoutData(
            auth()->id(),
            $data['checked_items']
        );

        session()->put('checkout', $checkout);

        return response()->json(['success' => true]);
    }
}
