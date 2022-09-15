<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::resource('posts', '\App\Http\Controllers\PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login2', 'LoginController2@show');
#Route::post('/login2', 'LoginController2@login')->name('login2');
#Route::post('/logout2', 'LoginController2@logout')->name('logout2');

Route::get('/product', 'ProductController@show')->name('product');

