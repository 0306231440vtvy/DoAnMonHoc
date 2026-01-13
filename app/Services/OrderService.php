<?php
namespace App\Services;

use App\Repositories\Order\OrderRepository;
use Exception;

class OrderService
{
    protected $orderRepo;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getUserOrders($userId)
    {
        return $this->orderRepo->getOrdersByUserId($userId);
    }

    public function cancelOrder($orderId, $userId)
    {
        $order = $this->orderRepo->findUserOrder($orderId, $userId);

        if (!$order) {
            throw new Exception("Đơn hàng không tồn tại.");
        }

        // Logic nghiệp vụ: Chỉ hủy được khi status = 1 (Ví dụ: 1 là Chờ xử lý)
        if ($order->status != 1) {
            throw new Exception("Không thể hủy đơn hàng đã được duyệt hoặc đang giao.");
        }

        // Cập nhật trạng thái sang Hủy (Ví dụ: 0 là Hủy)
        return $this->orderRepo->update($orderId, ['status' => 0]);
    }

    // Lấy danh sách cho Admin
    public function getAllOrdersAdmin($filters = [])
    {
        return $this->orderRepo->getAllOrders($filters);
    }

    // Lấy chi tiết cho Admin
    public function getOrderDetailAdmin($id)
    {
        return $this->orderRepo->getOrderDetail($id);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus($id, $status)
    {
        // Có thể thêm logic kiểm tra: ví dụ Đã hủy thì không được chuyển sang Hoàn thành...
        return $this->orderRepo->update($id, ['trangthai' => $status]);
    }
}