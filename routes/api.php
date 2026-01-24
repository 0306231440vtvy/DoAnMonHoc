<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Server\RoleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('/v1/server')
    ->group(function () {
        Route::prefix('/roles')->group(function () {
            Route::get('index', [RoleController::class, 'index']);
            Route::get('show/{id}', [RoleController::class, 'show']);
            Route::post('store', [RoleController::class, 'store']);
            Route::put('update/{id}', [RoleController::class, 'update']);
            Route::delete('delete/{id}', [RoleController::class, 'delete']);
            Route::post('restore/{id}', [RoleController::class, 'restore']);
            Route::delete('trash/{id}', [RoleController::class, 'trash']);
        });
    });
