<?php

use App\Http\Controllers\Dashboard\ProductController;
use \Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\BillingController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('products', ProductController::class, [ 'as' => 'dashboard' ]);
Route::get('orders', [OrderController::class, 'index'])->name('dashboard.orders.index');

Route::get('settings', [SettingController::class, 'edit'])->name('dashboard.settings.edit');
Route::put('settings/{setting}', [SettingController::class, 'update'])->name('dashboard.settings.update');

Route::get('billings', [BillingController::class, 'index'])->name('dashboard.billings.index');
