<?php

namespace App\Services\Site;

use App\Models\Orders\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class OrderService
{
    /**
     * @var Order
     */
    private $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function checkout(array $attributes)
    {
        $products = Product::query()
            ->whereIn('id', array_map(function ($product) {
                return $product['product_id'];
            }, $attributes['products']))
            ->get();

        $attributes['amount'] = array_reduce($attributes['products'], function ($result, $item) use ($products) {
            $result += $item['count'] * $products->find($item['product_id'])->price;
            return $result;
        });


        $attributes['order_status_id'] = $this->order->setCreatedStatus();
        $order = Order::query()->create($attributes);

        $order->order_delivery()->create($attributes);

        $order->items()->createMany(array_reduce($attributes['products'], function ($result, $item) use ($products) {
            $result[$item['product_id']] = [
                'quantity' => $item['count'],
                'price' => $item['count'] * $products->find($item['product_id'])->price,
                'product_id' => $products->find($item['product_id'])->id
            ];
            return $result;
        }, []));

        $order->setInProgressStatus();

        $order->load('order_delivery', 'items', 'status');

        return $order;
    }
}
