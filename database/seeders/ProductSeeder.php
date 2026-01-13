<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // ÁO NAM
            [
                'tensp' => 'Áo Thun Nam Basic Cotton',
                'giaban' => 199000,
                'mota' => 'Áo thun nam cotton 100% cao cấp, form regular fit thoải mái, thấm hút mồ hôi tốt',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Uniqlo',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Áo Sơ Mi Nam Dài Tay',
                'giaban' => 399000,
                'mota' => 'Áo sơ mi nam công sở, vải cotton mềm mại, phù hợp đi làm và dự tiệc',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Zara',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Áo Polo Nam Cao Cấp',
                'giaban' => 349000,
                'mota' => 'Áo polo nam form slim fit, chất liệu cotton blend thoáng mát',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Ralph Lauren',
                'bienthe_type' => 'color',
            ],

            // QUẦN NAM
            [
                'tensp' => 'Quần Jean Nam Slim Fit',
                'giaban' => 599000,
                'mota' => 'Quần jean nam form slim fit co giãn, màu xanh đậm thời thượng',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Levi\'s',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Quần Kaki Nam Túi Hộp',
                'giaban' => 459000,
                'mota' => 'Quần kaki nam công sở, chất liệu kaki cao cấp, form straight thanh lịch',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Tommy Hilfiger',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Quần Short Nam Thể Thao',
                'giaban' => 299000,
                'mota' => 'Quần short nam thể thao, vải thun co giãn 4 chiều, thoáng mát',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Nike',
                'bienthe_type' => 'color',
            ],

            // ÁO KHOÁC NAM
            [
                'tensp' => 'Áo Hoodie Nam Unisex',
                'giaban' => 549000,
                'mota' => 'Áo hoodie nam nữ form rộng oversize, chất nỉ bông mềm mịn ấm áp',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'H&M',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Áo Khoác Bomber Nam',
                'giaban' => 799000,
                'mota' => 'Áo khoác bomber nam phong cách thể thao, chất liệu dù cao cấp chống nước',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Adidas',
                'bienthe_type' => 'color',
            ],

            // ÁO NỮ
            [
                'tensp' => 'Áo Thun Nữ Croptop',
                'giaban' => 159000,
                'mota' => 'Áo thun nữ croptop form ôm body, chất cotton co giãn thoải mái',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Zara',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Áo Sơ Mi Nữ Dài Tay',
                'giaban' => 369000,
                'mota' => 'Áo sơ mi nữ công sở cổ vest, vải lụa mềm mại sang trọng',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'H&M',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Áo Kiểu Nữ Hoa Nhí',
                'giaban' => 299000,
                'mota' => 'Áo kiểu nữ họa tiết hoa nhí vintage, form babydoll dễ thương',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Forever 21',
                'bienthe_type' => 'color',
            ],

            // QUẦN NỮ
            [
                'tensp' => 'Quần Jean Nữ Skinny',
                'giaban' => 549000,
                'mota' => 'Quần jean nữ skinny lưng cao tôn dáng, co giãn tốt',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Levi\'s',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Quần Baggy Nữ Ống Rộng',
                'giaban' => 399000,
                'mota' => 'Quần baggy nữ ống rộng phong cách Hàn Quốc, chất kaki mềm mịn',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Uniqlo',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Quần Short Jean Nữ',
                'giaban' => 279000,
                'mota' => 'Quần short jean nữ rách gấu, phong cách năng động trẻ trung',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Gap',
                'bienthe_type' => 'color',
            ],

            // VÁY ĐẦM
            [
                'tensp' => 'Váy Maxi Hoa Nhí',
                'giaban' => 459000,
                'mota' => 'Váy maxi dài hoa nhí vintage, vải voan mềm mại bay bổng',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Zara',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Đầm Suông Công Sở',
                'giaban' => 549000,
                'mota' => 'Đầm suông công sở form A thanh lịch, vải tuyết mưa cao cấp',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'H&M',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Váy Jean Mini',
                'giaban' => 329000,
                'mota' => 'Váy jean mini xẻ tà năng động, phong cách trẻ trung cá tính',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Pull & Bear',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Đầm Dự Tiệc Sang Trọng',
                'giaban' => 899000,
                'mota' => 'Đầm dự tiệc ren cao cấp, thiết kế ôm body quyến rũ',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Gucci',
                'bienthe_type' => 'color',
            ],

            // ÁO KHOÁC NỮ
            [
                'tensp' => 'Áo Blazer Nữ',
                'giaban' => 699000,
                'mota' => 'Áo blazer nữ công sở form dáng chuẩn, chất liệu vest cao cấp',
                'category' => 'Áo Khoác Nữ',
                'thuonghieu' => 'Zara',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Áo Cardigan Len Nữ',
                'giaban' => 449000,
                'mota' => 'Áo cardigan len nữ mềm mại ấm áp, họa tiết vintage dễ thương',
                'category' => 'Áo Khoác Nữ',
                'thuonghieu' => 'Uniqlo',
                'bienthe_type' => 'color',
            ],

            // ĐỒ THỂ THAO
            [
                'tensp' => 'Áo Thể Thao Nam Nike Dri-Fit',
                'giaban' => 599000,
                'mota' => 'Áo thể thao nam công nghệ Dri-Fit thấm hút mồ hôi tối đa',
                'category' => 'Đồ Thể Thao Nam',
                'thuonghieu' => 'Nike',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Quần Legging Yoga Nữ',
                'giaban' => 399000,
                'mota' => 'Quần legging yoga nữ co giãn 4 chiều, chất liệu cao cấp nâng mông',
                'category' => 'Đồ Thể Thao Nữ',
                'thuonghieu' => 'Adidas',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Bộ Đồ Tập Gym Nữ',
                'giaban' => 749000,
                'mota' => 'Bộ đồ tập gym nữ áo bra + quần legging, chất liệu co giãn thoáng mát',
                'category' => 'Đồ Thể Thao Nữ',
                'thuonghieu' => 'Nike',
                'bienthe_type' => 'color',
            ],

            // GIÀY DÉP
            [
                'tensp' => 'Giày Sneaker Nike Air Force 1',
                'giaban' => 2499000,
                'mota' => 'Giày sneaker Nike Air Force 1 trắng classic, da thật cao cấp',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Nike',
                'bienthe_type' => 'shoe_size',
            ],
            [
                'tensp' => 'Giày Sneaker Adidas Stan Smith',
                'giaban' => 2199000,
                'mota' => 'Giày Adidas Stan Smith trắng xanh iconic, da thật mềm mại',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Adidas',
                'bienthe_type' => 'shoe_size',
            ],
            [
                'tensp' => 'Giày Cao Gót Nữ 7cm',
                'giaban' => 599000,
                'mota' => 'Giày cao gót nữ mũi nhọn 7cm thanh lịch, da bóng sang trọng',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Gucci',
                'bienthe_type' => 'shoe_size',
            ],
            [
                'tensp' => 'Dép Sandal Nữ Quai Ngang',
                'giaban' => 299000,
                'mota' => 'Dép sandal nữ quai ngang đế bệt, phong cách tối giản hiện đại',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Zara',
                'bienthe_type' => 'shoe_size',
            ],

            // TÚI XÁCH
            [
                'tensp' => 'Túi Xách Tote Canvas',
                'giaban' => 399000,
                'mota' => 'Túi xách tote canvas đựng laptop, thiết kế tối giản tiện dụng',
                'category' => 'Túi Xách',
                'thuonghieu' => 'Uniqlo',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Balo Nam Da PU',
                'giaban' => 799000,
                'mota' => 'Balo nam da PU cao cấp, nhiều ngăn tiện lợi, phong cách công sở',
                'category' => 'Túi Xách',
                'thuonghieu' => 'Calvin Klein',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Túi Xách Nữ Da Thật',
                'giaban' => 1299000,
                'mota' => 'Túi xách nữ da thật cao cấp, thiết kế sang trọng đẳng cấp',
                'category' => 'Túi Xách',
                'thuonghieu' => 'Louis Vuitton',
                'bienthe_type' => 'color',
            ],

            // PHỤ KIỆN
            [
                'tensp' => 'Mũ Lưỡi Trai Thêu Logo',
                'giaban' => 159000,
                'mota' => 'Mũ lưỡi trai thêu logo streetwear, chất kaki form dáng đẹp',
                'category' => 'Phụ Kiện Thời Trang',
                'thuonghieu' => 'Nike',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Thắt Lưng Nam Da Bò',
                'giaban' => 399000,
                'mota' => 'Thắt lưng nam da bò thật 100%, khóa kim loại sang trọng',
                'category' => 'Phụ Kiện Thời Trang',
                'thuonghieu' => 'Ralph Lauren',
                'bienthe_type' => 'color',
            ],
            [
                'tensp' => 'Kính Mát Unisex Gọng Vuông',
                'giaban' => 299000,
                'mota' => 'Kính mát unisex gọng vuông vintage, tròng polarized chống UV',
                'category' => 'Phụ Kiện Thời Trang',
                'thuonghieu' => 'Zara',
                'bienthe_type' => 'color',
            ],
        ];

        $categoryIds = DB::table('categories')->pluck('id', 'name');
        $thuongHieuIds = DB::table('thuonghieu')->pluck('id', 'tenth');

        // Lấy biến thể theo type
        $colorVariants = DB::table('bienthe')->where('type', 'color')->pluck('id')->toArray();
        $shoeSizeVariants = DB::table('bienthe')->where('type', 'shoe_size')->pluck('id')->toArray();

        foreach ($products as $index => $product) {
            $categoryId = $categoryIds[$product['category']] ?? null;
            $thuongHieuId = $thuongHieuIds[$product['thuonghieu']] ?? null;

            // Chọn biến thể phù hợp
            if ($product['bienthe_type'] === 'shoe_size') {
                $bienTheId = $shoeSizeVariants[array_rand($shoeSizeVariants)];
            } else {
                $bienTheId = $colorVariants[array_rand($colorVariants)];
            }

            if (!$categoryId || !$thuongHieuId) {
                continue;
            }

            DB::table('sanpham')->insert([
                'tensp' => $product['tensp'],
                'hinhanh' => 'products/' . Str::slug($product['tensp']) . '.jpg',
                'soluong' => rand(20, 200),
                'sku' => 20000 + $index,
                'giaban' => $product['giaban'],
                'slug' => Str::slug($product['tensp']),
                'view' => rand(0, 5000),
                'star' => rand(3, 5),
                'mota' => $product['mota'],
                'bienthe_id' => $bienTheId,
                'category_id' => $categoryId,
                'thuonghieu_id' => $thuongHieuId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ Đã tạo ' . count($products) . ' sản phẩm thời trang');
    }
}
