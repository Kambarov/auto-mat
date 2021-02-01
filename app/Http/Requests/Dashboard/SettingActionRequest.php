<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SettingActionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone'     => 'required|string',
            'email'     => 'required|string',
            'address'   => 'required|string',
            'socials'   => 'required|array',
            'socials.*' => 'required|string'
        ];
    }
}
