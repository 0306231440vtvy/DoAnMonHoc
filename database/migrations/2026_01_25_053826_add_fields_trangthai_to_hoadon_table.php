<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hoadon', function (Blueprint $table) {
            $table->enum('trangthai', [
                'pending',      // Chờ xác nhận
                'confirmed',    // Đã xác nhận
                'preparing',    // Đang chuẩn bị hàng
                'shipping',     // Đang giao hàng
                'delivered',    // Đã giao hàng
                'completed',    // Hoàn thành
                'cancelled',    // Đã hủy
                'refunded'      // Đã hoàn tiền
            ])->default('pending');
            // Phương thức thanh toán
            $table->enum('phuongthuc_thanhtoan', [
                'cod',          // Thanh toán khi nhận hàng
                'bank_transfer', // Chuyển khoản
                'momo',         // Ví MoMo
                'vnpay',        // VNPay
                'zalopay'       // ZaloPay
            ])->default('cod');

            // Trạng thái thanh toán
            $table->enum('trang_thai_thanhtoan', [
                'unpaid',       // Chưa thanh toán
                'paid',         // Đã thanh toán
                'refunded'      // Đã hoàn tiền
            ])->default('unpaid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoadon', function (Blueprint $table) {});
    }
};
