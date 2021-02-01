<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::latest('id')
            ->sortByStatus($request->status)
//            ->sortByPaymentType($request->payment_type)
            ->paginate(config('app.per_page'));

        return view('dashboard.orders.index', compact('orders'));
    }
}
