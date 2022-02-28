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
      <h1>FOUND</h1>
      <h4>ユーザー名：{{Auth::user()->name}}</h4>
          <div>
　　         <h2><a href='/products/create'>投稿</a></h2>
             <h2><a href='/products/search'>検索</a></h2>
          </div>
          <div class=product>
            @foreach ($product as $products)
                    <p>-----------------------------------------------------</p>
                　  <a href='/products/{{ $products->id }}'><h2 class='name'>{{ $products->name }}</h2></a>
                　  <small><a href='/user'>{{ $products->user->name }}</a></small>
                　  <p class='photo'>{{ $products->photo }}</p>
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