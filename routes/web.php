<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product');

//Admin
Route::prefix('admin')->group(function () {

    Route::get('products', [AdminProductController::class, 'index'])->name('admin.product');

    Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('products/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');

    Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('products', [AdminProductController::class, 'store'])->name('admin.product.store');

    Route::get('products/{product}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
});
