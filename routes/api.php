<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\BasketController;
use App\Http\Controllers\ApiBilling\PaymeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::post('store-to-basket/{product}', [OrderController::class, 'storeToBasket']);

Route::post('submit-form', [OrderController::class, 'checkout']);
Route::get('orders/{id}', [OrderController::class, 'show']);

Route::post('payme', PaymeController::class);
