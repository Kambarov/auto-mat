<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone'                 => 'required',
                    'string',
                    'regex:/^(\+998)(33|88|91|93|94|95|97|98|99)[0-9]{7}$/',
            'full_name'             => 'required|string',
            'address'               => 'required|string',
            'products'              => 'required|array',
            'products.*.product_id' => 'required|numeric|exists:products,id',
            'products.*.count'      => 'required|numeric|min:1',
        ];
    }
}
