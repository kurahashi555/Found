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
      <h1>ユーザー：{{ $user->name }}のマイページ</h1>
      <div class=profile>
         <h5>プロフィール</h5>
         <h6>{{ $user->profile }}</h6>
         <h6>ウェブサイトURL: <a href="/user/{{ $user->id }}/url">{{ $user->web_url }}</a></h6>
           @if( Auth::user()->id === $user->id)
             <small><button><a href="/user/{{ $user->id }}/profileEdit">プロフィールを編集する</a></button></small>
           @endif
      </div>
      <div class=back>[<a href='/'>←Topページ</a>]</div>
    　<div class=own_products>
    　   <h4>【投稿一覧】</h4>
         @foreach($own_products as $products)
             <p>-----------------------------------------------------</p>
             <h2 class='name'><a href='/products/{{ $products->id }}'>{{ $products->name }}</a></h2>
             <p class='photo'><img  width="300" src="{{ $products->photo }}"></p>
             <h5 class='body'>{{ $products->body }}</h5>
             <h6 class='category'>カテゴリー名：{{ $products->category->name}}</h6>
           @if( Auth::user()->id === $products->user_id)
             <button><a href="/products/{{ $products->id }}/edit">edit</a></button>
           @endif
         @endforeach
    　</div>
      <div class=paginate>
         {{ $own_products->links() }}
      </div>
    </body> 
</html>
@endsection