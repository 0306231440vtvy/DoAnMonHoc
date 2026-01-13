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
        Schema::create('bienthe_sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sanpham_id')->constrained('sanpham')->cascadeOnDelete();
            $table->foreignId('bienthe_id')->constrained('bienthe')->cascadeOnDelete();
            $table->integer('soluong')->default(0);
            $table->decimal('giaban', 15, 2)->nullable();
            $table->string('sku', 50)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienthe_sanpham');
    }
};
