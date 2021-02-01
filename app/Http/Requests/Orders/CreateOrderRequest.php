<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone'             => ['required',
                'string',
                'regex:/^(\+998)(33|88|91|93|94|95|97|98|99)[0-9]{7}$/'
            ],
            'name'              => 'required|string',
            'address'           => 'required|string',
            'products'          => 'required|array',
            'products.*.id'     => 'required|numeric|exists:products,id',
            'products.*.count'  => 'required|numeric|min:1',
        ];
    }
}
