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
         <h6>ユーザー名：{{Auth::user()->name}}</h6>
          <div>
　　         <h2><a href='/products/create'>投稿</a></h2>
             <h2><a href='/products/search'>検索</a></h2>
          </div>
          <div class=product>
            @foreach ($product as $products)
                    <p>-----------------------------------------------------</p>
                　  <h2 class='name'><a href='/products/{{ $products->id }}'>{{ $products->name }}</a></h2>
                　  <small class='user'><a href='/user/{{ $products->user->id }}'>投稿者：{{ $products->user->name }}</a></small>
                 　 <p class='photo'><img  width="300" src="{{ $products->photo }}"></p>
                　  <h5 class='body'>{{ $products->body }}</h5>
                　  <h6 class='category'>{{ $products->category->id}}</h6>
                　  <button><a href="/products/{{ $products->id }}/edit">edit</a></button>
             @endforeach
          </div>
          <div class='paginate'>
             {{ $product->links() }}
         </div>
    </body>
</html>
@endsection