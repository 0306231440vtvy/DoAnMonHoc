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
            $table->tinyInteger('sku')->unique();
            $table->decimal('giaban');
            $table->string('slug');
            $table->tinyInteger('view')->default(0);
            $table->tinyInteger('star')->nullable();
            $table->string('mota')->nullable();
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
