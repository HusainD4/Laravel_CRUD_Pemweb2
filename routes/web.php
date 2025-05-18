<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Dashboard;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductController::class);

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('dashboard', [ProductController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


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
