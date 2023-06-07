<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::post('register',[\App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::post('login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');

Route::group([
    'middleware' => request()->header('Authorization') ? 'auth:sanctum' : [],
], function () {
    Route::group([
        'prefix' => 'baskets',
        'as' => 'baskets.',
    ], function () {
        Route::post('/add/{product}', [BasketController::class, 'addItem'])->name('add-item');
        Route::put('/update/{item}', [BasketController::class, 'updateItem'])->name('update-item');
        Route::delete('/destroy/{item}', [BasketController::class, 'destroyItem'])->name('destroy-item');
    });
    Route::post('/checkout', [OrderController::class, 'store'])->name('order.checkout');
});
Route::group([
    'middleware' => 'auth:sanctum',
], function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
});

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('product.show');
