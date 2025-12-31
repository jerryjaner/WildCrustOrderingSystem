<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\ShippingAddressController;

// Auth routes
require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('customer.home');

// Customer routes - only for authenticated users with 'user' role
Route::middleware(['auth', 'role:user'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {


        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

        Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');

        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/store', [CartController::class, 'storeToCart'])->name('cart.store');
        Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
        Route::post('cart/remove-item', [CartController::class, 'removeItem'])->name('cart.removeItem');


        Route::get('/shipping-address/record', [ShippingAddressController::class, 'record'])->name('shipping-address.record');
        Route::resource('/shipping-address', ShippingAddressController::class)->except(['create']);

        Route::get('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
        Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

});



// Admin routes - only for authenticated admins
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
