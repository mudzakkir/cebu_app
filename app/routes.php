<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

// usersにアクセスしたら、UserControllerを起動する
Route::resource('users', 'UserController');

// postsにアクセスしたら、PostControllerを起動する
Route::resource('posts', 'PostController');

// 検索機能
Route::get('posts', 'PostController@getSearch');


// contactsにアクセスしたら、ContactControllerを起動する
Route::resource('contacts', 'ContactController');


// ログインページを表示させるルーティング
Route::get('login', array('uses' => 'HomeController@showLogin'));

// ログインページのポスト機能のルーティング
Route::post('login', array('uses' => 'HomeController@doLogin'));

// ログアウト処理のルーティング
Route::get('logout', array('uses' => 'HomeController@doLogout'));

// ログインしていないユーザーは投稿ができないようにする
Route::get('posts/create', array(
	'before' => 'auth',
	function(){
		// ログイン済のユーザーは投稿ページにリダイレクト
		return View::make('posts.create');
	}
));

