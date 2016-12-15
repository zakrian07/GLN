<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\category;
use App\photo;
use App\gamesInfo;
use DB;
class gamesController extends Controller
{
	//show to games from database
    public function show(){
        $games=DB::table('games_info')->join('category', 'games_info.cid', '=', 'category.cid')
            ->select('games_info.*','category.category')->paginate(10);
        return view('dashboard.games',['games'=>$games]);
    }
    
    //view images of specific Game
    public function viewImages($gameId){
        $imgs=photo::all()->where('id','=',$gameId);  
        $games=gamesInfo::all();//this query is to show games in top form combobox
       return view('dashboard.gamelinks.gameImages',['images'=>$imgs,'games'=>$games]);
    }

    //add Images to the specific Game
    public function addImage($GameId,$imgPath){
        die("addImage(imageId,imagepath)");
    }

    //details about a single game
    public function details($gameId){
        $row = DB::table('games_Info')->where('id', $gameId)->first();
       
       return view('dashboard.gamelinks.gameDetails',['row'=>$row]);
    }
        public function addGameForm(){
            $categories=category::all();
            return view("dashboard.gamelinks.addGame",['categories'=>$categories]);
        }
        public function add(Request $request){
        
        //rules for attatchements
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

/*
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
            ->insert(array(
                'name'=>$request->input('gameName'),
                'description'=>$request->input('description'),
                'download_link'=>$request->input('androidLink'),
                'ios_link'=>$request->input('iosLink'),
                'deep_link'=>$request->input('deepLink'),
                'isFeatured'=>$checked
                ));*/
                die("insert into games_info");
            return redirect()->route('games')->withMessage("Game Added Successfully!");
        }

    //Edit specific game record
    public function editGame($gameId){
        
            $row=gamesInfo::all()->where("id",'=',$gameId)->first();
            $categories=category::all();
        return view("dashboard.gamelinks.editGame",['row'=>$row,'categories'=>$categories]);
    }

}
