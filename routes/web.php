<?php

use App\Http\Controllers\CartProductController;
use \App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('products')
    ->name('product.')
    ->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/save', [ProductController::class, 'save'])->name('save');
        Route::post('/{product:id}/delete', [ProductController::class, 'delete'])->name('delete');
        Route::get('/{product:id}/detail', [ProductController::class, 'detail'])->name('detail');
        Route::get('/{product:id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::post('/{product:id}/update', [ProductController::class, 'update'])->name('update');
    });

Route::prefix('carts')
    ->name('cart.')
    ->group(function () {
        Route::get('/', [CartProductController::class, 'index'])->name('index');
        Route::post('/add/{product}', [CartProductController::class, 'add'])->name('add');
        Route::get('/clear', [CartProductController::class, 'clearCart'])->name('clear');
    });

Route::prefix('categories')
    ->name('category.')
    ->group(function () {
        Route::get('/', [CategoryProductController::class, 'index'])->name('index');
        Route::get('/create', [CategoryProductController::class, 'create'])->name('create');
        Route::post('/save', [CategoryProductController::class, 'save'])->name('save');
        Route::post('/{category:id}/delete', [CategoryProductController::class, 'delete'])->name('delete');
        Route::get('/{category:id}/edit', [CategoryProductController::class, 'edit'])->name('edit');
        Route::post('/{product:id}/update', [CategoryProductController::class, 'update'])->name('update');
    });

require __DIR__.'/auth.php';
