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
    //navigations    
    Route::get('/', 'DashboardController@home')->name("home");
    Route::get('/users/{user}/edit', 'User\UserController@edit');
    Route::get('/members','membersController@listing')->name('members');
    Route::get('/categories','categoryController@show')->name('category');
    Route::get('/games','gamesController@show')->name('games');
    Route::patch('/users/{user}', 'User\UserController@update');



    //games links routes
    Route::get('/games/images/{gameId}','gamesController@viewImages')->name('gameImages');
    Route::get('/games/details/{gameId}','gamesController@details')->name('gameDetails');
    

    //category links rout
    Route::get('/categories/viewGames/{categoryId}','categoryController@gamesByCategory')->name('gameByCategory');
    
    //member Links rout
    Route::get('/members/edit_member/{memberId}','membersController@editMember')->name("editMember");
    
    Route::get('/members/delete/{memberId}',function($memberId){
            DB::table('members')->where('id', $memberId)->delete();
            return "Member has been deleted";
    })->name('deleteMember');
    
    Route::post('/members/update',function(){
        
     DB::table('members')
            ->where('id', $_POST['id'])
            ->update(array('first_name' => $_POST["fname"],
                            'last_name' => $_POST["lname"],
                            'email' => $_POST["email"],
                            'imatrix_id' => $_POST["imatrix"],
                            'user_name'=>$_POST["uname"],
                            'phone'=>$_POST["phone"],
                            'country'=>$_POST["country"]
                ));
            return view('Dashboard.home');
    })->name('update');
   
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