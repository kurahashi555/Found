<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>Found Product Search</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <div class="reference">
            <form action="/products/reference" method="GET">
               @csrf
                  <h3>キーワード検索</h3>
                  <input type="text" name="keyword">
                  <input type="submit"value='検索'>
            </form>
       </div>
       <div class="back">[<a href="/">←Topページ</a>]</div>
    </body>
</html>
@endsection