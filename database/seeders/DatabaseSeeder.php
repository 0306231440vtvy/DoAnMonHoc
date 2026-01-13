<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sanpham;
use App\Models\Hoadon;
use App\Models\CtHoadon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            BienTheSeeder::class,
            CategorySeeder::class,
            ThuongHieuSeeder::class,
            ProductSeeder::class,
            SlidersSeeder::class,
            HoadonSeeder::class,
            CTHoadonSeeder::class,

        ]);
    }
}
