<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>FOUND</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT')
                <h2>商品名</h2>
                   <input type='text' name='product[name]' value="{{ $product->name }}"autocomplete="off">//autocompleteは自動入力候補表示機能
                <h2>画像</h2>
                   <input type='text' name='product[photo]' value="{{ $product->photo }}"autocomplete="off">
                <h2>評価コメント</h2>
                　 <textarea name='product[body]'>{{ $product->body }}</textarea>
                <h2>カテゴリー選択</h2>
                   <select name="product[category_id]">
                  　　@foreach($categories as $category)
                     　　<option value="{{ $category->id }}">{{ $category->name }}</option>
                  　　@endforeach
                　 </select>
                <input type="submit" value="保存">
        </form>
    </div>
        <form action="/products/{{ $product->id }}" id="form_delete" method="POST" >
                @csrf
                @method('DELETE')
                <button type="button" onclick="return deletePost(this);">delete</button> 
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
    </body>
</html>
@endsection