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
        // Lấy danh sách user có role customer
        $customerUsers = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'customer')
            ->where('model_has_roles.model_type', 'App\\Models\\User')
            ->select('users.id', 'users.name')
            ->get();

        if ($customerUsers->isEmpty()) {
            $this->command->warn('⚠️ Không tìm thấy user có role customer. Vui lòng chạy UserSeeder trước.');
            return;
        }

        $trangthaiOptions = [
            1 => 'Chờ xác nhận',
            2 => 'Đã xác nhận',
            3 => 'Đang giao hàng',
            4 => 'Đã giao hàng',
            5 => 'Đã hủy'
        ];

        $diachiMau = [
            '123 Nguyễn Văn Linh, Quận 7, TP.HCM',
            '456 Lê Văn Việt, Quận 9, TP.HCM',
            '789 Võ Văn Ngân, Thủ Đức, TP.HCM',
            '321 Trần Hưng Đạo, Quận 1, TP.HCM',
            '654 Hoàng Văn Thụ, Phú Nhuận, TP.HCM',
            '987 Phan Văn Trị, Gò Vấp, TP.HCM',
            '147 Cách Mạng Tháng 8, Quận 10, TP.HCM',
            '258 Lê Hồng Phong, Quận 5, TP.HCM',
            '369 Nguyễn Thị Minh Khai, Quận 3, TP.HCM',
            '741 Điện Biên Phủ, Bình Thạnh, TP.HCM'
        ];

        $hoadons = [];
        $usedPhones = []; // Mảng để theo dõi số điện thoại đã sử dụng

        // Tạo 50 hóa đơn
        for ($i = 1; $i <= 50; $i++) {
            $user = $customerUsers->random();

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

            $hoadons[] = [
                'name' => 'HD' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'ngaydat' => $ngaydat,
                'trangthai' => $trangthai,
                'sdtnhan' => $sdtnhan,
                'diachigiaohang' => $diachiMau[array_rand($diachiMau)],
                'user_id' => $user->id,
                'created_at' => $ngaydat . ' ' . rand(8, 20) . ':' . rand(10, 59) . ':' . rand(10, 59),
                'updated_at' => now(),
            ];
        }

        DB::table('hoadon')->insert($hoadons);

        $this->command->info('✅ Đã tạo ' . count($hoadons) . ' hóa đơn');
    }
}
