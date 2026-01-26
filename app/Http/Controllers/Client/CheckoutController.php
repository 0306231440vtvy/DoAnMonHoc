<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProvinceRepository;
use App\Repositories\UserRepository;
use App\Repositories\CartRepository;
use App\Services\CartService;
use App\Services\OrderService;
use App\Models\Hoadon;
use App\Http\Requests\CLient\Checkout\CheckoutRequest;
use App\Models\Ward;
use App\Services\CheckoutService;
use App\Repositories\WardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $wardRepository;
    protected $provinceRepository;
    protected $cartRepository;
    protected $userRepository;
    protected $cartService;
    protected $orderService;
    public function __construct(
        WardRepository $wardRepository,
        ProvinceRepository $provinceRepository,
        UserRepository $userRepository,
        CartRepository $cartRepository,
        OrderService $orderService,
        CartService $cartService,
    ) {
        $this->wardRepository = $wardRepository;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;
        $this->cartRepository = $cartRepository;
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }
    public function index(Request $request)
    {
        $cartIds = $request->get('cart_ids', []);
        if (empty($cartIds)) {
            return redirect()->route('carts.index')
                ->with('error', 'Vui lòng chọn sản phẩm để thanh toán');
        }

        $user_id = Auth::id();
        $allCarts = $this->cartRepository->cartIndex($user_id);
        $selectedCarts = array_filter($allCarts, function ($cart) use ($cartIds) {
            return in_array($cart['cart_id'], $cartIds);
        });

        if (empty($selectedCarts)) {
            return redirect()->route('carts.index')
                ->with('error', 'Sản phẩm không tồn tại');
        }
        $totals = $this->cartRepository->calculateTotals($selectedCarts);
        $totalDiscount = array_reduce($selectedCarts, function ($sum, $cart) {
            return $sum + ($cart['giaban'] * $cart['cart_quantity'] * $cart['discount'] / 100);
        }, 0);

        $checkout = [
            'items' => array_map(function ($cart) {
                // dd($cart);
                return [
                    'cart_id' => $cart['cart_id'],
                    'ten' => $cart['tensp'],
                    'so_luong' => $cart['cart_quantity'],
                    'gia_goc' => $cart['giaban'],
                    'thanh_tien' => $cart['subtotal'],
                    'hinhnen' => $cart['hinhnen'],
                    'discount' => $cart['discount'],
                ];
            }, $selectedCarts),
            'totalPrice' => $totals['totalAmount'],
            'totalQuantity' => $totals['totalQuantity'],
            'totalDiscount' => $totalDiscount,
            'finalPrice' => $totals['totalAmount'] - $totalDiscount,
        ];
        $provinces = $this->provinceRepository->index();
        return view('client.pages.checkout.index', compact(
            'provinces',
            'checkout',
            'totals',
            'selectedCarts',
            'cartIds'
        ));
    }
    // API lấy phường/xã theo quận/huyện
    public function getWards($provinceCode)
    {
        // $wards = $this->wardRepository->findByField('province_code', $provinceCode)->values();
        $wards = Ward::where('province_code', $provinceCode)
            ->select('ward_code', 'name')
            ->orderBy('name')->get();
        return response()->json($wards);
    }
    public function success()
    {
        return view('client.pages.checkout.success')->with('success', 'Thanh toán thành công');
    }
    public function store(CheckoutRequest $request)
    {
        // dd($request->all());
        $order = $this->cartService->save($request);
        return redirect()->route('checkout.success');
    }
}
