<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>found</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
      <h1>FOUND</h1>
      <h2>検索結果</h2>
　　　　　<div>
　　　　　　　  <a href='/products/create'><h2>投稿</h2></a>
          　　    <a href='/products/search'><h2>検索</h2></a>
          　　    <div class='back'>[<a href='/top'>back</a>]</div>
        　</div>
        　<div class=searchresult>
        　@if(isset($products))
  　　　　 　　　@foreach($products as $product)
     　　　　　          <p>-----------------------------------------------------</p>
                　  <a href='/products/{{ $product->id }}'><h2 class='name'>{{ $product->name }}</h2></a>
                　  <h4 class='photo'>{{ $product->photo }}</h4>
                　  <p class='body'>{{ $product->body }}</p>
  　　　　　　@endforeach
　　　　　@endif
　　　　　
　　　　　@if(!empty($message)) <!--$messageが空じゃなければ実行-->
　　　　　　  <div>{{ $message}}</div>
　　　　　@endif
          </div>
    </body>
</html>