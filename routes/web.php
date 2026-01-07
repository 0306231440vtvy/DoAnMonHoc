<?php

use App\Http\Controllers\Client\Auth\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Server\CategoryController;
use App\Http\Controllers\Server\DashboardServerController;
use App\Http\Controllers\Server\UserController;
use App\Http\Controllers\Server\ProductController;
use App\Http\Controllers\Server\BrandController;
use App\Http\Controllers\Server\OrderController;
use App\Http\Controllers\Server\VariantController;
// ======================================CLIENT==============================================//
Route::get('/', [DashboardClientController::class, 'index'])->name('layouts');
Route::prefix('/auth')->group(function () {
    Route::get('register', [AuthController::class, 'create'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('active-email/{email}', [AuthController::class, 'active'])->name('auth.active.email');
});


//========================================SERVER============================================//

Route::prefix('/v1/admin')->group(function () {
    Route::get('dashboard', [DashboardServerController::class, 'index'])->name('admin.layouts');

    // ==================USER====================//
    Route::prefix('/user')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('users.index');
    });


    // =================CATEGORY================//
    Route::prefix('/categories')->group(function () {
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
    });

    // =================PRODUCT================//
    Route::prefix('/products')->group(function () {
        Route::get('index', [ProductController::class, 'index'])->name('products.index');
    });

    // =================BRAND================//
    Route::prefix('/brands')->group(function () {
        Route::get('index', [BrandController::class, 'index'])->name('brands.index');
    });

    // =================ORDER================//
    Route::prefix('/orders')->group(function () {
        Route::get('index', [OrderController::class, 'index'])->name('orders.index');
    });

    // =================VARIANT================//
    Route::prefix('/variants')->group(function () {
        Route::get('index', [VariantController::class, 'index'])->name('variants.index');
    });
})->middleware(['auth']);
