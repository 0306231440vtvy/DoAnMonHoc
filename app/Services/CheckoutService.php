<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\Hoadon;
use App\Models\CtHoadon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class CheckoutService extends BaseService
{
    protected $repository;
    protected $payload;
    protected function prepageModeldata(Request $request):self
    {

        $this->payload = $request->only([
            'name',
            'phone',
            'email',
            'province_id',
            'ward_id',
            'note',
            'payment_method',
        ]);
        return $this;
    }
    public function __construct() {
        // $this->repository = $repository;
    }

    public function createOrder($userId, $data, $checkout)
    {
        DB::transaction(function () use ($userId, $data, $checkout, &$order) {
            // dd($data);
            $order = HoaDon::create([
                'name' => 'HD' . now()->format('YmdHis'),
                'ngaydat' => now(),
                'trangthai' => 1,
                'sdtnhan' => $data['phone'],
                'email' => $data['email'],
                'note' => $data['note'] ?? null,
                'province_id' => $data['province_id'],
                'ward_id' => $data['ward_id'],
                'user_id' => $userId,
            ]);
            foreach ($checkout['items'] as $item) {

                CtHoaDon::create([
                    'hoadon_id' => $order->id,
                    'sanpham_id' => $item['sanpham_id'],
                    'soluong' => $item['so_luong'],
                    'dongia' => $item['gia_sau_giam'],
                    'thanhtien' => $item['thanh_tien'],
                    'trangthai' => 1,
                ]);

                // trừ kho
                // $item['sanpham_id']->decrement('soluong', $item['soluong']);
            }
        });

        return $order;
    }
}