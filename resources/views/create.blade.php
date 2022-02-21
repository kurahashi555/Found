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
                <input type="text" name="product[name]" placeholder="商品名"value="{{ old('product.name') }}"/><br> 
                <p class="title__error" style="color:red">{{ $errors->first('product.name') }}</p>
                <!--エラーメッセージを表示。バリデーションエラーは、$errorsに格納され、View側に返却される。firstは$errorsからメッセージを取り出す関数-->
            <h2>画像</h2><br>
                <input type="text" name="product[photo]" placeholder="写真を添付" value="{{ old('product.photo') }}"/><br>
                <p class="title__error" style="color:red">{{ $errors->first('product.photo') }}</p>
            <h2>評価コメント</h2><br>
                <textarea name="product[body]" placeholder="評価コメントを入力">{{ old('product.body') }}</textarea><br>
                <p class="title__error" style="color:red">{{ $errors->first('product.body') }}</p>
            <h2>カテゴリー選択</h2><br>
                <select name="product[category_id]">
                  @foreach($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                <p class="title__error" style="color:red">{{ $errors->first('product.category_id') }}</p>
            <input type="submit" value="投稿"/><br>
          </div>   
        </form>
          <div class='back'>[<a href='/top'>back</a>]</div>
    </body>
</html>