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

// topページ
Route::get('/', 'TopController@top')->name('top');
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
// 投稿削除
Route::get('postsdelete/{post_id}', 'PostController@destroy');
// いいね一覧
Route::get('/likes/index', 'LikesController@index');
// いいね
Route::get('/posts/{post_id}/likes', 'LikesController@store');
// いいね取消
Route::get('/likes/{like_id}', 'LikesController@destroy');
// 検索
Route::get('/serch', 'TopController@serch');
