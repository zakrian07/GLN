<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/', 'DashboardController@home');
    Route::get('/users/{user}/edit', 'User\UserController@edit');
    Route::patch('/users/{user}', 'User\UserController@update');

    // added languages crud routes
    Route::get('/languages', 'LanguageController@index');
    Route::get('/languages/new', 'LanguageController@_new');
    Route::post('/languages', 'LanguageController@create');
    Route::get('/languages/{language}/edit', 'LanguageController@edit');
    Route::patch('/languages/{language}/update', 'LanguageController@update');
    Route::delete('/languages/{language}', 'LanguageController@delete');

    Route::resource('languages.strings', 'StringController',['except'=>'show']);
    Route::get('/languages/{language}/strings/copy', 'StringController@copy')->name('languages.strings.copy');
    Route::resource('screen_names', 'ScreenNameController');
    Route::resource('control_names', 'ControlNameController');
    
    Route::resource('rewards', 'RewardController');

    Route::resource('multilanguages', 'MultiLanguageController');

    Route::get('find', 'SearchController@find');
});

Auth::routes();