<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Found Product Index</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <h4>ユーザー名：{{Auth::user()->name}}</h4>
       <h5><a href='/user/{{ Auth::user()->id }}'>マイページ</a></5>
       <div class=function>
　　        <h2><a href='/products/create'>投稿</a></h2>
            <h2><a href='/products/search'>投稿検索</a></h2>
            <h2><a href='/products/category'>カテゴリー検索</a></h2>
       </div>
       <div class="product">
            @foreach($product as $products)
               <div class="contents">
                    <p>-----------------------------------------------------</p>
                    <h2 class="name"><a href="/products/{{ $products->id }}">{{ $products->name }}</a></h2>
             　      <small class="user"><a href="/user/{{ $products->user->id }}">投稿者：{{ $products->user->name }}</a></small>
                    <p class="photo"></p><img  width="300" src="{{ $products->photo }}"></p>
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
                 　 @if( Auth::user()->id === $products->user_id  )
        　              <button><a href="/products/{{ $products->id }}/edit">編集</a></button>
        　           @endif
        　      </div>
       　  　@endforeach   
       </div>
       <div class="paginate">
             {{ $product->links() }}
       </div>
    </body>
</html>
@endsection