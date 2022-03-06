<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        //rulesという関数で返却する配列にバリデーションを適用するルール.データ保存時のエラー表示の基準
        return [
            'product.name' => 'required|string|max:30',
            'product.body' => 'required|string',
            'product.category_id' =>'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => '必須項目です。',
            'string' => '文字列のみです。',
            'max' => '30文字以内で入力してください。',
            'image' => '指定されたファイルが画像ではありません。',
            'mines' => '指定された拡張子（PNG/JPG/GIF）ではありません。',
        ];
    }
}
