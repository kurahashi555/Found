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
         <div class="own_products">
             @foreach($own_products as $products)
                    <p>-----------------------------------------------------</p>
                　  <a href='/products/{{ $products->id }}'><h2 class='name'>{{ $products->name }}</h2></a>
                　  <small>{{ $products->user->name }}</small>
                　  <p class='photo'>{{ $products->photo }}</p>
                　  <h5 class='body'>{{ $products->body }}</h5>
                　 <h6 class='category'>{{ $products->category->id}}</h6>
                　 <button><a href="/products/{{ $products->id }}/edit">edit</a></button>
             @endforeach
          </div>
         <div class='paginate'>
             {{ $own_products->links() }}
         </div>
    </body>
</html>
@endsection