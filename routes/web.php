<?php

use App\Http\Controllers\OrderProductController;
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
        Route::post('/{product:id}', [ProductController::class, 'delete'])->name('delete');
    });

Route::prefix('orders')
    ->name('order.')
    ->group(function () {
        Route::get('/', [OrderProductController::class, 'index'])->name('index');
        Route::post('/add/{product}', [OrderProductController::class, 'add'])->name('add');
    });

require __DIR__.'/auth.php';
