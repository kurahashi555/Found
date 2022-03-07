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
      <h3>ユーザー：{{ $user->name }}の投稿一覧</h3>
      <div class='back'>[<a href='/'>←Topページ</a>]</div>
         <div class="own_products">
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
      <div class='paginate'>
         {{ $own_products->links() }}
      </div>
    </body> 
</html>
@endsection