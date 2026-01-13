<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CTHoadonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hoadons = DB::table('hoadon')->get();

        if ($hoadons->isEmpty()) {
            $this->command->warn('⚠️ Không có hóa đơn nào. Vui lòng chạy HoadonSeeder trước.');
            return;
        }

        // Lấy tất cả sản phẩm có sẵn
        $sanphams = DB::table('sanpham')
            ->where('trangthai', 1)
            ->where('soluong', '>', 0)
            ->get();

        if ($sanphams->isEmpty()) {
            $this->command->warn('⚠️ Không có sản phẩm nào khả dụng. Vui lòng chạy ProductSeeder trước.');
            return;
        }

        $ctHoadons = [];

        foreach ($hoadons as $hoadon) {
            // Mỗi hóa đơn có từ 1-5 sản phẩm
            $soLuongSanPham = rand(1, 5);

            // Lấy ngẫu nhiên sản phẩm không trùng lặp
            $selectedProducts = $sanphams->random(min($soLuongSanPham, $sanphams->count()));

            foreach ($selectedProducts as $sanpham) {
                $soluong = rand(1, 3); // Mỗi sản phẩm mua từ 1-3 cái
                $dongia = $sanpham->giaban;
                $thanhtien = $dongia * $soluong;

                // Trạng thái chi tiết hóa đơn theo trạng thái hóa đơn
                $trangthai = $hoadon->trangthai;

                $ctHoadons[] = [
                    'thanhtien' => $thanhtien,
                    'soluong' => $soluong,
                    'trangthai' => $trangthai,
                    'dongia' => $dongia,
                    'hoadon_id' => $hoadon->id,
                    'sanpham_id' => $sanpham->id,
                    'created_at' => $hoadon->created_at,
                    'updated_at' => $hoadon->updated_at,
                ];
            }
        }

        // Insert theo batch để tăng hiệu suất
        $chunks = array_chunk($ctHoadons, 100);
        foreach ($chunks as $chunk) {
            DB::table('ct_hoadon')->insert($chunk);
        }

        $this->command->info('✅ Đã tạo ' . count($ctHoadons) . ' chi tiết hóa đơn cho ' . count($hoadons) . ' hóa đơn');

        // Thống kê
        $this->command->info('📊 Thống kê:');
        $avgItemsPerOrder = round(count($ctHoadons) / count($hoadons), 2);
        $this->command->info("   - Trung bình {$avgItemsPerOrder} sản phẩm/hóa đơn");

        $totalRevenue = array_sum(array_column($ctHoadons, 'thanhtien'));
        $this->command->info('   - Tổng doanh thu: ' . number_format($totalRevenue, 0, ',', '.') . ' VNĐ');
    }
}
