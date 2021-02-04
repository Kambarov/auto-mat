<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'unique_id' => $this->unique_id,
            'phone'     => $this->order_delivery->phone,
            'full_name' => $this->order_delivery->full_name,
            'address'   => $this->order_delivery->address,
            'total_price' => $this->amount,
            'order_status' => $this->status->name,
            'paid'       => $this->paid,
            'formatted_price' => $this->formatted_price,
            'finished_at' => $this->status->id === 3 ? $this->finished_at : null,
            'delivered_at' => $this->order_delivery->delivered ? $this->order_delivery->delivered_at : null,
            'payme_link' => [
                'url'  => 'https://checkout.paycom.uz',
                'merchant' => config('local.payme_billing_service.kassa_id'),
                'amount' => $this->amount * 100,
                'account' => [
                    'order_id' => $this->unique_id
                ]
            ],
            'created_at' => $this->created_at
        ];
    }
}
