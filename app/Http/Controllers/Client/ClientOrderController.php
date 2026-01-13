<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientOrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    // Mục 31: Danh sách đơn hàng
    public function index()
    {
        $orders = $this->orderService->getUserOrders(Auth::id());
        return view('client.pages.profile.orders.index', compact('orders'));
    }

    // Mục 32: Hủy đơn hàng
    public function cancel($id)
    {
        try {
            $this->orderService->cancelOrder($id, Auth::id());
            return redirect()->back()->with('success', 'Hủy đơn hàng thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}