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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
// 認証関係
Auth::routes();

// メール送信機能のホーム画面
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@send')->name('home.send');

// 初期画面
Route::get('/', function() {
	return view('app.home');
// 未ログイン時の画面を作成して表示させる
})->name('login');


// ユーザー登録、ログイン、ログアウト
Route::get('/register', function() {
	return view('register');
})->name('register_get');
Route::post('/register', 'PlayerController@register')->name('register_post');

Route::get('/login', function() {
	return view('login');
})->name('login_get');
Route::post('/login', 'PlayerController@login')->name('login_post');

Route::get('/logout', 'HomeController@logout')->name('logout');
