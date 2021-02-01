<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Site\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('clear', function() {
   Artisan::call('config:clear');
   Artisan::call('cache:clear');
   Artisan::call('route:clear');
   Artisan::call('view:clear');
});


//handle requests from payment system
Route::any('/handle/{paysys}',function($paysys){
    (new Goodoneuz\PayUz\PayUz)->driver($paysys)->handle();
});

Route::match(['post', 'get'], 'pay/check/{order}', [OrderController::class, 'check'])->name('pay_check');

//redirect to payment system or payment form
Route::any('/pay/{paysys}/{key}/{amount}',function($paysys, $key, $amount) {
    $billing = \App\Models\Billing::find($key);
    $model = Goodoneuz\PayUz\Services\PaymentService::convertKeyToModel($key);
    $url = route('pay_check', $billing->order_id);
    $pay_uz = new Goodoneuz\PayUz\PayUz;
    $pay_uz
        ->driver($paysys)
        ->redirect($model, $amount, 860, $url);
})->name('payment.merchant');

require __DIR__.'/auth.php';
