<?php

//認証されている人だけが見られるルーティング
Route::group(['middleware' => 'auth'], function(){

    //STEP登録
    Route::get('/create-steps', 'StepController@showCreateForm')->name('steps.create');
    Route::post('/create-steps', 'StepController@create');

    //子STEPをクリアする
    Route::post('/clear-childsteps/{challenge}/{childstep}', 'StepController@clear')->name('childsteps.clear');

    //STEPにチャレンジする
    Route::post('/detail-steps/{step}', 'StepController@challenge');

    //プロフィール編集
    Route::get('/edit-profile', 'UserController@showEditForm')->name('profile.edit');
    Route::post('/edit-profile', 'UserController@editProfile');

    //パスワード変更
    Route::get('/edit-password', 'UserController@passwordEditForm')->name('password.edit');
    Route::post('/edit-password', 'UserController@editPassword');

    //マイページ
    Route::get('/show-mypage', 'StepController@mypageShow')->name('mypage.show');
});

//STEP詳細ページ
Route::get('/detail-steps/{step}', 'StepController@detail')->name('steps.detail');

//トップページ(ABOUTページ)
Route::get('/home', 'HomeController@index')->name('home');

//カテゴリー指定しない場合のSTEP一覧
Route::get('/show-steps', 'StepController@index')->name('steps.index');
Route::get('ajax/step', 'Ajax\StepController@index');

//カテゴリー指定した場合のSTEP一覧
Route::get('/show-steps/{step}', 'StepController@categoryIndex')->name('steps.category.index');
Route::get('ajax/step/{step}', 'Ajax\StepController@categoryIndex');

//プロフィール閲覧
Route::get('/show-profile/{user}', 'UserController@showProfile')->name('profile.show');

//ユーザ登録、ログイン、パスワードリマインダー
Auth::routes();


