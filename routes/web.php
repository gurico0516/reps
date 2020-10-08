<?php
// ログイン認証後アクセス可

// 認証
Auth::routes();

// ホーム画面
Route::get('/', 'HomeController@home')->name('home');

Route::get('index', 'PostsController@index')->name('index');
