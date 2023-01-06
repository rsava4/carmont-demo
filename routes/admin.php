<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;


Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {

        Route::get('login', [LoginController::class, 'create'])
            ->name('admin.login');

        Route::post('login', [LoginController::class, 'store']);
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])
            ->name('admin.dashboard');
        Route::post('logout', [LoginController::class, 'destroy'])
            ->name('admin.logout');
    });

});




