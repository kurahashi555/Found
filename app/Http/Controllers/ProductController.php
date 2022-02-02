<?php

namespace App\Http\Controllers;

use App\Product;
use  Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class ProductController extends Controller
{
    public function index(Product $product)
    {
     return view('index')->with(['products' => $product->get()]);
    }
    
    public function display(Product $product)
    {
     return view('display')->with(['product' => $product]);
    }
    
    public function create()
    {
     return view('create');
    }
    
    public function store(Product $product , ProductRequest $request)
    {/*ユーザの入力データをproductテーブルにアクセスし保存する必要があるため、
       空のPostインスタンスを利用
    */
     $input = $request['product'];//productをキーにもつリクエストパラメータを取得
     $product->fill($input)->save();
     return redirect('/store/' . $product->id);
    }
}
