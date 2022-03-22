<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Found Product Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <h1 class="title">投稿編集</h1>
       <div class="post">
            <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
               @csrf 
               @method("PUT")
                  <h3>商品名</h3>
                          <input type='text' name='product[name]' value="{{ $product->name }}"autocomplete="off"><!--autocompleteは自動入力候補表示機能-->
                  <h3>画像<small>（※もう一度画像を選択してください）</small></h3>
                          <input type="file" name="photo" value="{{ $product->photo_type }}">
                  <h3>評価コメント</h3>
                 　        <textarea name='product[body]'>{{ $product->body }}</textarea>
                  <h3>カテゴリー選択</h3>
                          <select name="product[category_id]">
                  　        　@foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                  　 　        @endforeach
                　         </select>
                  <p><input type="submit" value="保存"></p>
            </form>
       </div>
       <div class="delete">
            <form action="/products/{{ $product->id }}" id="form_delete" method="POST" >
               @csrf
               @method('DELETE')
                  <button type="button" onclick="return deletePost(this);">投稿削除</button>
                  <script>
                     function deletePost()
                     {
                       'use strict'; 
                           
                        if(confirm('本当に削除しますか？'))
                        {
                          document.getElementById('form_delete').submit();
                        }
                     }
                  </script>
            </form>
       </div>
       <div class="back">[<a href="/">編集せずに戻る→</a>]</div>
    </body>
</html>
@endsection