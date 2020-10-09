<?php
// 認証
Auth::routes();

// ホーム
Route::get('/', 'HomeController@home')->name('home');

// 投稿一覧
Route::get('index', 'PostController@index')->name('index');

// 詳細
Route::get('show/{id}', 'PostController@show')->name('show');

// コメント
Route::post('comment', 'CommentController@postComment')->name('comment');

// 登録
Route::get('create', 'PostController@create')->name('create');
Route::get('create-complete', 'PostController@getCreateComplete')->name('get-create-complete');
Route::post('create-complete', 'PostController@postCreateComplete')->name('create-complete');
