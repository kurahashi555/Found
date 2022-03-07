<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>found</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
      <h2>検索結果</h2>
　　　　　<div>
　　　　　　　  <a href='/products/create'><h2>投稿</h2></a>
          　　    <a href='/products/search'><h2>検索</h2></a>
          　　    <div class='back'>[<a href='/'>←Topページ</a>]</div>
        　</div>
        　　@if(!empty($message)) <!--$messageが空じゃなければ実行-->
　　　　　　  <div>{{ $message}}</div>
　　　　　  @endif
        　<div class=searchresult>
        　 @if(isset($products))
  　　　    　　@foreach($products as $product)
     　　　　　          <p>-----------------------------------------------------</p>
                　  <h2 class='name'><a href='/products/{{ $product->id }}'>{{ $product->name }}</a></h2>
                　  <small class='user'><a href='/user/{{ $product->user->id }}'>投稿者：{{ $product->user->name }}</a></small>
                　  <p class='photo'><img  width="300" src="{{ $product->photo }}"></p>
                　  <h5 class='body'>{{ $product->body }}</h5>
                　  <h6 class='category'>カテゴリー名：{{ $product->category->name }}</h6>
                　  @if( Auth::user()->id === $product->user_id)
                　  <button><a href="/products/{{ $product->id }}/edit">edit</a></button>
                　  @endif
  　　　　   　　@endforeach
　　　　　 @endif
　　　　　</div>
    </body>
</html>
@endsection