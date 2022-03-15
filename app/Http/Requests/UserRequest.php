<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        //rulesという関数で返却する配列にバリデーションを適用するルール.データ保存時のエラー表示の基準
        return [
            'user.profile' => 'string|max:160',
            'use.web_url' => 'string',
          
        ];
    }
    
    public function messages()
    {
        return [
            'string' => '文字列のみです。',
            'max' => '160文字以内で入力してください。',
        ];
    }
}
