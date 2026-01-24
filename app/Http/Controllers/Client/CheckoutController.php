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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $checkout = session('checkout', [
            'items' => [],
            'totalPrice' => 0,
            'totalDiscount' => 0
        ]);
        $provinces = $this->provinceRepository->index();
        return view('client.pages.checkout.index', compact(
            'provinces',
            'checkout'
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
    public function store(CheckoutRequest $request, CheckoutService $service)
    {
        $checkout = session('checkout');
        $order = $service->createOrder(
            Auth::id(),
            $request->validated(),
            $checkout
        );
        session()->put('order_success_id', $order['id']);
        session()->forget('checkout');

        if ($request->payment_method === 'bank') {
            return redirect()->route('checkout.bank', $order);
        }
        return redirect()->route('checkout.thanhcong');
    }
    public function bank(HoaDon $order)
    {
        $order->load(['chiTiet.sanpham']);
        return view('client.pages.checkout.bank', compact('order'));
    }
    public function success()
    {
        // Không cho truy cập trực tiếp
        if (!session()->has('order_success_id')) {
            return redirect('/')
                ->with('error', 'Không thể truy cập trang này');
        }
        $orderId = session('order_success_id');
        // Lấy hóa đơn + chi tiết + sản phẩm
        $order = Hoadon::with(['chiTiet.sanpham'])
            ->where('id', $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        // Xóa session để tránh reload lại tạo đơn
        session()->forget('order_success_id');
        return view('client.pages.checkout.success', compact('order'));
    }
}
