<?php

use App\Http\Controllers\Client\Auth\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Server\CategoryController;
use App\Http\Controllers\Server\DashboardServerController;
use App\Http\Controllers\Server\UserController;
use App\Http\Controllers\Server\ProductController;
use App\Http\Controllers\Server\BrandController;
use App\Http\Controllers\Server\ServerOrderController;
use App\Http\Controllers\Server\VariantController;
use App\Http\Controllers\Server\ContactController;
use App\Http\Controllers\Server\SlideController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\ClientOrderCOntroller;
// ======================================CLIENT==============================================//
//Route::get('/', [DashboardClientController::class, 'index'])->name('layouts');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('/auth')->group(function () {
    Route::get('register', [AuthController::class, 'create'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('active-email/{email}', [AuthController::class, 'active'])->name('auth.active.email');

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('client.profile.index');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('client.profile.update');

    // ================= KHU VỰC ORDER (Quản lý đơn hàng) =================
    // Tên route: client.orders.index
    Route::get('/profile/orders', [ClientOrderController::class, 'index'])
        ->name('client.orders.index');

    // Xem chi tiết đơn hàng (nếu cần sau này)
    Route::get('/profile/orders/{id}', [ClientOrderController::class, 'show'])
        ->name('client.orders.show');
    
    // Hủy đơn hàng
    Route::post('/profile/orders/{id}/cancel', [ClientOrderController::class, 'cancel'])
        ->name('client.orders.cancel');
});


//========================================SERVER============================================//

Route::prefix('/v1/admin')->group(function () {
    Route::get('dashboard', [DashboardServerController::class, 'index'])->name('admin.layouts');

    // ==================USER====================//
    Route::prefix('users')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('server.users.index');
        Route::get('create', [UserController::class, 'create'])->name('server.users.create');
        Route::post('store', [UserController::class, 'store'])->name('server.users.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('server.users.edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('server.users.update');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('server.users.destroy');
        Route::get('restore/{id}', [UserController::class, 'restore'])->name('server.users.restore');
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
        Route::get('index', [ServerOrderController::class, 'index'])->name('server.orders.index');
        Route::get('detail/{id}', [ServerOrderController::class, 'show'])->name('server.orders.show');

        // 3. Cập nhật trạng thái
        // URL: /admin/orders/update/1
        // Tên route: server.orders.update
        Route::post('update/{id}', [ServerOrderController::class, 'update'])->name('server.orders.update');
    });

    // =================VARIANT================//
    Route::prefix('/variants')->group(function () {
        Route::get('index', [VariantController::class, 'index'])->name('variants.index');
    });

    // =================CONTACT================//
    Route::prefix('/contacts')->group(function () {
        Route::get('index', [ContactController::class, 'index'])->name('contacts.index');
    });

    // =================SLIDE================//
    Route::prefix('/slides')->group(function () {
        Route::get('index', [SlideController::class, 'index'])->name('slides.index');
    });
})->middleware(['auth']);