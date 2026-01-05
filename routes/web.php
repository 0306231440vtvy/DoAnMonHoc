<?php

use App\Http\Controllers\Client\Auth\AuthController;
use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream

Route::get('/', function () {
    return view('welcome');
});
=======
use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Server\CategoryController;
use App\Http\Controllers\Server\DashboardServerController;
use App\Http\Controllers\Server\UserController;

// ======================================CLIENT==============================================//
Route::get('/', [DashboardClientController::class, 'index'])->name('layouts');
Route::prefix('/auth')->group(function () {
    Route::get('register', [AuthController::class, 'create'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});


//========================================SERVER============================================//

Route::prefix('/v1/admin')->group(function () {
    Route::get('dashboard', [DashboardServerController::class, 'index'])->name('admin.layouts');

    // ==================USER====================//
    Route::prefix('/user')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('users.index');
    });


    // =================CATEGORY================//
    Route::prefix('/category')->group(function () {
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('store', [CategoryController::class, 'store']);
    });
})->middleware(['auth']);
>>>>>>> Stashed changes
