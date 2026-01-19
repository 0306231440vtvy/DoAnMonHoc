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
        return [
            'totalQuantity' => $items->sum('soluong'),
            'totalPrice' => $items->sum(fn($i) => $i->soluong * $i->sanpham->giaban)
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
            // 'totalQuantity' => $items->sum('soluong'),
            // 'totalPrice'    => $items->sum(fn ($i) => $i->soluong * $i->sanpham->giaban),
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
}
