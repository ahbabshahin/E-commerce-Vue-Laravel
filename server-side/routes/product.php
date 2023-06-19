<?php

use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| product Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1'], function () {
      Route::get('products', [ProductController::class, 'index']);
      Route::post('products/{product}', [ProductController::class, 'store']);
      Route::get('products/{product}', [ProductController::class, 'show']);
      Route::put('products/{product}', [ProductController::class, 'update']);
      Route::delete('products/{product}', [ProductController::class, 'destroy']);
});
