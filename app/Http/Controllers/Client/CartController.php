<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Cart\CheckQuantityRequest;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use Illuminate\View\View;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    protected $userservice;
    protected $productservice;
    protected $cartRepository;
    protected $productRepository;
    public function __construct(
        CartService $cartService,
        CartRepository $cartRepository,
        ProductRepository $productRepository
    ) {
        $this->cartService = $cartService;
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $user_id = Auth::id();
        $carts = $this->cartRepository->cartIndex($user_id);
        $totals = $this->cartRepository->calculateTotals($carts);
        // dd($totals);
        return view('client.pages.carts.index', compact(
            'carts',
            'totals'
        ));
    }
    public function summary()
    {
        $summary = $this->cartRepository->getSummary();
        return response()->json($summary);
    }
    public function addToCart(Request $request)
    {
        $this->cartService->save($request);
        return response()->json([
            'success' => true,
            'message' => 'Đã thêm vào giỏ hàng'
        ]);
    }
    public function calculateSelected(Request $request)
    {
        $selectedIds = $request->input('cart_ids', []);
        $user = Auth::id();
        $carts = $this->cartRepository->findById($user);
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        $totals = $this->cartRepository->calculateTotals($carts, $selectedIds);

        return response()->json($totals);
    }
    public function updateQuantity(Request $request)
    {
        $this->cartService->updateQuantity(
            $request->cart_id,
            $request->type
        );
        return back();
    }
    //xóa 1 sản phẩm
    public function delete(Request $request)
    {
        $cart_id = $request->cart_id;
        if (Auth::id()) {
            $this->cartService->trash($cart_id);
            return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
        }
        return redirect()->back()->with('error', 'Lỗi trong quá trình xóa sản phẩm thành công');
    }
    // Xóa toàn bộ giỏ
    public function clear()
    {
        $this->cartRepository->clearCart(Auth::id());

        return response()->json(['success' => true]);
    }
}
