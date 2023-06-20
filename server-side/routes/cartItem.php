<?php

use App\Http\Controllers\Api\V1\CartItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| cartItem Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1'], function () {
      Route::get('cartItems', [CartItemController::class, 'index']);
      Route::post('cartItems/{cartItem}', [CartItemController::class, 'store']);
      Route::get('cartItems/{cartItem}', [CartItemController::class, 'show']);
      Route::put('cartItems/{cartItem}', [CartItemController::class, 'update']);
      Route::delete('cartItems/{cartItem}', [CartItemController::class, 'destroy']);
});
