<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Catalog\CarController;
use App\Http\Controllers\Catalog\CategoryController;
use App\Http\Controllers\Catalog\ProductController;



Route::prefix('catalog')->name('catalog.')->group(function () {
    Route::get('/makers', [CarController::class, 'makers']);
    //Route::get('/{slug}', [CarController::class, 'list'])->name('cars');
    Route::get('/find-car', [CarController::class, 'list'])->name('cars');
    Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
    Route::get('/products/popular', [ProductController::class, 'popularProducts']);
});




