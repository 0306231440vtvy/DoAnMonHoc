<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'name' => 'Công ty TNHH Thương mại Điện tử ABC',
            'address' => '123 Nguyễn Văn Linh, Phường Tân Phú, Quận 7, TP. Hồ Chí Minh',
            'phone' => '0123456789',
            'description' => 'Chuyên cung cấp các sản phẩm chất lượng cao, dịch vụ tận tâm, giao hàng nhanh chóng trên toàn quốc.',
            'logo' => 'images/logo.png',
            'facebook_url' => 'https://facebook.com/abc-company',
            'youtube_url' => 'https://youtube.com/@abc-company',
            'instagram_url' => 'https://instagram.com/abc_company',
            'linkedin_url' => 'https://linkedin.com/company/abc-company',
            'copyright' => '© 2025 ABC Company. All rights reserved.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('✅ Đã tạo thông tin cài đặt website thành công!');
    }
}
