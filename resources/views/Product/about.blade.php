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
       <div class="about">
            <h3>About Found</h3>
            <h5>[ ここでしか出会えない商品を見つけることができる ] というコンセプトから、「見つけた」という英単語のfoundを名前にしました。</h5>
            <h4>お問い合わせ</h4>
            <small>不具合などがございましたらこちらへご連絡ください。</small>
            <small>action.kura@gmail.com</small>
       </div>
       <div class="back">[<a href="/">←Topページ</a>]</div>
    </body>
</html>
@endsection