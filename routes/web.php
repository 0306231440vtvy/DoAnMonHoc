<?php

use App\Http\Controllers\Client\Auth\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ContactController as ClientContactController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Server\CategoryController;
use App\Http\Controllers\Server\DashboardServerController;
use App\Http\Controllers\Server\UserController;
use App\Http\Controllers\Server\ProductController;
use App\Http\Controllers\Server\BrandController;
use App\Http\Controllers\Server\OrderController;
use App\Http\Controllers\Server\VariantController;
use App\Http\Controllers\Server\ContactController;
use App\Http\Controllers\Server\SlideController;
use App\Http\Controllers\Server\RoleController;
use App\Http\Controllers\Server\PermissionController;
// ======================================CLIENT==============================================//
// Khang 09/01/2026 thêm routing cho profile,carts,products,contact
Route::prefix('/')->group(function () {
    Route::get('/', [DashboardClientController::class, 'index'])->name('layouts');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/carts', [CartController::class, 'index'])->name('carts');
    Route::get('/products', [ClientProductController::class, 'index'])->name('products');
    Route::get('/contact', [ClientContactController::class, 'index'])->name('contact');
    // Route::get('/categories/{slug}',[Catego])
});
Route::prefix('/auth')->group(function () {
    Route::get('register', [AuthController::class, 'create'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('active-email/{email}', [AuthController::class, 'active'])->name('auth.active.email');
});


//========================================SERVER============================================//

Route::prefix('/server')
    ->group(['middleware' => ['role:super-admin']], function () {
        Route::get('dashboard', [DashboardServerController::class, 'index'])->name('server.layouts');

        // ==================USER====================//
        Route::prefix('/user')->group(function () {
            Route::get('index', [UserController::class, 'index'])->name('users.index');
        });
        // 08/01/2026 Thêm name vào prefix categories và thêm route với role và permission
        // =================CATEGORY================//
        Route::prefix('/categories')->name('categories')->group(function () {
            Route::get('index', [CategoryController::class, 'index'])->name('.index');
            Route::get('create', [CategoryController::class, 'create'])->name('.create');
            Route::post('store', [CategoryController::class, 'store'])->name('.store');
            Route::post('edit', [CategoryController::class, 'edit'])->name('.edit');
            Route::post('destroy', [CategoryController::class, 'destroy'])->name('.destroy');
        });
        // =================ROLE================//
        Route::prefix('/roles')->name('roles')->group(function () {
            Route::get('index', [RoleController::class, 'index'])->name('.index');
            Route::get('create', [RoleController::class, 'create'])->name('.create');
        });
        // =================PERMISSION================//
        Route::prefix('/permissions')->name('permissions')->group(function () {
            Route::get('index', [PermissionController::class, 'index'])->name('.index');
            Route::get('create', [PermissionController::class, 'create'])->name('.create');
        });
        // 08/01/2026 Thêm name vào prefix categories và thêm route với role và permission
        // 11/01/2026 Thêm name vào prefix products và thêm route update,destroy
        // =================PRODUCT================//
        Route::prefix('/products')->name('products')->group(function () {
            Route::get('index', [ProductController::class, 'index'])->name('.index');
            Route::get('create', [ProductController::class, 'create'])->name('.create');
            Route::get('update', [ProductController::class, 'update'])->name('.update');
            Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('.destroy');
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
        // =================CONTACT================//
        Route::prefix('/contacts')->group(function () {
            Route::get('index', [ContactController::class, 'index'])->name('contacts.index');
        });

        // =================SLIDE================//
        Route::prefix('/slides')->group(function () {
            Route::get('index', [SlideController::class, 'index'])->name('slides.index');
        });
    });
