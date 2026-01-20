<?php

namespace App\Repositories;

use App\Models\Giohang;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CartRepository extends BaseRepository
{
    public function __construct(
        Giohang $model
    ) {
        $this->model = $model;
    }
    
    public function getCartItemsByUser($userId)
    {
        return Giohang::with('user', 'sanpham.bienthe')
            ->where('user_id', $userId)
            ->get();
    }

    public function getCheckedItems($userId, array $productIds)
    {
        return Giohang::with('sanpham')
            ->where('user_id', $userId)
            ->whereIn('sanpham_id', $productIds)
            ->get();
    }

     public function findByProductAndUser($sanpham_id, $userId)
    {
        return GioHang::where('sanpham_id', $sanpham_id)
            ->where('user_id', $userId)
            ->with('sanpham')
            ->first();
    }

    public function saveQuantity($sanpham_id, $userId, $quantity){
        GioHang::where('user_id', $userId)
            ->where('sanpham_id', $sanpham_id)
            ->update([
                'soluong' => $quantity
            ]);
    }

    public function deleteCartItem($userId, $sanphamId)
    {
        return GioHang::where('user_id', $userId)
            ->where('sanpham_id', $sanphamId)
            ->delete();
    }
    public function clearCart($userId)
    {
        return GioHang::where('user_id', $userId)->delete();
    }
}