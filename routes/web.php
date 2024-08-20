<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']) -> name('products.index');
Route::post('product/{product:id}', [ProductController::class, 'delete']) -> name('product.delete');
Route::get('product/create', [ProductController::class, 'create']) -> name('product.create');
Route::post('product/save', [ProductController::class, 'save']) -> name('product.save');

Route::get('/categories', [CategoryController::class, 'index']) -> name('categories.index');


