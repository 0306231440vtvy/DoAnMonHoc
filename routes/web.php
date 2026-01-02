<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\DashboardClientController;

Route::get('/', [DashboardClientController::class, 'index'])->name('layouts');
