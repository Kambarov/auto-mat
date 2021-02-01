<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Site\CheckoutRequest;
use App\Http\Resources\OrderResource;
use App\Models\Orders\Order;
use App\Models\Orders\OrderItem;
use App\Models\Product;
use App\Models\Client;
use App\Models\User;
use App\Services\Site\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    public function show($id)
    {
        $order = Order::with('status', 'items', 'order_delivery')->where('unique_id', $id)->firstOrFail();
        return new OrderResource($order);
    }

    public function checkout(CheckoutRequest $request)
    {
        $order = $this->service->checkout($request->validated());

        return new OrderResource($order);
    }

    public function downloadPDF(Order $order)
    {
        $pdf = PDF::loadView('pdf', compact('order'));
        return $pdf->download("$order->unique_id.pdf");
    }
}
