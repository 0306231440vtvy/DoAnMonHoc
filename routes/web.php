<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\Auth\AuthController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ContactController as ClientContactController;


use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProfileController;
// Them class checkout
use App\Http\Controllers\Client\CheckoutController;

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
use App\Http\Controllers\Client\ClientOrderCOntroller;
use App\Http\Controllers\Client\PageController;
// ======================================CLIENT==============================================//
use App\Http\Controllers\Server\RoleController;
// ======================================CLIENT==============================================//
Route::get('/', [HomeController::class, 'index'])->name('layouts');
Route::get('/products', [ClientProductController::class, 'index'])->name('products');
Route::get('/contact', [ClientContactController::class, 'index'])->name('contact');
// Route::get('/categories/{slug}',[Catego])
// Route::get('/gioi-thieu', function () {
//     return view('client.pages.gioithieu');
// })->name('gioi-thieu');
Route::controller(PageController::class)->group(function () {
    Route::get('thong-tin-ban-hang', 'salesInfo')->name('thong-tin-ban-hang');
    Route::get('dich-vu-ban-hang', 'saleService')->name('dich-vu-ban-hang');
    Route::get('chinh-sach-van-chuyen', 'sippingPolicy')->name('chinh-sach-van-chuyen');
    Route::get('chinh-sach-doi-tra', 'returnPolicy')->name('chinh-sach-doi-tra');
    Route::get('chinh-sach-bao-hanh', 'warrantyPolicy')->name('chinh-sach-bao-hanh');
    Route::get('bao-mat-thong-tin', 'privacyPolicy')->name('bao-mat-thong-tin');
    Route::get('gioi-thieu', 'aboutUs')->name('gioi-thieu');
});

Route::middleware('auth')->prefix('/')->group(function () {
    Route::get('/carts', [CartController::class, 'index'])->name('carts');
    Route::prefix('/profile')->name('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::post('/update', [ProfileController::class, 'update'])
            ->name('.update');
    });
    Route::prefix('/order')->name('order')->group(function () {
        // ================= KHU VỰC ORDER (Quản lý đơn hàng) =================
        // Tên route: orders.index
        Route::get('/orders', [ClientOrderController::class, 'index'])
            ->name('.index');
        // Xem chi tiết đơn hàng (nếu cần sau này)
        Route::get('/orders/{id}', [ClientOrderController::class, 'show'])
            ->name('.show');
        // Hủy đơn hàng
        Route::post('/orders/{id}/cancel', [ClientOrderController::class, 'cancel'])
            ->name('.cancel');
    });
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
Route::middleware('guest')->prefix('/auth')->group(function () {
    Route::get('register', [AuthController::class, 'create'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('active-email/{email}', [AuthController::class, 'active'])->name('auth.active.email');
});


//========================================SERVER============================================//

Route::prefix('/server')
    ->group(function () {
        Route::get('dashboard', [DashboardServerController::class, 'index'])->name('server.layouts');
        // ==================USER====================//
        Route::prefix('users')->name('users')->group(function () {
            Route::get('index', [UserController::class, 'index'])->name('.index');
            Route::get('create', [UserController::class, 'create'])->name('.create');
            Route::post('store', [UserController::class, 'store'])->name('.store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('.edit');
            Route::post('update/{id}', [UserController::class, 'update'])->name('.update');
            Route::get('delete/{id}', [UserController::class, 'destroy'])->name('.destroy');
            Route::get('restore/{id}', [UserController::class, 'restore'])->name('.restore');
        });
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
        // =================PRODUCT================//
        Route::prefix('/products')->name('products')->group(function () {
            Route::get('index', [ProductController::class, 'index'])->name('.index');
            Route::get('create', [ProductController::class, 'create'])->name('.create');
            Route::post('store', [ProductController::class, 'store'])->name('.store');
            Route::post('delete', [ProductController::class, 'delete'])->name('.delete');
        });

    // ==================USER====================//
    Route::prefix('/user')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('users.index');
    });
    // 08/01/2026 Thêm name vào prefix categories và thêm route với role và permission
    // =================CATEGORY================//
    Route::prefix('/categories')->name('categories')->group(function () {
        Route::get('index', [CategoryController::class, 'index'])->name('.index');
        Route::get('create', [CategoryController::class, 'create'])->name('.create');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('.edit');
        Route::post('store', [CategoryController::class, 'store'])->name('.store');
        Route::put('{id}', [CategoryController::class, 'update'])->name('.update');
        Route::delete('destroy/{id}', [CategoryController::class, 'destroy'])->name('.destroy');
    });
    // =================ROLE================//
    Route::prefix('/roles')->name('roles')->group(function () {
        Route::get('index', [RoleController::class, 'index'])->name('.index');
        Route::get('create', [RoleController::class, 'create'])->name('.create');
    });
    // =================PERMISSION================//
    Route::prefix('/permissions')->name('permissions')->group(function () {
        // Route::get('index', [PermissionController::class, 'index'])->name('.index');
        // Route::get('create', [PermissionController::class, 'create'])->name('.create');
    });
    // 08/01/2026 Thêm name vào prefix categories và thêm route với role và permission
    // =================PRODUCT================//
    Route::prefix('/products')->group(function () {
        Route::get('index', [ProductController::class, 'index'])->name('products.index');
    });
        // =================BRAND================//
        Route::prefix('/brands')->group(function () {
            Route::get('index', [BrandController::class, 'index'])->name('brands.index');
        });
        // =================ORDER================//
        Route::prefix('/orders')->name('orders')->group(function () {
            Route::get('index', [ServerOrderController::class, 'index'])->name('.index');
            Route::get('detail/{id}', [ServerOrderController::class, 'show'])->name('.show');

            // 3. Cập nhật trạng thái
            // URL: /update/1
            // Tên route: .update
            Route::post('update/{id}', [ServerOrderController::class, 'update'])->name('.update');
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
