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
        Schema::create('thuonghieu', function (Blueprint $table) {
            $table->id();
            $table->string('tenth');
            // Khang 08/01/2026 thêm logo,slug
            $table->text('logo');
            $table->string('slug');
            $table->text('mota')->nullable();
            $table->tinyInteger('trangthai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuonghieu');
    }
};
