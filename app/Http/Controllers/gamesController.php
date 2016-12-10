<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
        $games=gamesInfo::all();//this query is to show games in top form combobox
        $imgs=photo::all()->where('id','=',$gameId);  
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

    //Edit specific game record
    public function editGame($gameId){
        
            $row=gamesInfo::all()->where("id",'=',$gameId)->first();
        return view("dashboard.gamelinks.editGame",['row'=>$row]);
    }

}
