<?php


Route::group(['middleware' => 'auth'], function(){

    Route::get('/create-steps', 'StepController@showCreateForm')->name('steps.create');
    Route::post('/create-steps', 'StepController@create');

    Route::post('/clear-childsteps/{challenge}/{childstep}', 'StepController@clear')->name('childsteps.clear');

//    Route::post('/detail-steps/{id}', 'StepController@challenge');

    Route::post('/detail-steps/{step}', 'StepController@challenge');


    Route::get('/edit-profile', 'UserController@showEditForm')->name('profile.edit');
    Route::post('/edit-profile', 'UserController@editProfile');

    Route::get('/edit-password', 'UserController@passwordEditForm')->name('password.edit');
    Route::post('/edit-password', 'UserController@editPassword');

    Route::get('/show-mypage', 'StepController@mypageShow')->name('mypage.show');


});

Route::get('/detail-steps/{step}', 'StepController@detail')->name('steps.detail');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/show-steps', 'StepController@index')->name('steps.index');
Route::get('/show-steps/{step}', 'StepController@categoryIndex')->name('steps.category.index');

Route::get('ajax/step', 'Ajax\StepController@index');
Route::get('ajax/step/{step}', 'Ajax\StepController@categoryIndex');

//Route::get('pagination', 'PaginationController@index'); // メイン
//Route::get('ajax/pagination', 'Ajax\PaginationController@index'); // Ajax

Route::get('/show-profile/{user}', 'UserController@showProfile')->name('profile.show');



Auth::routes();


//Route::get('comedian', 'ComedianController@index');
//Route::get('ajax/comedian', 'Ajax\ComedianController@index');
//




//Route::get('comedian', 'ComedianController@index');
