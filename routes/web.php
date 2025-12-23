<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
require __DIR__.'/auth.php';

// Admin routes
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // Category routes
        Route::get('/categories/record', [CategoryController::class, 'record'])->name('categories.record');
        Route::resource('categories', CategoryController::class)->except(['create']);

        // Product routes
        Route::get('/products/record', [ProductController::class, 'record'])->name('products.record');
        Route::resource('products', ProductController::class)->except(['create']);

});
