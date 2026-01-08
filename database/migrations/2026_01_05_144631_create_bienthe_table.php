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
        Schema::create('bienthe', function (Blueprint $table) {
            $table->id();
            // Khang 08/01/2026 Xóa color,size,chất liệu.Thêm name,type,value
            $table->string('name');
            $table->string('type');
            $table->string('value');
            $table->tinyInteger('trangthai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienthe');
    }
};
