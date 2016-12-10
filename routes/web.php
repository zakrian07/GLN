<?php




Route::group(['middleware' => 'auth'], function(){
   
    //navigations    
    Route::get('/', 'DashboardController@home')->name("home");
    Route::get('/users/{user}/edit', 'User\UserController@edit');
    Route::get('/members','membersController@listing')->name('members');
    Route::get('/categories','categoryController@show')->name('category');
    Route::get('/games','gamesController@show')->name('games');
    Route::patch('/users/{user}', 'User\UserController@update');

    //games links routes
    //view all images of Games
    Route::get('/games/images/{gameId}','gamesController@viewImages')->name('gameImages');
    //add image to the Game
    Route::post('games/images',function(){
        die("insert into photos(id,photo_name,photo_size,photo_type) values()");
    });
   //details of game
    Route::get('/games/details/{gameId}','gamesController@details')->name('gameDetails');
   //edit Games
    Route::get('/games/editGame/{gameId}','gamesController@editGame')->name('editGame');
   //update Game data
    Route::post('/games/update',function(){
     
     $checked= 0;
     if (isset($_POST['status'])) {
             $checked=1;
        }

     DB::table('games_info')
            ->where('id', $_POST['id'])
            ->update(array(
                'name'=>$_POST['gameName'],
                'description'=>$_POST['description'],
                'download_link'=>$_POST['androidLink'],
                'ios_link'=>$_POST['iosLink'],
                'deep_link'=>$_POST['deepLink'],
                'isFeatured'=>$checked
                ));
        
            return redirect()->route("games");
    })->name('updateGame');

    //Add Game
    Route::post('/games/add',function(){
     DB::table('games_info')
            ->insert(array());
            return redirect()->route('games');
    })->name('addGames');
    
    //Delete Games
    Route::get('/games/delete/{gameId}',function($gameId){
            DB::table('games_info')->where('id', $gameId)->delete();
            return redirect()->route("games");
    })->name('deleteGame');

    

    //category links rout
    Route::get('/categories/viewGames/{categoryId}','categoryController@gamesByCategory')->name('gameByCategory');

    //delete Category
    Route::get('/categories/delete/{categoryId}',function($categoryId){
            DB::table('category')->where('cid', $categoryId)->delete();
            return redirect()->route("category");
    })->name('deleteCategory');
    
    //edit Category
    Route::get('/categories/editCategory/{categoryId}','categoryController@editCategory')->name("editCategory");

    //update Category
    Route::post('/categoeies/update',function(){
     DB::table('category')
            ->where('id', $_POST['id'])
            ->update(array(


                ));
            return redirect()->route("category");
    })->name('updateCategory');

    //Add Category
    Route::post('/categoeies/add',function(){
     DB::table('category')
            ->insert(array());
            return redirect()->route("category");
    })->name('addCategory');

    //member Links rout   
    
    //delete Members
    Route::get('/members/delete/{memberId}',function($memberId){
            DB::table('members')->where('id', $memberId)->delete();
            return redirect()->route("members");
    })->name('deleteMember');
   
   //add members
    Route::post('/members/add',function(){
        
     DB::table('members')
            ->insert(array('first_name' => $_POST["fname"],
                            'last_name' => $_POST["lname"],
                            'email' => $_POST["email"],
                            'imatrix_id' => $_POST["imid"],
                            'user_name'=>$_POST["uname"],
                            'phone'=>$_POST["phone"],
                            'country'=>$_POST["country"]
                ));
            return redirect()->route('members');
    })->name('addMember'); 
    
    //edit members
    Route::get('/members/edit_member/{memberId}','membersController@editMember')->name("editMember");
 
    //update members
    Route::post('/members/update',function(){
     DB::table('members')
            ->where('id', $_POST['id'])
            ->update(array('first_name' => $_POST["fname"],
                            'last_name' => $_POST["lname"],
                            'email' => $_POST["email"],
                            
                            'user_name'=>$_POST["uname"],
                            'phone'=>$_POST["phone"],
                            'country'=>$_POST["country"]
                ));
            return redirect()->route("members");
    })->name('updateMember');
    

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
