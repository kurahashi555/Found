<!DOCTYPE html>
@extends('layouts.app')　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Found User Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <h1 class="title">プロフィール編集</h1>
       <div class="content">
            <form action="/user/{{ $user->id }}" method="post" enctype="multipart/form-data" action="/back">
               @csrf
               @method("PUT")
                  <p>プロフィール</p>
                          <textarea type='text' name='user[profile]'>{{ $user->profile }}</textarea>
                          <p class="title__error" style="color:red">{{ $errors->first('user.profile') }}</p>
                  <P>URL</P>
                          <input type='text' name='user[web_url]' placeholder="URLを入力してください" value="{{ $user->web_url }}" autocomplete="off">
                          <p class="title__error" style="color:red">{{ $errors->first('user.web_url') }}</p>
                  <p><input type="submit" value="保存"></p>
            </form>
       </div>
       <div class="back">[<a href="/user/{{ $user->id }}">保存せず戻る</a>]</div>
    </body>
</html>
@endsection