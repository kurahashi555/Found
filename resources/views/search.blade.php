<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>found search</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
      <h1>FOUND</h1>
        <form action='/reference' method="GET">
           @csrf
            <h3>キーワード検索</h3>
            <input type="text" name="keyword">
            <input type="submit"value='検索'>
        </form>
          <div class='back'>[<a href='/top'>back</a>]</div>
    </body>
</html>