<?php

use Illuminate\Http\Request;
//use Validator;

Route::get("/login",["middleware"=>"web","as"=>"login","uses"=>"DashboardController@login",function(){
  
 }]);
 
 Route::any("/post_login",['uses'=>"DashboardController@authenticate","as"=>"post_login",function(){
  
 
 }]);


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
    //delete image of Game
    Route::get('/games/images/delete/{gameId}/{imageId}',function($gameId,$imageId){
        die("this route is to delete image of game");
    })->name('deleteImage');
    //add image to the Game
    Route::post('/games/images/addimages',function(){
        die("insert into photos(id,photo_name,photo_size,photo_type) values()");
    })->name('addImages');

   //details of game
    Route::get('/games/details/{gameId}','gamesController@details')->name('gameDetails');
   //edit Games
    Route::get('/games/editGame/{gameId}','gamesController@editGame')->name('editGame');
   //update Game data
    Route::post('/games/update',function(Request $request){
        

         $rules = array(
            'graphic' => ' mimes:jpeg,jpg,png ',
            'gameBanner' => ' mimes:jpeg,jpg,png ',
            'thumbnail' => ' mimes:jpeg,jpg,png ',
            'gameicon' => ' mimes:jpeg,jpg,png '
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
         return redirect()->route("games")->withMessage("Files must be an image!");
        }


         if ($request->hasFile('graphic')) {
            $graphic=$request->graphic->getClientOriginalName();
             $request->graphic->move( public_path() . "/images/featured_graphics",$graphic);
             DB::table('games_info')
            ->where('id', $_POST['id'])
            ->update(['featured_graphic'=>$graphic]);
        }
         if ($request->hasFile('gameBanner')) {
           $gameBanner=$request->gameBanner->getClientOriginalName();
            $request->gameBanner->move( public_path() . "/images/game_banners",$gameBanner);
             DB::table('games_info')
            ->where('id', $_POST['id'])
            ->update(['game_banner'=>$gameBanner]);
        }

         if ($request->hasFile('thumbnail')) {
            $thumbnail=$request->thumbnail->getClientOriginalName();
            $request->thumbnail->move( public_path() . "/images/video_thumbnails",$Thumbnail);
             DB::table('games_info')
            ->where('id', $_POST['id'])
            ->update(['video_thumbnail_link'=>$thumbnail]);
        }

         if ($request->hasFile('gameicon')) {
            $gameicon=$request->gameicon->getClientOriginalName();
            $request->gameicon->move( public_path() . "/images/Game_image",$gameicon);
             DB::table('games_info')
            ->where('id', $_POST['id'])
            ->update(['game_image'=>$gameicon]);
        }

         if (isset($_POST['status'])) {
             $checked=1;
        }
        else{
            $checked=0;
        }

     DB::table('games_info')
            ->where('id', $_POST['id'])
            ->update(array(
                'name'=>$request->input('gameName'),
                'description'=>$request->input('description'),
                'download_link'=>$request->input('androidLink'),
                'ios_link'=>$request->input('iosLink'),
                'deep_link'=>$request->input('deepLink'),
                'isFeatured'=>$checked
                ));
            return redirect()->route("games")->withMessage("Game Updated Successfully!");
    })->name('updateGame');

    Route::get('/games/addGame','gamesController@addGameForm')->name('addGameForm');
    //Add Game
    Route::post('/games/add','gamesController@add')->name('addGames');
    
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
    Route::post('/categoeies/update',function(Request $request){
     
     DB::table('category')
            ->where('id', $_POST['id'])
            ->update(array(


                ));
        return redirect()->route("category");
    })->name('updateCategory');

    //Add Category
    Route::post('/categoeies/add',function(Request $request){

     DB::table('category')
            ->insert(array());
            return redirect()->route("category");
    })->name('addCategory');



    //member Links rout   
    
    //delete Members
    Route::get('/members/delete/{memberId}',function($memberId){
            DB::table('members')->where('id', $memberId)->delete();
     return redirect()->route("members")->withMessage("Member has been Delete Successfully!");
    })->name('deleteMember');
   

    //goto addmember route
    Route::get('/members/addMember','membersController@addMember')->name('memberForm');
   //add members
    Route::post('/members/add','membersController@add')->name('addMember'); 
    
    //edit members
    Route::get('/members/edit_member/{memberId}','membersController@editMember')->name("editMember");
 
    //update members
    
    Route::post('/members/update',function(Request $request){

       /* $rule = [
                'email' => 'required|min:5|unique:offers,offer_name',
                'user_name' => 'required|min:5|unique:offers,offer_id|numeric',
                    ];
        $validator = Validator::make($request->all(),$rule);
         if ($validator->fails()) {
             
            return redirect('/manage/offer_add')->withErrors($validator)->withInput();
        }
        */
        DB::table('members')
            ->where('id', $request->input('id'))
            ->update(array('first_name' => $request->input("fname"),
                            'last_name' => $request->input("lname"),
                            'email' =>  $request->input("email"),
                            'user_name'=> $request->input("uname"),
                            'phone'=> $request->input("phone"),
                            'country'=> $request->input("country")
                ));

            return redirect()->route('members')->withMessage("Member Update Successfully!");
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
