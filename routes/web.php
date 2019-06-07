<?php


Route::group(['middleware' => 'auth'], function(){
    Route::get('/show-steps', 'StepController@index')->name('steps.index');
    Route::get('/create-steps', 'StepController@showCreateForm')->name('steps.create');
    Route::post('/create-steps', 'StepController@create');
    Route::get('/detail-steps/{id}', 'StepController@detail')->name('steps.detail');
//    Route::get('/detail-steps', 'StepController@detail')->name('steps.detail');

    Route::get('/', 'HomeController@index')->name('home');
});


Auth::routes();