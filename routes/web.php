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
     Route::get('/products/create', 'ProductController@create');
     Route::get('/products/search', 'ProductController@search');
     Route::get('/products/{product}', 'ProductController@display'); 
     Route::get('/products/{product}/edit', 'ProductController@edit');
     Route::get('/reference', 'ProductController@reference');
     Route::get('/categories/{category}', 'ProductController@index');
     Route::post('/store', 'ProductController@store');
     Route::put('/products/{product}', 'ProductController@update');
     Route::delete('/products/{product}', 'ProductController@delete');
     Route::get('/user/{user}', 'UserController@index');
  });//ログインしている時のみ実行可能。ログインしてないとログインページにリダイレクトされる
Auth::routes();