<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $title = "Bài viết công nghệ mẫu số " . $i . " - Đánh giá Laptop Gaming";
            DB::table('posts')->insert([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . time() . '-' . $i, // Đảm bảo slug không trùng
                'summary' => "Đây là đoạn tóm tắt ngắn gọn cho bài viết số $i. Laptop Gaming hiệu năng cao đang giảm giá...",
                'content' => "<p>Nội dung chi tiết của bài viết số $i...</p><p>Laptop ngày nay rất mạnh mẽ với CPU Intel Gen 13 và RTX 40 series.</p>",
                'image' => "https://via.placeholder.com/600x400?text=News+$i", // Ảnh giả lập
                'is_active' => true,
                'created_at' => now()->subDays($i), // Ngày tạo lùi dần để test sắp xếp
                'updated_at' => now(),
            ]);
        }
    }
}