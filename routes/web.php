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
use App\Http\Controllers\Server\RoleController;
// ======================================CLIENT==============================================//
Route::get('/', [HomeController::class, 'index'])->name('layouts');
//Thêm route gửi liên hệ
Route::post('/lien-he/send', [ClientContactController::class, 'send'])->name('contact.send');
Route::get('/san-pham', [ClientProductController::class, 'index'])->name('products');
Route::get('/chi-tiet-san-pham/{products}', [ClientProductController::class, 'show'])->name('client.products.show');
Route::get('/lien-he', [ClientContactController::class, 'index'])->name('contact');
// Route::get('/gio-hang', [CartController::class, 'index'])->name('carts');
Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkouts');

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
    //Route cho trang giỏ hàng
    Route::prefix('gio-hang')->name('carts')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('.index');
        Route::get('summary', [CartController::class, 'summary'])->name('.summary');
        Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('.add-to-cart');
        Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('.update-quantity');
        Route::post('delete', [CartController::class, 'delete'])->name('.delete');
        Route::post('clear', [CartController::class, 'clear'])->name('.clear');
        Route::post('checkout', [CartController::class, 'checkoutPrepare']);
        Route::post('/calculate-selected', [CartController::class, 'calculateSelected'])
            ->name('.calculate-selected');
    });
    Route::prefix('/profile')->name('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::post('/update', [ProfileController::class, 'update'])
            ->name('.update');
    });
    Route::prefix('/order')->name('order')->group(function () {
        // ================= KHU VỰC ORDER (Quản lý đơn hàng) =================
        // Tên route: orders.index
        Route::get('orders', [ClientOrderController::class, 'index'])
            ->name('.index');
        // Xem chi tiết đơn hàng (nếu cần sau này)
        Route::get('/orders/{id}', [ClientOrderController::class, 'show'])
            ->name('.show');
        // Hủy đơn hàng
        Route::post('/orders/{id}/cancel', [ClientOrderController::class, 'cancel'])
            ->name('.cancel');
    });
    //Thêm route cho trang thanh toán
    Route::prefix('/checkout')->name('checkout')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('.index');
        Route::post('/', [CheckoutController::class, 'store'])->name('.store');
        Route::get('bank/{order}', [CheckoutController::class, 'bank'])->name('.bank');
        Route::get('/success', [CheckoutController::class, 'success'])->name('.thanhcong');
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

Route::prefix('/server')->middleware(['auth', 'role:2,3'])
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
        Route::prefix('/categories')->middleware('role:3')->name('categories')->group(function () {
            Route::get('index', [CategoryController::class, 'index'])->name('.index');
            Route::get('create', [CategoryController::class, 'create'])->name('.create');
            Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('.edit');
            Route::post('store', [CategoryController::class, 'store'])->name('.store');
            Route::put('{id}/update', [CategoryController::class, 'update'])->name('.update');
            Route::delete('{id}/destroy', [CategoryController::class, 'destroy'])->name('.destroy');
        });
        // =================ROLE================//
        Route::prefix('/roles')->name('roles')->group(function () {
            Route::get('index', [RoleController::class, 'index'])->name('.index');
            Route::get('show/{id}', [RoleController::class, 'show'])->name('.show');
            Route::get('create', [RoleController::class, 'create'])->name('.create');
            Route::post('store', [RoleController::class, 'store'])->name('.store');
            Route::get('edit/{id}', [RoleController::class, 'edit'])->name('.edit');
            Route::put('update/{id}', [RoleController::class, 'update'])->name('.update');
            Route::delete('delete/{id}', [RoleController::class, 'delete'])->name('.delete');
            Route::post('restore/{id}', [RoleController::class, 'restore'])->name('.restore');
            Route::delete('trash/{id}', [RoleController::class, 'trash'])->name('.trash');
        });
        // =================PRODUCT================//
        Route::prefix('/products')->name('products')->group(function () {
            Route::get('index', [ProductController::class, 'index'])->name('.index');
            Route::get('show/{id}', [ProductController::class, 'show'])->name('.show');
            Route::get('create', [ProductController::class, 'create'])->name('.create');
            Route::post('store', [ProductController::class, 'store'])->name('.store');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('.edit');
            Route::put('update/{id}', [ProductController::class, 'update'])->name('.update');
            Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('.delete');
        });
        // =================BRAND================//
        Route::prefix('/brands')->name('brands')->group(function () {
            Route::get('index', [BrandController::class, 'index'])->name('.index');
            Route::get('show/{id}', [BrandController::class, 'show'])->name('.show');
            Route::get('create', [BrandController::class, 'create'])->name('.create');
            Route::post('store', [BrandController::class, 'store'])->name('.store');
            Route::get('edit/{id}', [BrandController::class, 'edit'])->name('.edit');
            Route::put('update/{id}', [BrandController::class, 'update'])->name('.update');
            Route::delete('delete/{id}', [BrandController::class, 'delete'])->name('.delete');
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
        Route::prefix('/contacts')->name('contacts')->group(function () {
            Route::get('index', [ContactController::class, 'index'])->name('.index');
            Route::put('{id}/update', [ContactController::class, 'update'])->name('.update');
            Route::delete('{id}/destroy', [ContactController::class, 'destroy'])->name('.destroy');
        });
        // =================SLIDE================//
        Route::prefix('/slides')->name('slides')->group(function () {
            Route::get('index', [SlideController::class, 'index'])->name('.index');
            Route::get('create', [SlideController::class, 'create'])->name('.create');
            Route::post('store', [SlideController::class, 'store'])->name('.store');
            Route::get('show/{id}', [SlideController::class, 'show'])->name('.show');
            Route::get('edit/{id}', [SlideController::class, 'edit'])->name('.edit');
            Route::put('update/{id}', [SlideController::class, 'update'])->name('.update');
            Route::delete('delete/{id}', [SlideController::class, 'delete'])->name('.delete');
        });
    });
