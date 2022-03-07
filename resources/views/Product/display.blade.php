<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>found</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
          <div>
               <h2 class='name'>{{ $product->name }}</h2>
               <small class='user'>投稿者：{{ $product->user->name }}</small>
               <p class='photo'><img  width="300" src="{{ $product->photo }}"></p>
               <h5 class='body'>{{ $product->body }}</h5>
               <h6 class='category'>{{ $product->category->name }}</h6>
             @if( Auth::user()->id === $product->user_id)
               <p class="edit">[<a href="/products/{{ $product->id }}/edit">edit</a>]</p>
             @endif
          </div>
        <div class='back'>[<a href='/'>←Topページ</a>]</div>
    </body>
</html>
@endsection