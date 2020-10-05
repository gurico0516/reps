<?php


    // //ログイン認証前
    // Route::group(['namespace' => 'Auth', 'as' => 'auth::'], function () {
    //     Route::get('login', 'LoginController@showLoginForm')->name('login');
    //     Route::post('login', 'LoginController@login');
    //     Route::post('logout', 'LoginController@logout')->name('logout');
    // });

    //---------------------------------------------------
    // ユーザー
    //---------------------------------------------------
    // Route::group(['prefix' => 'user', 'as' => 'user::'], function () {
    //     // 登録
    //     Route::get('create', 'UserController@create')->name('create');
    //     Route::get('create-confirm', 'UserController@getCreateConfirm');
    //     Route::get('create-from-confirm', 'UserController@getCreateFromConfirm')->name('create-from-confirm');
    //     Route::post('create-confirm', 'UserController@postCreateConfirm')->name('create-confirm');
    //     Route::get('create-complete', 'UserController@getCreateComplete')->name('get-create-complete');
    //     Route::post('create-complete', 'UserController@postCreateComplete')->name('create-complete');
    // });

    // ログイン認証後アクセス可

Auth::routes();
Route::get('/', 'HomeController@index')->name('index');

Route::get('/home', 'HomeController@top')->name('home');
