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
          <div class=product>
            @foreach ($products as $product)
            -----------------------------------------------------
                　  <a href='/products/{{ $product->id }}'><h2 class='name'>{{ $product->name }}</h2></a>
                　  <h4 class='photo'>{{ $product->photo }}</h4>
                　  <p class='body'>{{ $product->body }}</p>
            @endforeach
          </div>
    </body>
</html>