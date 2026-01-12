<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('tensp');
            $table->string('hinhanh')->nullable();
            $table->integer('soluong');
            // Khang 08/01/2026 chỉnh lại giá trị sku, thêm discount,view,star
            $table->string('sku', 50)->unique();
            $table->decimal('giaban', 15, 2);
            $table->decimal('discount', 5, 2)->default(0);
            $table->integer('view')->default(0);
            $table->integer('star')->nullable();
            $table->string('slug');
            $table->string('mota')->nullable();
            $table->tinyInteger('trangthai')->default(1);
            $table->foreignId('bienthe_id')->constrained('bienthe')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('thuonghieu_id')->constrained('thuonghieu')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
