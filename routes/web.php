<?php

//ログインしている人だけが見られるルーティング
Route::group(['middleware' => 'auth'], function(){

    //STEP登録
    Route::get('/create-steps', 'StepController@showCreateForm')->name('steps.create');
    Route::post('/create-steps', 'StepController@create');

    //プロフィール編集
    Route::get('/edit-profile', 'UserController@showEditForm')->name('profile.edit');
    Route::post('/edit-profile', 'UserController@editProfile');

    //パスワード変更
    Route::get('/edit-password', 'UserController@passwordEditForm')->name('password.edit');
    Route::post('/edit-password', 'UserController@editPassword');

    //マイページ
    Route::get('/show-mypage', 'StepController@mypageShow')->name('mypage.show');

    //STEPにチャレンジする
    Route::post('/detail-steps/{step}', 'StepController@challenge');

    //進捗に紐づくチャレンジのSTEPのuser_idとログインしているユーザのIDが同じときだけ見られるルーティング
    Route::group(['middleware' => 'can:view,progress'], function() {
        //子STEP進捗フォーム表示
        Route::get('/progress/edit/{progress}', 'ProgressController@edit')->name('progress.edit');
        //子STEP進捗編集
        Route::post('/progress/update/{progress}', 'ProgressController@update')->name('progress.update');
    });

    //STEPの作成者(user_id)とログインしているユーザのIDが同じときだけ見られるルーティング
    Route::group(['middleware' => 'can:view,step'], function() {

        //Step情報変更ページ
        Route::get('/edit-steps/{step}', 'StepController@stepEditForm')->name('steps.edit');
        Route::post('/edit-steps/{step}', 'StepController@edit')->name('steps.update');
    });




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


