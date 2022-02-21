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
      {{Auth::user()->name}}
　　　　　<div>
　　　　　  　　<a href='/'><h2>ログイン</h2></a>
　　　　　      <a href='/products/create'><h2>投稿</h2></a>
          　　    <a href='/products/search'><h2>検索</h2></a>
        　</div>
          <div class=product>
            @foreach ($product as $products)
                    <p>-----------------------------------------------------</p>
                　  <a href='/products/{{ $products->id }}'><h2 class='name'>{{ $products->name }}</h2></a>
                　  <h4 class='photo'>{{ $products->photo }}</h4>
                　  <p class='body'>{{ $products->body }}</p>
                　
                　 <button><a href="/products/{{ $products->id }}/edit">edit</a></button>
            @endforeach
          </div>
          <div class='paginate'>
              {{ $product->links() }}
          </div>
    </body>
</html>