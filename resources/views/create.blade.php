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
        <form action="/store" method="POST">
          @csrf<!--←必須　POSTの時　Formタグの内側に@csrfというBladeディレクティブを定義、HTML変換する際に自動的に必要なHTMLタグを生成する -->
          <div class="post">
            <h2>商品名</h2><br>
                <input type="text" name="product[name]" placeholder="商品名"/><br> 
            <h2>画像</h2><br>
                <input type="text" photo="product[photo]" placeholder="写真を添付"/><br>
            <h2>評価コメント</h2><br>
                <textarea name="product[body]" placeholder="評価コメントを入力"></textarea><br>
            <input type="submit" value="投稿"/><br>
          </div>   
        </form>
          <div class='back'>[<a href='/'>back</a>]</div>
    </body>
</html>