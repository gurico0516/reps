<?php
// 認証
Auth::routes();

// ホーム
Route::get('/', 'HomeController@home')->name('home');

// 投稿一覧
Route::get('index', 'PostController@index')->name('index');

// 詳細
Route::get('show/{post}', 'PostController@show')->name('show');

// コメント
Route::post('comment', 'CommentController@store')->name('comment');

Route::group(['middleware' => 'auth'], function() {
    // 登録
    Route::get('create', 'PostController@create')->name('create');
    Route::get('create-complete', 'PostController@getCreateComplete')->name('get-create-complete');
    Route::post('create-complete', 'PostController@postCreateComplete')->name('create-complete');

    // 編集
    Route::get('edit/{post}', 'PostController@edit')->name('edit');
    Route::get('edit-complete', 'PostController@getEditComplete')->name('get-edit-complete');
    Route::post('edit-complete/{post}', 'PostController@postEditComplete')->name('edit-complete');

    // 削除
    Route::get('delete-confirm/{post}', 'PostController@getDeleteConfirm')->name('delete-confirm');
    Route::get('delete-complete', 'PostController@getDeleteComplete')->name('get-delete-complete');
    Route::post('delete-complete/{post}','PostController@postDeleteComplete')->name('delete-complete');
});
