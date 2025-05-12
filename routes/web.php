<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductController::class);
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');



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
