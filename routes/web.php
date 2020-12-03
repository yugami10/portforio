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

// ホーム画面
Route::get('home', function() {
	return view('app.top');
})->name('home');


// メール送信機能のホーム画面
Route::get('/send', 'HomeController@index')->name('send.index');
Route::post('/send', 'HomeController@send')->name('send.post');

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

// メールの設定crud ※使わないメソッドは第三引数で、onlyの連想配列形式でホワイトリストを作成する必要あり。

// メールprefix
Route::prefix('setting')->group(function () {

	// 件名
	Route::resource('subject', 'Mail\SubjectController');

	// 宛先
	Route::resource('to', 'Mail\ToController');

	// 本文
	Route::resource('content', 'Mail\ContentController');
});
/*
// 時間
Route::resource('time', 'MailSendTimerController');

// 送信
Route::resource('send', 'SendController');
*/
