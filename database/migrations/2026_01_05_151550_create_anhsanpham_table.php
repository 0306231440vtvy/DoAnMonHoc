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
        Schema::create('anhsanpham', function (Blueprint $table) {
            $table->id();
            $table->string('duongdan')->nullable();
            $table->tinyInteger('trangthai')->default(1);
            $table->foreignId('sanpham_id')->constrained('sanpham')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anhsanpham');
    }
};
