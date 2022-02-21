<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Product $product)
    {
     return view('index')->with(['product' => $product->getPaginateByLimit()]);
    }
    
    public function display(Product $product)
    {
     return view('display')->with(['product' => $product]);
    }
    
    public function create(Category $category)
    {
     return view('create')->with(['categories' => $category->get()]);;
    }
    
    public function search()
    {
     return view('search');
    }
    
    public function reference(Request $request)
    {
       $keyword_request = $request->input('keyword');//検索に入力されたキーワードを$keyword_requestに挿入
     
     if($keyword_request !== null)
        {
         $query = Product::query();
         $products = $query->where('name','like', '%' .$keyword_request. '%')->get();//productテーブルのnameカラムに$keyword_requestと同じ文字が入っているものを取得
         $message= "「". $keyword_request."」を含む名前の検索が完了しました。";
         return view('searchIndex')->with([
          'products' => $products,
          'message' => $message,
          ]);
         }
     else 
        {
         $message = "キーワードを入力してください。";
           return view('searchindex')->with('message',$message);
        }
    }
       
    public function store(Product $product , ProductRequest $request)
    {/*ユーザの入力データをproductテーブルにアクセスし保存する必要があるため、
       空のPostインスタンスを利用
    */
     $input = $request['product'];//productをキーにもつリクエストパラメータを取得
     $product->fill($input)->save();
     return redirect('/products/' . $product->id);
    }
    
    public function edit(Product $product ,  Category $category)
    {
     return view('edit')->with([
      'product' => $product,
      'categories' => $category->get(),
      ]);
    }
    
    public function update(Product $product , ProductRequest $request)
    {
     $input_post = $request['product'];
     $product->fill($input_post)->save();
     
     return redirect('/products/' . $product->id);
    }
    
    public function delete(Product $product)
    {
     $product->delete();
     return redirect('/top');
    }
}
