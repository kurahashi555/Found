<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Found Product Display</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
       <div class="product">
            <h2 class="name">{{ $product->name }}</h2>
            <small class="user">投稿者：{{ $product->user->name }}</small>
            <p class="photo"><img  width="300" src="{{ $product->photo }}"></p>
            <h5 class="body">{{ $product->body }}</h5>
            <a href='/products/category/{{ $product->category->id }}'>カテゴリー名：{{ $product->category->name }}</a>
       </div>
       <div class="like">
            @if($like)
               <!-- ユーザーが「いいね」をしていたら、「いいね」取消用ボタンを表示 -->
	           <a href="{{ route('unlike', $product->id) }}" class="btn btn-success btn-sm">
	           <!-- 「いいね」の数を表示 -->
		       いいね {{ $product->likes->count() }}
               </a>
            @else
               <!-- ユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	           <a href="{{ route('like', $product) }}" class="btn btn-secondary btn-sm">
	           <!-- 「いいね」の数を表示 -->
		       いいね{{ $product->likes->count() }}
	           </a>
            @endif
       </div>
       <div class="edit">
            @if( Auth::user()->id === $product->user_id)
               <p class="edit">[<a href="/products/{{ $product->id }}/edit">編集</a>]</p>
            @endif
       </div>
       <div class="back">[<a href="/">←Topページ</a>]</div>
    </body>
</html>
@endsection