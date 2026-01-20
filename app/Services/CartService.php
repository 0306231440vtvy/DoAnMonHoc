<?php

namespace App\Services;

use App\Models\Giohang;
use App\Repositories\CartRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;

class CartService extends BaseService
{
    protected $repository;
    public function __construct(
        CartRepository $repository
    ) {
        $this->repository = $repository;
    }

    //Lấy toàn bộ giỏ hàng
    public function getCart($user_Id){
        $cartItems = $this->repository->getCartItemsByUser($user_Id);
        $totalItems = $cartItems->count();
        return [
            'cartItems'=> $cartItems,
            'totalItems'=> $totalItems
        ];
    }

    //Hàm lấy các sản phẩm dduocj check để tính tổng tiền
    public function calSummary($user_Id, array $checked_items){
        if(empty($checked_items)){
            return [
                'totalQuantity' => 0,
                'totalPrice' =>0,
            ];
        }

        $items = $this->repository->getCheckedItems($user_Id, $checked_items); 
        $checkedItems = $items->map(function ($item) {
            $price = $item->sanpham->giaban;
            $discount = $item->sanpham->discount;

            $finalPrice = $price * (100 - $discount) / 100;

            return [
                    'id' => $item->sanpham_id,
                    'name' => $item->sanpham->tensp,
                    'quantity' => $item->soluong,
                    'price' => $finalPrice,
                    'origin_price' => $price,
                    'discount' => $discount,
                    'total' => $finalPrice * $item->soluong,
                ];
        });

        return [
            'checkedItems' => $checkedItems,
            'totalQuantity' => $checkedItems->sum('quantity'),
            'totalPrice' => $checkedItems->sum('total'),
        ];
    }


    public function updateQuantity($userId, $sanpham_Id, $type)
    {
        $item = $this->repository
            ->findByProductAndUser($sanpham_Id, $userId);

        if (!$item) {
            throw new \Exception('Cart item not found');
        }

        if ($type === 'plus') {
            $item->soluong += 1;
        } else {
            $item->soluong = max(1, $item->soluong - 1);
        }

        $this->repository->saveQuantity($sanpham_Id,$userId,  $item->soluong);

        $items = $this->repository->getCartItemsByUser($userId);

        return [
            'itemQuantity'  => $item->soluong,
        ];
    }

    public function deleteItem($userId, $sanphamId)
    {
        $this->repository->deleteCartItem($userId, $sanphamId);
    }

    public function clearCart($userId)
    {
        $this->repository->clearCart($userId);
    }
    public function getCheckoutData($userId, array $checkedItems)
    {
        $items = $this->repository->getCheckedItems($userId, $checkedItems);

        if ($items->isEmpty()) {
            throw new \Exception('Không có sản phẩm hợp lệ');
        }

        foreach ($items as $item) {
        if ($item->sanpham->soluong < $item->soluong) {
            return [
                'success' => false,
                'message' => "Sản phẩm {$item->sanpham->tensp} đã hết hàng"
                ];
            }
        }
            $checkedItems = $items->map(function ($item) {
            $price = $item->sanpham->giaban;
            $discount = $item->sanpham->discount; // %

            $finalPrice = $price * (100 - $discount) / 100;

            return [
                'sanpham_id' => $item->sanpham_id,
                'ten' => $item->sanpham->tensp,
                'gia_goc' => $price,
                'discount' => $discount,
                'gia_sau_giam' => $finalPrice,
                'so_luong' => $item->soluong,
                'thanh_tien' => $finalPrice * $item->soluong,
            ];
        });

        return [
            'items' => $checkedItems,
            'totalQuantity' => $checkedItems->sum('so_luong'),
            'totalPrice' => $checkedItems->sum('thanh_tien'),
            'totalDiscount' => ($checkedItems->sum('gia_goc') - $checkedItems->sum('gia_sau_giam')),
        ];
    }
}
