<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BienTheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Màu sắc thời trang
        $colors = [
            ['name' => 'Đen', 'hex' => '#000000'],
            ['name' => 'Trắng', 'hex' => '#FFFFFF'],
            ['name' => 'Xám', 'hex' => '#808080'],
            ['name' => 'Be', 'hex' => '#F5F5DC'],
            ['name' => 'Xanh Navy', 'hex' => '#000080'],
            ['name' => 'Xanh Dương', 'hex' => '#0000FF'],
            ['name' => 'Xanh Lá', 'hex' => '#008000'],
            ['name' => 'Đỏ', 'hex' => '#FF0000'],
            ['name' => 'Cam', 'hex' => '#FFA500'],
            ['name' => 'Vàng', 'hex' => '#FFFF00'],
            ['name' => 'Hồng', 'hex' => '#FFC0CB'],
            ['name' => 'Tím', 'hex' => '#800080'],
            ['name' => 'Nâu', 'hex' => '#A52A2A'],
            ['name' => 'Rêu', 'hex' => '#556B2F'],
            ['name' => 'Xanh Mint', 'hex' => '#98FF98'],
        ];

        foreach ($colors as $color) {
            DB::table('bienthe')->insert([
                'name' => $color['name'],
                'type' => 'color',
                'value' => $color['hex'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Size quần áo (theo chuẩn Việt Nam và quốc tế)
        $sizes = [
            // Size số
            ['name' => 'XS (36)', 'type' => 'size', 'value' => 'XS'],
            ['name' => 'S (38)', 'type' => 'size', 'value' => 'S'],
            ['name' => 'M (40)', 'type' => 'size', 'value' => 'M'],
            ['name' => 'L (42)', 'type' => 'size', 'value' => 'L'],
            ['name' => 'XL (44)', 'type' => 'size', 'value' => 'XL'],
            ['name' => 'XXL (46)', 'type' => 'size', 'value' => 'XXL'],
            ['name' => 'XXXL (48)', 'type' => 'size', 'value' => 'XXXL'],
        ];

        foreach ($sizes as $size) {
            DB::table('bienthe')->insert([
                'name' => $size['name'],
                'type' => $size['type'],
                'value' => $size['value'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Size giày (EU sizing)
        $shoeSizes = [
            35,
            36,
            37,
            38,
            39,
            40,
            41,
            42,
            43,
            44,
            45,
            46
        ];

        foreach ($shoeSizes as $size) {
            DB::table('bienthe')->insert([
                'name' => "Size {$size}",
                'type' => 'shoe_size',
                'value' => (string)$size,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Chất liệu
        $materials = [
            'Cotton 100%',
            'Polyester',
            'Cotton Blend',
            'Linen',
            'Denim',
            'Kaki',
            'Vải Thun',
            'Da Thật',
            'Da PU',
            'Vải Jean',
            'Vải Lụa',
            'Vải Nhung',
        ];

        foreach ($materials as $material) {
            DB::table('bienthe')->insert([
                'name' => $material,
                'type' => 'material',
                'value' => strtolower(str_replace(' ', '_', $material)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Kiểu dáng/Form
        $styles = [
            'Regular Fit',
            'Slim Fit',
            'Oversize',
            'Skinny',
            'Straight',
            'Crop Top',
            'Long Dress',
            'Mini Dress',
        ];

        foreach ($styles as $style) {
            DB::table('bienthe')->insert([
                'name' => $style,
                'type' => 'style',
                'value' => strtolower(str_replace(' ', '_', $style)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $total = count($colors) + count($sizes) + count($shoeSizes) + count($materials) + count($styles);
        $this->command->info('✅ Đã tạo ' . $total . ' biến thể thời trang');
        $this->command->info('   - ' . count($colors) . ' màu sắc');
        $this->command->info('   - ' . count($sizes) . ' size quần áo');
        $this->command->info('   - ' . count($shoeSizes) . ' size giày');
        $this->command->info('   - ' . count($materials) . ' chất liệu');
        $this->command->info('   - ' . count($styles) . ' kiểu dáng');
    }
}
