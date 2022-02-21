<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        //ulesという関数で返却する配列にバリデーションを適用するルール.データ保存時のエラー表示の基準
        return [
            'product.name' => 'required|string|max:30',
            'product.photo' => 'required|string|',
            'product.body' => 'required|string|',
            'product.category_id' =>'required',
        ];
    }
}
