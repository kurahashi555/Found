<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>Found Category Search</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <div class="reference">
            <form action="/products/category/reference" method="GET">
               @csrf
                  <h3>カテゴリーで絞る</h3>
                  <select name="category">
                        　@foreach($categories as $category)
                         　　<option value="{{ $category->id }}">{{ $category->name }}</option>
                        　@endforeach
                　</select>
                  <input type="submit"value='実行'>
            </form>
       </div>
       <div class="back">[<a href="/">←Topページ</a>]</div>
    </body>
</html>
@endsection