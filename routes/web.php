<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth','role:admin'])->group(function () {
     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
});

require __DIR__.'/auth.php';
