<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Found Product SearchIndex</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <h2>検索結果</h2>
　　　 <div class="function">
　　　　　 <a href="/products/create"><h2>投稿</h2></a>
           <a href="/products/search"><h2>検索</h2></a>
           <h2><a href='/products/category'>カテゴリー検索</a></h2>
       <div class="back">[<a href="/">←Topページ</a>]</div>
       </div>
        　  @if(!empty($message)) <!--$messageが空じゃなければ実行-->
　　　　　　   <div>{{ $message}}</div>
　　　　　  @endif
       <div class="searchresult">
        　  @if(isset($product))
        　      <div class="product">
  　　　           　　@foreach($product as $products)
  　　　           　　<div class="contents">
     　　　　　                  <p>-----------------------------------------------------</p>
                 　          <h2 class="name"><a href="/products/{{ $products->id }}">{{ $products->name }}</a></h2>
                 　          <small class="user"><a href="/user/{{ $products->user->id }}">投稿者：{{ $products->user->name }}</a></small>
                 　          <p class="photo"><img  width="300" src="{{ $products->photo }}"></p>
                 　          <h5 class="body">{{ $products->body }}</h5>
                 　          <a href='/products/category/{{ $products->category->id }}'>カテゴリー名：{{ $products->category->name }}</a>
                       </div>
                       <div class="stock">
                            @if($products->stock)
		                       売り切れ
                            @else
		                       販売中
                            @endif
                       </div>
                       <div class="like">
		                    いいね {{ $products->likes->count() }}
                       </div>
                       <div class="edit">
                 　          @if( Auth::user()->id === $products->user_id)
                 　             <button><a href="/products/{{ $products->id }}/edit">編集</a></button>
                 　          @endif
                       </div>
  　　　　          　　@endforeach
  　　　　         </div>
　　　　　  @endif
　　　 </div>
    </body>
</html>
@endsection