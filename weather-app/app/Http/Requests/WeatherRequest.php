<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeatherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
            'api_key' => 'nullable|string',

        ];
    }
}
