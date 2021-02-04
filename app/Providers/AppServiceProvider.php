<?php

namespace App\Providers;

use App\Models\Orders\Order;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('dashboard.partials.order.list', function ($view) {
            $view->with('order_count', Order::query()->where('paid', false)->count());
        });
    }
}
