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
            // // ÁO NAM
            // [
            //     'tensp' => 'Áo Thun Nam Basic Cotton',
            //     'giaban' => 199000,
            //     'mota' => 'Áo thun nam cotton 100% cao cấp, form regular fit thoải mái, thấm hút mồ hôi tốt',
            //     'category' => 'Áo Nam',
            //     'thuonghieu' => 'Uniqlo',
            //     'attributes' => ['color', 'size'], // Thuộc tính sản phẩm cần
            // ],
            // [
            //     'tensp' => 'Áo Sơ Mi Nam Dài Tay',
            //     'giaban' => 399000,
            //     'mota' => 'Áo sơ mi nam công sở, vải cotton mềm mại, phù hợp đi làm và dự tiệc',
            //     'category' => 'Áo Nam',
            //     'thuonghieu' => 'Zara',
            //     'attributes' => ['color', 'size'],
            // ],
            // [
            //     'tensp' => 'Áo Polo Nam Cao Cấp',
            //     'giaban' => 349000,
            //     'mota' => 'Áo polo nam form slim fit, chất liệu cotton blend thoáng mát',
            //     'category' => 'Áo Nam',
            //     'thuonghieu' => 'Ralph Lauren',
            //     'attributes' => ['color', 'size'],
            // ],

            // // GIÀY DÉP
            // [
            //     'tensp' => 'Giày Sneaker Nike Air Force 1',
            //     'giaban' => 2499000,
            //     'mota' => 'Giày sneaker Nike Air Force 1 trắng classic, da thật cao cấp',
            //     'category' => 'Giày Dép',
            //     'thuonghieu' => 'Nike',
            //     'attributes' => ['color', 'shoe_size'],
            // ],
            // [
            //     'tensp' => 'Giày Sneaker Adidas Stan Smith',
            //     'giaban' => 2199000,
            //     'mota' => 'Giày Adidas Stan Smith trắng xanh iconic, da thật mềm mại',
            //     'category' => 'Giày Dép',
            //     'thuonghieu' => 'Adidas',
            //     'attributes' => ['color', 'shoe_size'],
            // ],
            // QUẦN NAM
            [
                'tensp' => 'Quần Jean Nam Slim Fit',
                'giaban' => 599000,
                'mota' => 'Quần jean nam form slim fit co giãn, màu xanh đậm thời thượng',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Kaki Nam Túi Hộp',
                'giaban' => 459000,
                'mota' => 'Quần kaki nam công sở, chất liệu kaki cao cấp, form straight thanh lịch',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Tommy Hilfiger',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Short Nam Thể Thao',
                'giaban' => 299000,
                'mota' => 'Quần short nam thể thao, vải thun co giãn 4 chiều, thoáng mát',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],

            // ÁO KHOÁC NAM
            [
                'tensp' => 'Áo Hoodie Nam Unisex',
                'giaban' => 549000,
                'mota' => 'Áo hoodie nam nữ form rộng oversize, chất nỉ bông mềm mịn ấm áp',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Khoác Bomber Nam',
                'giaban' => 799000,
                'mota' => 'Áo khoác bomber nam phong cách thể thao, chất liệu dù cao cấp chống nước',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Adidas',
                'attributes' => ['color', 'shoe_size'],
            ],

            // ÁO NỮ
            [
                'tensp' => 'Áo Thun Nữ Croptop',
                'giaban' => 159000,
                'mota' => 'Áo thun nữ croptop form ôm body, chất cotton co giãn thoải mái',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sơ Mi Nữ Dài Tay',
                'giaban' => 369000,
                'mota' => 'Áo sơ mi nữ công sở cổ vest, vải lụa mềm mại sang trọng',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Kiểu Nữ Hoa Nhí',
                'giaban' => 299000,
                'mota' => 'Áo kiểu nữ họa tiết hoa nhí vintage, form babydoll dễ thương',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Forever 21',
                'attributes' => ['color', 'shoe_size'],
            ],

            // QUẦN NỮ
            [
                'tensp' => 'Quần Jean Nữ Skinny',
                'giaban' => 549000,
                'mota' => 'Quần jean nữ skinny lưng cao tôn dáng, co giãn tốt',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Baggy Nữ Ống Rộng',
                'giaban' => 399000,
                'mota' => 'Quần baggy nữ ống rộng phong cách Hàn Quốc, chất kaki mềm mịn',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Short Jean Nữ',
                'giaban' => 279000,
                'mota' => 'Quần short jean nữ rách gấu, phong cách năng động trẻ trung',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Gap',
                'attributes' => ['color', 'shoe_size'],
            ],

            // VÁY ĐẦM
            [
                'tensp' => 'Váy Maxi Hoa Nhí',
                'giaban' => 459000,
                'mota' => 'Váy maxi dài hoa nhí vintage, vải voan mềm mại bay bổng',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Đầm Suông Công Sở',
                'giaban' => 549000,
                'mota' => 'Đầm suông công sở form A thanh lịch, vải tuyết mưa cao cấp',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Váy Jean Mini',
                'giaban' => 329000,
                'mota' => 'Váy jean mini xẻ tà năng động, phong cách trẻ trung cá tính',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Pull & Bear',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Đầm Dự Tiệc Sang Trọng',
                'giaban' => 899000,
                'mota' => 'Đầm dự tiệc ren cao cấp, thiết kế ôm body quyến rũ',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Gucci',
                'attributes' => ['color', 'shoe_size'],
            ],

            // ÁO KHOÁC NỮ
            [
                'tensp' => 'Áo Blazer Nữ',
                'giaban' => 699000,
                'mota' => 'Áo blazer nữ công sở form dáng chuẩn, chất liệu vest cao cấp',
                'category' => 'Áo Khoác Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Cardigan Len Nữ',
                'giaban' => 449000,
                'mota' => 'Áo cardigan len nữ mềm mại ấm áp, họa tiết vintage dễ thương',
                'category' => 'Áo Khoác Nữ',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],

            // ĐỒ THỂ THAO
            [
                'tensp' => 'Áo Thể Thao Nam Nike Dri-Fit',
                'giaban' => 599000,
                'mota' => 'Áo thể thao nam công nghệ Dri-Fit thấm hút mồ hôi tối đa',
                'category' => 'Đồ Thể Thao Nam',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Legging Yoga Nữ',
                'giaban' => 399000,
                'mota' => 'Quần legging yoga nữ co giãn 4 chiều, chất liệu cao cấp nâng mông',
                'category' => 'Đồ Thể Thao Nữ',
                'thuonghieu' => 'Adidas',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Bộ Đồ Tập Gym Nữ',
                'giaban' => 749000,
                'mota' => 'Bộ đồ tập gym nữ áo bra + quần legging, chất liệu co giãn thoáng mát',
                'category' => 'Đồ Thể Thao Nữ',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],

            // GIÀY DÉP
            [
                'tensp' => 'Giày Sneaker Nike Air Force 1',
                'giaban' => 2499000,
                'mota' => 'Giày sneaker Nike Air Force 1 trắng classic, da thật cao cấp',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Giày Sneaker Adidas Stan Smith',
                'giaban' => 2199000,
                'mota' => 'Giày Adidas Stan Smith trắng xanh iconic, da thật mềm mại',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Adidas',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Giày Cao Gót Nữ 7cm',
                'giaban' => 599000,
                'mota' => 'Giày cao gót nữ mũi nhọn 7cm thanh lịch, da bóng sang trọng',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Gucci',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Dép Sandal Nữ Quai Ngang',
                'giaban' => 299000,
                'mota' => 'Dép sandal nữ quai ngang đế bệt, phong cách tối giản hiện đại',
                'category' => 'Giày Dép',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],

            // TÚI XÁCH
            [
                'tensp' => 'Túi Xách Tote Canvas',
                'giaban' => 399000,
                'mota' => 'Túi xách tote canvas đựng laptop, thiết kế tối giản tiện dụng',
                'category' => 'Túi Xách',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Balo Nam Da PU',
                'giaban' => 799000,
                'mota' => 'Balo nam da PU cao cấp, nhiều ngăn tiện lợi, phong cách công sở',
                'category' => 'Túi Xách',
                'thuonghieu' => 'Calvin Klein',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Túi Xách Nữ Da Thật',
                'giaban' => 1299000,
                'mota' => 'Túi xách nữ da thật cao cấp, thiết kế sang trọng đẳng cấp',
                'category' => 'Túi Xách',
                'thuonghieu' => 'Louis Vuitton',
                'attributes' => ['color', 'shoe_size'],
            ],

            // PHỤ KIỆN
            [
                'tensp' => 'Mũ Lưỡi Trai Thêu Logo',
                'giaban' => 159000,
                'mota' => 'Mũ lưỡi trai thêu logo streetwear, chất kaki form dáng đẹp',
                'category' => 'Phụ Kiện Thời Trang',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Thắt Lưng Nam Da Bò',
                'giaban' => 399000,
                'mota' => 'Thắt lưng nam da bò thật 100%, khóa kim loại sang trọng',
                'category' => 'Phụ Kiện Thời Trang',
                'thuonghieu' => 'Ralph Lauren',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Kính Mát Unisex Gọng Vuông',
                'giaban' => 299000,
                'mota' => 'Kính mát unisex gọng vuông vintage, tròng polarized chống UV',
                'category' => 'Phụ Kiện Thời Trang',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Thun Nam Cổ Tròn Premium',
                'giaban' => 249000,
                'mota' => 'Áo thun nam cổ tròn chất liệu cotton Supima mềm mịn, độ bền cao',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Thun Nam Oversize Street',
                'giaban' => 299000,
                'mota' => 'Áo thun nam form oversize phong cách streetwear, vải cotton 4 chiều',
                'category' => 'Áo Nam',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sơ Mi Nam Ngắn Tay Hawaii',
                'giaban' => 329000,
                'mota' => 'Áo sơ mi nam ngắn tay họa tiết hoa Hawaii, vải rayon thoáng mát',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sơ Mi Nam Linen Trơn',
                'giaban' => 449000,
                'mota' => 'Áo sơ mi nam vải linen 100% cao cấp, thoáng mát phù hợp mùa hè',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Polo Nam Thể Thao ProDry',
                'giaban' => 379000,
                'mota' => 'Áo polo nam vải thể thao thoáng khí, công nghệ Quick Dry',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Adidas',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Tank Top Nam Gym Pro',
                'giaban' => 179000,
                'mota' => 'Áo ba lỗ nam tập gym, vải thun co giãn thoáng mát cực tốt',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Thun Nam Cổ Henley Button',
                'giaban' => 269000,
                'mota' => 'Áo thun nam cổ henley 3 nút phong cách casual, chất cotton blend',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Gap',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sơ Mi Nam Flannel Caro',
                'giaban' => 429000,
                'mota' => 'Áo sơ mi nam flannel kẻ caro to, ấm áp phong cách lumberjack',
                'category' => 'Áo Nam',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Len Nam Cổ Lọ Cao',
                'giaban' => 549000,
                'mota' => 'Áo len nam cổ lọ cao cấp, 100% len merino ấm áp',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sweater Nam Graphic Print',
                'giaban' => 479000,
                'mota' => 'Áo sweater nam in họa tiết graphic độc đáo, nỉ bông dày dặn',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sơ Mi Nam Oxford Button-Down',
                'giaban' => 489000,
                'mota' => 'Áo sơ mi nam vải Oxford cổ cài nút, phong cách Ivy League',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Tommy Hilfiger',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Thun Nam Raglan Baseball',
                'giaban' => 229000,
                'mota' => 'Áo thun nam tay raglan phối màu cổ điển, phong cách baseball',
                'category' => 'Áo Nam',
                'thuonghieu' => 'Gap',
                'attributes' => ['color', 'shoe_size'],
            ],

            // QUẦN NAM (12 sản phẩm)
            [
                'tensp' => 'Quần Jean Nam Baggy Vintage',
                'giaban' => 649000,
                'mota' => 'Quần jean nam baggy wash vintage độc đáo, form rộng thoải mái',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Jean Nam Ripped Knee',
                'giaban' => 579000,
                'mota' => 'Quần jean nam rách gối phong cách streetwear, co giãn tốt',
                'category' => 'Quần Nam',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Tây Nam Công Sở Xám',
                'giaban' => 549000,
                'mota' => 'Quần tây nam công sở màu xám, vải Tencel mềm mại chống nhăn',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Jogger Nam Kaki Slim',
                'giaban' => 399000,
                'mota' => 'Quần jogger nam kaki co giãn nhẹ, bo gấu thời thượng',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Short Nam Kaki Chino',
                'giaban' => 329000,
                'mota' => 'Quần short nam kaki chino lịch lãm, nhiều túi tiện lợi',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Gap',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Chinos Nam Slim Stretch',
                'giaban' => 479000,
                'mota' => 'Quần chinos nam slim fit co giãn, vải cotton stretch cao cấp',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Tommy Hilfiger',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Cargo Nam Multi Pocket',
                'giaban' => 599000,
                'mota' => 'Quần cargo nam đa túi chức năng, phong cách military bền bỉ',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Pull & Bear',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Thể Thao Nam Track Pants',
                'giaban' => 349000,
                'mota' => 'Quần thể thao nam dài có sọc, vải polyester thoáng khí',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Adidas',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Short Jean Nam Light Wash',
                'giaban' => 349000,
                'mota' => 'Quần short jean nam wash sáng, phong cách summer thoải mái',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Linen Nam Trắng',
                'giaban' => 429000,
                'mota' => 'Quần linen nam màu trắng thoáng mát, lý tưởng cho mùa hè',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Jean Nam Straight Regular',
                'giaban' => 629000,
                'mota' => 'Quần jean nam ống đứng regular fit classic, màu xanh indigo',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Jogger Thể Thao Tech Fleece',
                'giaban' => 379000,
                'mota' => 'Quần jogger thể thao nam tech fleece ấm, bo gấu co giãn',
                'category' => 'Quần Nam',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],

            // ÁO KHOÁC NAM (8 sản phẩm)
            [
                'tensp' => 'Áo Khoác Jean Nam Trucker',
                'giaban' => 699000,
                'mota' => 'Áo khoác jean nam trucker jacket wash nhẹ, phong cách Americana',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Khoác Gió Nam Windbreaker',
                'giaban' => 549000,
                'mota' => 'Áo khoác gió nam windbreaker chống nước, nhẹ gọn dễ gấp',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Khoác Phao Nam Ultra Light',
                'giaban' => 899000,
                'mota' => 'Áo khoác phao nam siêu nhẹ ultra light, ấm áp mùa đông',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Hoodie Zip Nam Full-Zip',
                'giaban' => 599000,
                'mota' => 'Áo hoodie zip nam full-zip có mũ, nỉ bông dày ấm cực tốt',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Adidas',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Khoác Da Nam Faux Leather',
                'giaban' => 1599000,
                'mota' => 'Áo khoác da nam PU faux leather, phong cách biker cá tính',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Varsity Jacket Nam College',
                'giaban' => 849000,
                'mota' => 'Áo varsity jacket nam phối tay màu, phong cách college retro',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Khoác Dù Nam 3 Lớp',
                'giaban' => 649000,
                'mota' => 'Áo khoác dù nam 3 lớp chống nước tuyệt đối, chống gió mạnh',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Parka Nam Hooded Long',
                'giaban' => 1199000,
                'mota' => 'Áo parka nam dáng dài có mũ lông thú, ấm áp cao cấp',
                'category' => 'Áo Khoác Nam',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],

            // ÁO NỮ (13 sản phẩm)
            [
                'tensp' => 'Áo Thun Nữ Oversize Box',
                'giaban' => 189000,
                'mota' => 'Áo thun nữ form box oversize thoải mái, vải cotton 100%',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Kiểu Nữ Tay Bồng Peplum',
                'giaban' => 329000,
                'mota' => 'Áo kiểu nữ tay bồng xòe eo vintage, vải voan mềm mại',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sơ Mi Nữ Linen Oversize',
                'giaban' => 399000,
                'mota' => 'Áo sơ mi nữ linen oversize rộng rãi, phong cách Hàn Quốc',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Thun Nữ Cổ Tim Ribbed',
                'giaban' => 169000,
                'mota' => 'Áo thun nữ cổ tim vải gân dễ thương, cotton co giãn mềm',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Forever 21',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Blouse Nữ Trắng Cổ Bèo',
                'giaban' => 349000,
                'mota' => 'Áo blouse nữ trắng công sở cổ bèo nhún, vải cotton cao cấp',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Hai Dây Nữ Satin',
                'giaban' => 259000,
                'mota' => 'Áo hai dây nữ satin lụa sang trọng, quyến rũ',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Len Nữ Cổ Lọ Slim',
                'giaban' => 429000,
                'mota' => 'Áo len nữ cổ lọ ấm áp, form slimfit tôn dáng cực đẹp',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Thun Nữ Tay Dài Crop',
                'giaban' => 199000,
                'mota' => 'Áo thun nữ tay dài crop ngắn, vải cotton co giãn 4 chiều',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Gap',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sơ Mi Nữ Kẻ Sọc Dọc',
                'giaban' => 359000,
                'mota' => 'Áo sơ mi nữ kẻ sọc dọc thanh lịch, form boyfriend rộng',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Crop Top Nữ Tay Dài Body',
                'giaban' => 179000,
                'mota' => 'Áo crop top nữ tay dài ôm body cực chất, vải thun gân',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Forever 21',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Kiểu Nữ Xếp Ly Cổ Tròn',
                'giaban' => 389000,
                'mota' => 'Áo kiểu nữ xếp ly tinh tế sang trọng, vải chiffon mềm',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Sweater Nữ Len Mỏng Form Rộng',
                'giaban' => 459000,
                'mota' => 'Áo sweater nữ len mỏng oversized rộng, ấm nhẹ thoải mái',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Áo Kiểu Nữ Cổ Vuông Tay Phồng',
                'giaban' => 299000,
                'mota' => 'Áo kiểu nữ cổ vuông thanh lịch, tay phồng xinh xắn',
                'category' => 'Áo Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],

            // QUẦN NỮ (10 sản phẩm)
            [
                'tensp' => 'Quần Jean Nữ Ống Loe Retro',
                'giaban' => 599000,
                'mota' => 'Quần jean nữ ống loe cổ điển retro, lưng cao tôn dáng',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Culottes Nữ Linen',
                'giaban' => 429000,
                'mota' => 'Quần culottes nữ ống rộng thanh lịch, vải linen mát mẻ',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Tây Nữ Ống Suông Dài',
                'giaban' => 499000,
                'mota' => 'Quần tây nữ ống suông công sở dài, vải cao cấp chống nhăn',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Jogger Nữ Kaki Bo Gấu',
                'giaban' => 379000,
                'mota' => 'Quần jogger nữ kaki bo gấu cute, phong cách sporty năng động',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Suông Nữ Vải Lụa',
                'giaban' => 449000,
                'mota' => 'Quần suông nữ vải lụa mềm mại sang, dáng dài thanh lịch',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Short Nữ Kaki Lưng Cao',
                'giaban' => 299000,
                'mota' => 'Quần short nữ kaki lưng cao sành điệu, phong cách năng động',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Gap',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Ống Rộng Nữ Palazzo',
                'giaban' => 529000,
                'mota' => 'Quần ống rộng nữ palazzo dài chấm đất, phong cách vintage',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Legging Nữ Đen Basic',
                'giaban' => 249000,
                'mota' => 'Quần legging nữ đen basic thiết yếu, vải thun co giãn 4 chiều',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Uniqlo',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Jeans Mom Fit Nữ',
                'giaban' => 569000,
                'mota' => 'Quần jeans mom fit nữ lưng cao vintage, form rộng thoải mái',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Quần Short Thun Nữ Cotton',
                'giaban' => 199000,
                'mota' => 'Quần short thun nữ mặc nhà tiện lợi, vải cotton mềm mịn',
                'category' => 'Quần Nữ',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],

            // VÁY ĐẦM (10 sản phẩm)
            [
                'tensp' => 'Váy Midi Xếp Ly Sang Trọng',
                'giaban' => 499000,
                'mota' => 'Váy midi xếp ly tinh tế sang trọng, vải lụa cao cấp',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Đầm Babydoll Ngắn Hoa',
                'giaban' => 389000,
                'mota' => 'Đầm babydoll ngắn dễ thương xinh xắn, vải voan hoa nhí',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Forever 21',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Váy Chữ A Trơn Thanh Lịch',
                'giaban' => 429000,
                'mota' => 'Váy chữ A trơn màu thanh lịch, dáng xòe nhẹ nhàng',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Đầm Bodycon Ôm Body',
                'giaban' => 549000,
                'mota' => 'Đầm bodycon ôm body quyến rũ, vải thun co giãn tôn dáng',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Váy Denim Jean A-Line',
                'giaban' => 459000,
                'mota' => 'Váy denim jean chữ A năng động, phong cách trẻ trung',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Levi\'s',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Đầm Vintage Hoa Cổ Điển',
                'giaban' => 599000,
                'mota' => 'Đầm vintage họa tiết hoa cổ điển, vải voan mềm mại',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Forever 21',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Váy Tennis Thể Thao',
                'giaban' => 349000,
                'mota' => 'Váy tennis thể thao xòe nhẹ, vải thun co giãn thoải mái',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Nike',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Đầm Wrap Dress Quấn Eo',
                'giaban' => 529000,
                'mota' => 'Đầm wrap dress quấn eo tôn dáng, vải chiffon nhẹ nhàng',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Zara',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Váy Bút Chì Midi Công Sở',
                'giaban' => 479000,
                'mota' => 'Váy bút chì midi công sở thanh lịch, vải tuyết mưa cao cấp',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'H&M',
                'attributes' => ['color', 'shoe_size'],
            ],
            [
                'tensp' => 'Đầm Dạ Hội Sequin Lấp Lánh',
                'giaban' => 1299000,
                'mota' => 'Đầm dạ hội sequin lấp lánh sang trọng, thiết kế đuôi cá',
                'category' => 'Váy & Đầm',
                'thuonghieu' => 'Gucci',
                'attributes' => ['color', 'shoe_size'],
            ],
        ];

        $categoryIds = DB::table('categories')->pluck('id', 'name');
        $thuongHieuIds = DB::table('thuonghieu')->pluck('id', 'tenth');

        // Lấy tất cả giá trị biến thể theo type
        $colorValues = DB::table('bienthe_values')
            ->join('bienthe', 'bienthe_values.bienthe_id', '=', 'bienthe.id')
            ->where('bienthe.type', 'color')
            ->select('bienthe_values.id', 'bienthe_values.value')
            ->get();

        $sizeValues = DB::table('bienthe_values')
            ->join('bienthe', 'bienthe_values.bienthe_id', '=', 'bienthe.id')
            ->where('bienthe.type', 'size')
            ->select('bienthe_values.id', 'bienthe_values.value')
            ->get();

        $shoeSizeValues = DB::table('bienthe_values')
            ->join('bienthe', 'bienthe_values.bienthe_id', '=', 'bienthe.id')
            ->where('bienthe.type', 'shoe_size')
            ->select('bienthe_values.id', 'bienthe_values.value')
            ->get();

        foreach ($products as $index => $productData) {
            $categoryId = $categoryIds[$productData['category']] ?? null;
            $thuongHieuId = $thuongHieuIds[$productData['thuonghieu']] ?? null;

            if (!$categoryId || !$thuongHieuId) {
                continue;
            }
            // Tạo sản phẩm chính
            $productId = DB::table('sanpham')->insertGetId([
                'tensp' => $productData['tensp'],
                'hinhnen' => 'products/' . Str::slug($productData['tensp']) . '.jpg',
                'giaban' => $productData['giaban'],
                'slug' => Str::slug($productData['tensp']),
                'view' => rand(0, 5000),
                'star' => rand(3, 5),
                'mota' => $productData['mota'],
                'trangthai' => 1,
                'category_id' => $categoryId,
                'thuonghieu_id' => $thuongHieuId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Tạo variants dựa trên attributes
            $attributes = $productData['attributes'];

            if (in_array('color', $attributes) && in_array('size', $attributes)) {
                // Tạo variant cho mỗi tổ hợp Color + Size
                $selectedColors = $colorValues->random(min(4, $colorValues->count()));
                $selectedSizes = $sizeValues->random(min(3, $sizeValues->count()));

                foreach ($selectedColors as $color) {
                    foreach ($selectedSizes as $size) {
                        $this->createVariant(
                            $productId,
                            $productData,
                            $index,
                            [$color->id, $size->id],
                            $color->value . '-' . $size->value
                        );
                    }
                }
            } elseif (in_array('color', $attributes) && in_array('shoe_size', $attributes)) {
                // Tạo variant cho Giày: Color + Shoe Size
                $selectedColors = $colorValues->random(min(3, $colorValues->count()));
                $selectedShoeSizes = $shoeSizeValues->random(min(5, $shoeSizeValues->count()));

                foreach ($selectedColors as $color) {
                    foreach ($selectedShoeSizes as $shoeSize) {
                        $this->createVariant(
                            $productId,
                            $productData,
                            $index,
                            [$color->id, $shoeSize->id],
                            $color->value . '-Size' . $shoeSize->value
                        );
                    }
                }
            } elseif (in_array('color', $attributes)) {
                // Chỉ có màu sắc
                $selectedColors = $colorValues->random(min(4, $colorValues->count()));

                foreach ($selectedColors as $color) {
                    $this->createVariant(
                        $productId,
                        $productData,
                        $index,
                        [$color->id],
                        $color->value
                    );
                }
            }
        }

        $this->command->info('✅ Đã tạo sản phẩm và variants');
    }

    private function createVariant($productId, $productData, $index, $attributeValueIds, $variantSuffix)
    {
        $soluong = rand(20, 200);
        $sku = 'SP' . str_pad($productId, 4, '0', STR_PAD_LEFT) . '-' . strtoupper(Str::slug($variantSuffix));

        $variantId = DB::table('sanpham_variants')->insertGetId([
            'sanpham_id' => $productId,
            'sku' => $sku,
            'soluong' => $soluong,
            'giaban' => $productData['giaban'] + rand(-20000, 20000), // Giá có thể dao động
            'hinhanh' => null,
            'trangthai' => $soluong > 0 ? 1 : 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Gán các thuộc tính cho variant
        foreach ($attributeValueIds as $attributeValueId) {
            DB::table('variant_attribute_values')->insert([
                'variant_id' => $variantId,
                'bienthe_value_id' => $attributeValueId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
