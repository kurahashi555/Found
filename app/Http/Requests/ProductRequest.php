<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product.name' => 'required|string|max:30',
            'product.photo' => 'required|string|',
            'product.body' => 'required|string|max200',
        ];
    }
}
