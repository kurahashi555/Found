<?php


use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function(){
        Route::get('/', 'ProductController@index');
     Route::prefix('products')->group(function () {
        Route::get('/search', 'ProductController@search');
        Route::get('/reference', 'ProductController@reference');
        Route::get('/category', 'CategoryController@search');
        Route::get('/category/reference', 'CategoryController@reference');
        Route::get('/category/{category}', 'CategoryController@index')->name('category');
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');
        Route::get('/{product}', 'ProductController@display'); 
        Route::get('/like/{product}', 'LikeController@like')->name('like');
        Route::get('/unlike/{product}', 'LikeController@unlike')->name('unlike');
        Route::get('/{product}/edit', 'ProductController@edit');
        Route::put('/{product}', 'ProductController@update');
        Route::delete('/{product}', 'ProductController@delete');
     });
     Route::prefix('user')->group(function () {
        Route::get('/{user}', 'UserController@index')->name('user');
        Route::get('/{user}/url', 'UserController@url');
        Route::get('/{user}/profileEdit', 'UserController@edit');
        Route::put('/{user}', 'UserController@update');
     });
  });//ログインしている時のみ実行可能。ログインしてないとログインページにリダイレクトされる
Auth::routes();