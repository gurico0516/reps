<?php
// 認証
Auth::routes();

// ホーム
Route::get('/', 'HomeController@home')->name('home');

// 投稿一覧
Route::get('index', 'PostsController@index')->name('index');

// 詳細
Route::get('show/{id}', 'PostsController@show')->name('show');
