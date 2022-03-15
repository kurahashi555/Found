<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Found Product Create</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <div class="post">
            <form action="/products/store" method="POST" enctype="multipart/form-data">
               @csrf
                  <h2>商品名</h2><br>
                          <input type="text" name="product[name]" placeholder="商品名"value="{{ old('product.name') }}" required autocomplete="off"/><br> 
                          <p class="title__error" style="color:red">{{ $errors->first('product.name') }}</p>
                          <!--エラーメッセージを表示。バリデーションエラーは、$errorsに格納され、View側に返却される。firstは$errorsからメッセージを取り出す関数-->
                  <h2>画像</h2><br>
                          <input type="file" name="photo" placeholder="写真を添付" value="{{ old('photo') }}" required /><br>
                          <p class="title__error" style="color:red">{{ $errors->first('photo') }}</p>
                  <h2>評価コメント</h2><br>
                          <textarea name="product[body]" placeholder="評価コメントを入力" required>{{ old('product.body') }}</textarea><br>
                          <p class="title__error" style="color:red">{{ $errors->first('product.body') }}</p>
                  <h2>カテゴリー選択</h2><br>
                          <select name="product[category_id]">
                             @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                             @endforeach
                          </select>
                          <p class="title__error" style="color:red">{{ $errors->first('product.category_id') }}</p>
                  <input type="submit" value="投稿"/><br>
            </form>
       </div>   
       <div class="back">[<a href="/">←Topページ</a>]</div>
    </body>
</html>
@endsection