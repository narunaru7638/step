<?php


Route::group(['middleware' => 'auth'], function(){

    Route::get('/create-steps', 'StepController@showCreateForm')->name('steps.create');
    Route::post('/create-steps', 'StepController@create');

    Route::post('/clear-childsteps/{challenge_id}/{childstep_id}', 'StepController@clear')->name('childsteps.clear');

    Route::get('/detail-steps/{id}', 'StepController@detail')->name('steps.detail');
    Route::post('/detail-steps/{id}', 'StepController@challenge');

    Route::get('/edit-profile', 'UserController@showEditForm')->name('profile.edit');
    Route::post('/edit-profile', 'UserController@editProfile');

    Route::get('/edit-password', 'UserController@passwordEditForm')->name('password.edit');
    Route::post('/edit-password', 'UserController@editPassword');

    Route::get('/show-mypage', 'StepController@mypageShow')->name('mypage.show');


});

Route::get('/show-steps/{id}', 'StepController@index')->name('steps.index');
//Route::get('ajax/step', 'Ajax\StepController@index');

Route::get('ajax/step/{id}', 'Ajax\StepController@index');


//Route::get('/show-steps', 'StepController@index')->name('steps.index');


Auth::routes();


//Route::get('comedian', 'ComedianController@index');
//Route::get('ajax/comedian', 'Ajax\ComedianController@index');
//

Route::get('pagination', 'PaginationController@index'); // メイン
Route::get('ajax/pagination', 'Ajax\PaginationController@index'); // Ajax



//Route::get('comedian', 'ComedianController@index');
