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
        Schema::create('ct_hoadon', function (Blueprint $table) {
            $table->id();
            $table->double('thanhtien');
            $table->integer('soluong');
            $table->tinyInteger('trangthai')->default(1);
            $table->double('dongia');
            $table->foreignId('hoadon_id')->constrained('hoadon')->cascadeOnDelete();
            $table->foreignId('sanpham_id')->constrained('sanpham')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ct_hoadon');
    }
};