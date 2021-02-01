<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string|in:'
                .config('constants.product_type.for_car').','
                .config('constants.product_type.for_home').','
                .config('constants.product_type.other'),
            'image_url' => 'nullable|image',
            'price' => 'required|numeric'
        ];
    }
}
