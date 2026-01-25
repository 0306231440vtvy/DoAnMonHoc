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
        Schema::table('ct_hoadon', function (Blueprint $table) {
            $table->unsignedBigInteger('variant_id')->nullable()->after('sanpham_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ct_hd', function (Blueprint $table) {
            //
        });
    }
};
