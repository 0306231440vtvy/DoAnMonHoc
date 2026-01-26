<?php

namespace App\Repositories;

use App\Models\Giohang;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\Clock\now;

class CartRepository extends BaseRepository
{
    public function __construct(
        Giohang $model
    ) {
        $this->model = $model;
    }
    public function cartIndex($user_id)
    {
        $items = DB::table('giohang')
            ->join('sanpham_variants', 'giohang.sku', '=', 'sanpham_variants.sku')
            ->join('sanpham', 'sanpham_variants.sanpham_id', '=', 'sanpham.id')
            ->leftJoin('variant_attribute_values', 'sanpham_variants.id', '=', 'variant_attribute_values.variant_id')
            ->leftJoin('bienthe_values', 'variant_attribute_values.bienthe_value_id', '=', 'bienthe_values.id')
            ->leftJoin('bienthe', 'bienthe_values.bienthe_id', '=', 'bienthe.id')
            ->where('user_id', $user_id)
            ->select(
                'giohang.id as cart_id',
                'giohang.sku',
                'giohang.soluong as cart_quantity',
                'sanpham.id as product_id',
                'sanpham.tensp',
                'sanpham.hinhnen',
                'sanpham.slug',
                'sanpham_variants.giaban',
                'sanpham_variants.soluong as stock_quantity',
                'bienthe_values.value as value',
                'bienthe.name as name',
                'bienthe_values.code as code'
            )
            ->orderBy('giohang.id')
            ->orderBy('bienthe.id')
            ->get();
        return $this->groupedCart($items);
    }
    private function groupedCart($items)
    {
        $grouped = [];
        foreach ($items as $item) {
            $sku = $item->sku;
            // lấy sản phẩm với mã sku
            if (!isset($grouped[$sku])) {
                $grouped[$sku] = [
                    'cart_id' => $item->cart_id,
                    'sku' => $item->sku,
                    'product_id' => $item->product_id,
                    'tensp' => $item->tensp,
                    'hinhnen' => $item->hinhnen,
                    'slug' => $item->slug,
                    'giaban' => $item->giaban,
                    'cart_quantity' => $item->cart_quantity,
                    'stock_quantity' => $item->stock_quantity,
                    'subtotal' => $item->cart_quantity * $item->giaban,
                    'attributes' => [],
                ];
            }
            if ($item->value) {
                $grouped[$sku]['attributes'][] = [
                    'name' => $item->bienthe_name ?? 'Thuộc tính',
                    'value' => $item->value,
                    'code' => $item->code ?? null
                ];
            }
        }
        return $grouped;
    }
    public function getSummary()
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return response()->json([
                'totalQuantity' => 0,
                'totalAmount' => 0
            ]);
        }
        $cartSummary = DB::table('giohang')
            ->join('sanpham_variants', 'giohang.sku', '=', 'sanpham_variants.sku')
            ->where('user_id', $user_id)
            ->select(
                DB::raw('SUM(giohang.soluong) as total_quantity'),
                DB::raw('SUM(sanpham_variants.giaban*giohang.soluong) as total_amount')
            )
            ->first();
        return response()->json([
            'totalQuantity' => $cartSummary->total_quantity ?? 0,
            'totalAmount' => $cartSummary->total_amount ?? 0
        ]);
    }
    public function findByProductAndUser($sanpham_id, $userId)
    {
        return GioHang::where('sanpham_id', $sanpham_id)
            ->where('user_id', $userId)
            ->with('sanpham')
            ->first();
    }
    public function updateQuantity($id, $quantity)
    {
        $result = $this->findById($id);
        $result->update([
            'soluong' => $quantity,
            'update_at' => now()
        ]);
        return $result;
    }

    // public function deleteCartItem($userId, $sanphamId)
    // {
    //     return GioHang::where('user_id', $userId)
    //         ->where('sku', $sanphamId)
    //         ->delete();
    // }
    public function clearCart($userId)
    {
        return DB::table('giohang')->where('user_id', $userId)->delete();
    }
    public function calculateTotals($cartItems, $selectedIds = null)
    {
        $totalQuantity = 0;
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            if ($selectedIds !== null && !in_array($item['cart_id'], $selectedIds)) {
                continue;
            }
            $totalQuantity += $item['cart_quantity'];
            $totalAmount += $item['subtotal'];
        }
        return [
            'totalQuantity' => $totalQuantity,
            'totalAmount' => $totalAmount
        ];
    }
}
