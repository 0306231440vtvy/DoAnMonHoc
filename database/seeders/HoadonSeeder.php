<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HoadonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách users có role 'member'
        $memberUsers = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.name', 'member')
            ->select('users.id', 'users.name', 'users.email')
            ->get();

        if ($memberUsers->isEmpty()) {
            $this->command->warn('Không tìm thấy user có role member. Vui lòng chạy UserSeeder trước.');
            return;
        }

        // Lấy danh sách provinces
        $provinces = DB::table('provinces')->pluck('id')->toArray();
        if (empty($provinces)) {
            $this->command->warn('Không tìm thấy provinces. Vui lòng chạy ProvinceSeeder trước.');
            return;
        }

        // Lấy danh sách wards
        $wards = DB::table('wards')->pluck('id')->toArray();
        if (empty($wards)) {
            $this->command->warn('Không tìm thấy wards. Vui lòng chạy WardSeeder trước.');
            return;
        }

        $this->command->info("Tìm thấy {$memberUsers->count()} member users");
        $this->command->info("Tìm thấy " . count($provinces) . " provinces");
        $this->command->info("Tìm thấy " . count($wards) . " wards");

        $noteMau = [
            'Giao hàng giờ hành chính',
            'Gọi trước khi giao',
            'Giao tận tay, không gửi bảo vệ',
            'Cho xem hàng trước khi thanh toán',
            'Giao buổi sáng',
            'Giao buổi chiều',
            'Giao cuối tuần',
            null, // Không có ghi chú
            null,
            null,
        ];

        $hoadons = [];
        $usedPhones = [];

        // Tạo 50 hóa đơn
        for ($i = 1; $i <= 300; $i++) {
            $user = $memberUsers->random();

            // Tạo ngày đặt ngẫu nhiên trong 6 tháng gần đây
            $ngaydat = Carbon::now()->subDays(rand(0, 180))->format('Y-m-d');

            // Trạng thái ngẫu nhiên nhưng có trọng số hợp lý
            $random = rand(1, 100);
            if ($random <= 10) {
                $trangthai = 5; // 10% Đã hủy
            } elseif ($random <= 40) {
                $trangthai = 4; // 30% Đã giao hàng
            } elseif ($random <= 60) {
                $trangthai = 3; // 20% Đang giao hàng
            } elseif ($random <= 80) {
                $trangthai = 2; // 20% Đã xác nhận
            } else {
                $trangthai = 1; // 20% Chờ xác nhận
            }

            // Tạo số điện thoại unique
            do {
                $sdtnhan = '09' . rand(10000000, 99999999);
            } while (in_array($sdtnhan, $usedPhones));
            $usedPhones[] = $sdtnhan;

            // Chọn province và ward ngẫu nhiên
            $provinceId = $provinces[array_rand($provinces)];

            // Lấy wards thuộc province này (nếu có quan hệ qua districts)
            // Nếu không có districts, chọn ward ngẫu nhiên
            $wardId = $wards[array_rand($wards)];

            $hoadons[] = [
                'name' => 'HD' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'ngaydat' => $ngaydat,
                'trangthai' => $trangthai,
                'sdtnhan' => $sdtnhan,
                'email' => $user->email,
                'note' => $noteMau[array_rand($noteMau)],
                'province_id' => $provinceId,
                'ward_id' => $wardId,
                'user_id' => $user->id,
                'created_at' => $ngaydat . ' ' . rand(8, 20) . ':' . rand(10, 59) . ':' . rand(10, 59),
                'updated_at' => now(),
            ];
        }

        DB::table('hoadon')->insert($hoadons);

        $this->command->info('✅ Đã tạo ' . count($hoadons) . ' hóa đơn thành công!');

        // Hiển thị thống kê trạng thái
        $stats = collect($hoadons)->groupBy('trangthai')->map->count();
        $this->command->info('Thống kê trạng thái:');
        foreach ($stats as $status => $count) {
            $statusName = [
                1 => 'Chờ xác nhận',
                2 => 'Đã xác nhận',
                3 => 'Đang giao hàng',
                4 => 'Đã giao hàng',
                5 => 'Đã hủy'
            ][$status];
            $this->command->info("   {$statusName}: {$count} hóa đơn");
        }
    }
}
