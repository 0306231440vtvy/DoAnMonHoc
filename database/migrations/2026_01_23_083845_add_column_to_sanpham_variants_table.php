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
        Schema::table('sanpham_variants', function (Blueprint $table) {
            $table->dropColumn('trangthai');
            $table->tinyInteger('trangthai')->default(1);
            $table->json('album')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sanpham_variants', function (Blueprint $table) {
            //
        });
    }
};
