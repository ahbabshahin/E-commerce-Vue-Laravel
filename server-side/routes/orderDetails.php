<?php

use App\Http\Controllers\OrderDetailsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| orderDetails Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1'], function () {
      Route::get('orderDetails', [OrderDetailsController::class, 'index']);
      Route::post('orderDetails', [OrderDetailsController::class, 'store']);
      Route::get('orderDetails/{orderDetail}', [OrderDetailsController::class, 'show']);
      Route::put('orderDetails/{orderDetail}', [OrderDetailsController::class, 'update']);
      Route::delete('orderDetails/{orderDetail}', [OrderDetailsController::class, 'destroy']);
});
