<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Cart\CheckQuantityRequest;
use App\Models\Giohang;
use App\Models\SanphamVariant;
use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use Illuminate\View\View;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sanpham;

class CartController extends Controller
{
    protected $cartService;
    protected $userservice;
    protected $productService;
    protected $cartRepository;
    protected $productRepository;
    public function __construct(
        CartService $cartService,
        CartRepository $cartRepository,
        ProductRepository $productRepository,
        ProductService $productService
    ) {
        $this->cartService = $cartService;
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }
    public function index()
    {
        $user_id = Auth::id();
        $carts = $this->cartRepository->cartIndex($user_id);
        $totals = $this->cartRepository->calculateTotals($carts);
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
    // public function addToCart(Request $request)
    // {
    //     $request->validate([
    //         'sanpham_id' => 'required|exists:products,id',
    //         'variant_id' => 'required|exists:product_variants,id',
    //         'soluong' => 'required|integer|min:1',
    //     ]);
    //     $user = Auth::user();
    //     if (!$user) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Vui lòng đăng nhập'
    //         ], 401);
    //     }
    //     $cart = Giohang::firstOrCreate([
    //         'user_id' => $user->id
    //     ]);
    //     $item = GioHang::firstOrCreate(
    //         [
    //             'user_id' => Auth::id(),
    //             'sku' => $request->sku
    //         ],
    //         [
    //             'soluong' => 0
    //         ]
    //     );
    //     $variant = SanphamVariant::where('sku', $request->sku)->first();
    //     if ($item->soluong + $request->soluong > $variant->soluong) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Vượt quá số lượng tồn kho'
    //         ], 422);
    //     }
    //     $item->increment('soluong', $request->soluong ?? 1);
    //     return response()->json([
    //         'success' => true,
    //         'cart_count' => GioHang::where('user_id', $user->id)->sum('soluong')
    //     ]);
    // }
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
            ->where('sanpham_id', $productId)
            ->where('variant_id', $variantId) // Nếu bạn có lưu biến thể
            ->first();

        if ($cartItem) {
            $cartItem->soluong += $quantity;
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
        return back()->with('success', 'Cập nhật giỏ hàng thành công');
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
