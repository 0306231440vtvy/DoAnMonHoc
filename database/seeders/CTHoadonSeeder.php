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
            $this->command->warn('❌ Không có hóa đơn nào. Vui lòng chạy HoadonSeeder trước.');
            return;
        }

        // Lấy tất cả variants (không phải sanpham)
        $variants = DB::table('sanpham_variants')
            ->join('sanpham', 'sanpham_variants.sanpham_id', '=', 'sanpham.id')
            ->where('sanpham.trangthai', 1)
            ->where('sanpham_variants.soluong', '>', 0)
            ->where('sanpham_variants.trangthai', 1)
            ->select(
                'sanpham_variants.id as variant_id',
                'sanpham_variants.sanpham_id',
                'sanpham_variants.sku',
                'sanpham_variants.giaban',
                'sanpham.tensp',
                'sanpham.hinhnen',
                'sanpham_variants.soluong as stock'
            )
            ->get();

        if ($variants->isEmpty()) {
            $this->command->warn('❌ Không có variants nào khả dụng. Vui lòng chạy ProductSeeder trước.');
            return;
        }

        $ctHoadons = [];
        $totalRevenue = 0;
        $totalItems = 0;

        foreach ($hoadons as $hoadon) {
            // Mỗi hóa đơn có từ 1-5 sản phẩm
            $soLuongSanPham = rand(1, 5);

            // Lấy ngẫu nhiên variants không trùng lặp
            $selectedVariants = $variants->random(min($soLuongSanPham, $variants->count()));

            foreach ($selectedVariants as $variant) {
                $soluong = rand(1, 3); // Mỗi sản phẩm mua từ 1-3 cái
                $dongia = $variant->giaban;
                $thanhtien = $dongia * $soluong;

                // Lấy variant_attributes (màu, size, ...)
                $attributes = DB::table('variant_attribute_values')
                    ->join('bienthe_values', 'variant_attribute_values.bienthe_value_id', '=', 'bienthe_values.id')
                    ->join('bienthe', 'bienthe_values.bienthe_id', '=', 'bienthe.id')
                    ->where('variant_attribute_values.variant_id', $variant->variant_id)
                    ->select('bienthe.type', 'bienthe_values.value', 'bienthe_values.code')
                    ->get();

                // Chuẩn bị variant_attributes dưới dạng JSON
                $variantAttributes = [];
                foreach ($attributes as $attr) {
                    $variantAttributes[] = [
                        'type' => $attr->type,
                        'value' => $attr->value,
                        'code' => $attr->code,
                    ];
                }

                // ✅ FIX: Sửa lại các fields theo đúng schema
                $ctHoadons[] = [
                    'hoadon_id' => $hoadon->id,
                    'sanpham_id' => $variant->sanpham_id,
                    'variant_id' => $variant->variant_id, // ✅ FIX: Thêm variant_id
                    // Số lượng & giá
                    'soluong' => $soluong,
                    'dongia' => $dongia,
                    'thanhtien' => $thanhtien,
                    // Timestamps
                    'created_at' => $hoadon->created_at,
                    'updated_at' => $hoadon->updated_at,
                    'deleted_at' => null,
                ];

                $totalRevenue += $thanhtien;
                $totalItems++;
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
        $avgItemsPerOrder = round($totalItems / count($hoadons), 2);
        $this->command->info("   - Trung bình {$avgItemsPerOrder} sản phẩm/hóa đơn");
        $this->command->info("   - Tổng sản phẩm bán: {$totalItems} items");
        $this->command->info('   - Tổng doanh thu: ' . number_format($totalRevenue, 0, ',', '.') . ' VNĐ');

        // Cập nhật lại thanhtien ở bảng hoadon (subtotal)
        $this->updateOrderTotals();
    }

    /**
     * Cập nhật tổng tiền hóa đơn (tổng của các chi tiết)
     */
    private function updateOrderTotals()
    {
        $this->command->info('⏳ Đang cập nhật tổng tiền hóa đơn...');

        // Tính subtotal từ ct_hoadon
        $orderTotals = DB::table('ct_hoadon')
            ->groupBy('hoadon_id')
            ->selectRaw('hoadon_id, SUM(thanhtien) as subtotal')
            ->get();

        foreach ($orderTotals as $total) {
            DB::table('hoadon')
                ->where('id', $total->hoadon_id)
                ->update(['thanhtien' => $total->subtotal]);
        }

        $this->command->info('✅ Đã cập nhật tổng tiền cho ' . count($orderTotals) . ' hóa đơn');
    }
}
