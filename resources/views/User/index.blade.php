<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Found User Index</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <h3>ユーザー：{{ $user->name }}のマイページ</h3>
       <div class="profile">
            <h5>プロフィール</h5>
            <h6>{{ $user->profile }}</h6>
            <h6>ウェブサイトURL: <a href="/user/{{ $user->id }}/url">{{ $user->web_url }}</a></h6>
               @if( Auth::user()->id === $user->id)
                  <small><button><a href="/user/{{ $user->id }}/profileEdit">プロフィールを編集する</a></button></small>
               @endif
       </div>
       <div class="back">[<a href="/">←Topページ</a>]</div>
    　 <div class=own_products>
    　       <h4>【投稿一覧】</h4>
            @foreach($own_products as $products)
               <div class="contents">
                    <p>-----------------------------------------------------</p>
                    <h2 class="name"><a href='/products/{{ $products->id }}'>{{ $products->name }}</a></h2>
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
       <div class="paginate">
            {{ $own_products->links() }}
       </div>
    </body> 
</html>
@endsection