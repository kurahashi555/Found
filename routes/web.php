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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/top', 'ProductController@index');
Route::get('/products/create', 'ProductController@create');
Route::get('/products/search', 'ProductController@search');
Route::get('/products/{product}', 'ProductController@display'); 
Route::get('/products/{product}/edit', 'ProductController@edit');
Route::get('/reference', 'ProductController@reference');
Route::post('/store', 'ProductController@store');
Route::put('/products/{product}', 'ProductController@update');
Route::delete('/products/{product}', 'ProductController@delete');
Auth::routes();