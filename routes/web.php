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

// topのroute記述（まだ作ってないよ）

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// プロフィール編集
Route::get('/mypage/edit', 'UsersController@edit');
Route::post('/mypage/update', 'UsersController@update');
// マイページ
Route::get('/mypage/{user_id}', 'UsersController@show');
// 投稿ページ
Route::get('/posts/edit', 'PostController@edit')->name('edit');
Route::post('/posts', 'PostController@store');
// 新着投稿ページ
Route::get('/posts/{post_id}', 'PostController@view');
