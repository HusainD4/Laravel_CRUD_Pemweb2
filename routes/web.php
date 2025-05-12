<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductController::class);
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Jika tidak pakai Laravel Volt, hapus bagian ini
// Gantikan dengan route biasa jika ingin pakai halaman pengaturan
Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', function () {
        return view('settings.profile');
    })->name('settings.profile');

    Route::get('settings/password', function () {
        return view('settings.password');
    })->name('settings.password');

    Route::get('settings/appearance', function () {
        return view('settings.appearance');
    })->name('settings.appearance');
});

require __DIR__.'/auth.php';
