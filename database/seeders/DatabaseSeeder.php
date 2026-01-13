<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sanpham;
use App\Models\Hoadon;
use App\Models\CtHoadon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            BienTheSeeder::class,
            CategorySeeder::class,
            ThuongHieuSeeder::class,
            ProductSeeder::class,
        ]);

        DB::table('categories')->insertOrIgnore([
            'id' => 1,
            'name' => 'Điện thoại', // Hoặc 'ten' tùy DB bạn
            'description' => 'aaaa',
            'slug' => 'dien-thoai',
            'publish' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo Thương hiệu id = 1
        DB::table('thuonghieu')->insertOrIgnore([
            'id' => 1,
            'tenth' => 'Samsung', // Hoặc 'ten' tùy DB bạn
            'hinhanh' => 'samsung.jpg',
            'trangthai' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo Biến thể id = 1
        DB::table('bienthe')->insertOrIgnore([
            'id' => 1,
            'color' => 'đỏ', // Hoặc 'ten', 'loaibienthe'... tùy DB bạn
            // Thêm các cột bắt buộc khác của bảng bienthe nếu có
            'size' => 'XL',
            'chatlieu' => 'cotton',
            'trangthai' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $user = User::create([
            'name' => 'Nguyễn Văn Test',
            'email' => 'test@gmail.com',
            'phone' => '0987654321',
            'password' => Hash::make('123456'),
            'gender' => 1,
            'publish' => 1,
            'email_verified_at' => now(),
        ]);

        // 2. Tạo 20 Sản phẩm giả
        $products = Sanpham::factory(20)->create();

        // 3. Tạo 5 Hóa đơn cho User này
        Hoadon::factory(5)->create([
            'user_id' => $user->id,
            'name' => $user->name,
            'sdtnhan' => $user->phone
        ])->each(function ($hoadon) use ($products) {
            
            // Với mỗi hóa đơn, tạo ngẫu nhiên 2-3 chi tiết hóa đơn (mua 2-3 món)
            $randomProducts = $products->random(rand(2, 3)); 

            foreach ($randomProducts as $product) {
                $soluong = rand(1, 3);
                $dongia = $product->giaban;
                
                CtHoadon::create([
                    'hoadon_id' => $hoadon->id,
                    'sanpham_id' => $product->id,
                    'soluong' => $soluong,
                    'dongia' => $dongia,
                    'thanhtien' => $soluong * $dongia,
                    'trangthai' => 1
                ]);
            }
        });

        // 4. Tạo dữ liệu Yêu thích (User thích 3 sản phẩm ngẫu nhiên)
        $user->sanphamYeuthich()->attach(
            $products->random(3)->pluck('id')->toArray(),
            ['ngaythem' => now()]
        );
        
        // 5. Tạo dữ liệu Giỏ hàng (User có 2 sản phẩm trong giỏ)
        $user->giohang()->attach(
             $products->random(2)->pluck('id')->toArray()
        );

        echo "Đã tạo dữ liệu giả thành công! \n";
        echo "Tài khoản test: test@gmail.com | Pass: 123456 \n";
    }
}