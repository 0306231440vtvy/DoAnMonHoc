<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->get();
        $products = DB::table('sanpham')->where('trangthai', 1)->get();
        if ($users->isEmpty() || $products->isEmpty()) {
            $this->command->warn('Không có user hoặc sản phẩm để tạo giỏ hàng!');
            return;
        }
        $cartItems = [];
        $totalItems = 0;
        foreach ($users as $user) {
            // Phân loại user theo role_id
            switch ($user->role_id) {
                case 3: // Admin - ít thêm vào giỏ hàng
                    $numberOfItems = rand(0, 2);
                    break;
                case 2: // Manager - thêm vừa phải
                    $numberOfItems = rand(1, 3);
                    break;
                case 1: // Member - thêm nhiều
                    $numberOfItems = rand(2, 5);
                    break;
                default:
                    $numberOfItems = rand(1, 3);
            }
            // Một số user không có giỏ hàng
            if ($numberOfItems === 0) {
                continue;
            }
            // Lấy random sản phẩm không trùng
            $availableProducts = $products->toArray();
            shuffle($availableProducts);
            $selectedProducts = array_slice($availableProducts, 0, min($numberOfItems, count($availableProducts)));

            foreach ($selectedProducts as $product) {
                $cartItems[] = [
                    'user_id' => $user->id,
                    'giaban' => $product->giaban ?? rand(100000, 5000000), // Lấy giá bán từ sản phẩm
                    'soluong' => rand(1, 5), // Số lượng ngẫu nhiên từ 1-5
                    'created_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23)),
                    'updated_at' => now()->subDays(rand(0, 7))->subHours(rand(0, 23)),
                ];
                $totalItems++;
            }
        }
        // Insert vào database
        if (!empty($cartItems)) {
            // Chia nhỏ để tránh lỗi khi insert nhiều
            $chunks = array_chunk($cartItems, 100);
            foreach ($chunks as $chunk) {
                DB::table('giohang')->insert($chunk);
            }
        }
        $this->command->info("✅ Đã tạo {$totalItems} items trong giỏ hàng cho {$users->count()} users");
        // Thống kê
        $this->command->info("Thống kê giỏ hàng:");
        $cartStats = DB::table('giohang')
            ->select('user_id', DB::raw('COUNT(*) as total'), DB::raw('SUM(soluong) as total_quantity'))
            ->groupBy('user_id')
            ->get();
        foreach ($users as $user) {
            $stats = $cartStats->firstWhere('user_id', $user->id);
            if ($stats) {
                $this->command->info("   • {$user->name}: {$stats->total} sản phẩm ({$stats->total_quantity} items)");
            } else {
                $this->command->info("   • {$user->name}: 0 sản phẩm");
            }
        }
    }
}
