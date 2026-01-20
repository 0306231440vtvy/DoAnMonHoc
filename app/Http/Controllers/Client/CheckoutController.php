<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProvinceRepository;
use App\Repositories\WardRepository;

use App\Models\Province;
use App\Models\Ward;
use App\Models\Hoadon;
use App\Models\CtHoaDon;
use App\Models\Giohang;
use App\Http\Requests\CLient\Checkout\CheckoutRequest;
use App\Services\CheckoutService;
class CheckoutController extends Controller
{
    protected $wardRepository;
    protected $provinceRepository;
    public function __construct(
        WardRepository $wardRepository,
        ProvinceRepository $provinceRepository
    ) {
        $this->wardRepository = $wardRepository;
        $this->provinceRepository = $provinceRepository;
    }
        public function index()
    {
        if (!session()->has('checkout')) {
            return redirect('/cart')
                ->with('error', 'Vui lòng chọn sản phẩm để thanh toán');
        }

        $checkout = session('checkout');

        return view('client.pages.checkout.index', compact('checkout'));
    }

    public function provinces()
    {
        return response()->json(
            Province::select('id', 'name')->get()
        );
    }
    public function wards($province_ID)
    {
        $province = Province::findOrFail($province_ID);
        return response()->json(
            Ward::where('province_code', $province->province_code)
                ->select('id', 'name')
                ->get()
        );
    }

    public function store(CheckoutRequest $request, CheckoutService $service)
    {
        // dd($request->all());
        // dd($request->validated());
        $checkout = session('checkout');

        $order = $service->createOrder(
            auth()->id(),
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
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Xóa session để tránh reload lại tạo đơn
        session()->forget('order_success_id');

        return view('client.pages.checkout.success', compact('order'));
    }
}
