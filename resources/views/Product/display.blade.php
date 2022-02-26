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
        <h1>FOUND</h1>
          <div>
               <h2 class='name'>{{ $product->name }}</h2>
               <small>{{ $product->user->name }}</small>
               <p class='photo'>{{ $product->photo}}</p>
               <h5 class='body'>{{ $product->body }}</h5>
               <h6 class='category'>{{ $product->category->name }}</h6>
               <p class="edit">[<a href="/products/{{ $product->id }}/edit">edit</a>]</p>
          </div>
      <div class='back'>[<a href='/'>back</a>]</div>
    </body>
</html>
@endsection