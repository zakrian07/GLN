<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\photo;
use App\gamesInfo;
use DB;
class gamesController extends Controller
{
	
    public function show(){
    	$games=DB::table('games_info')->join('category', 'games_info.cid', '=', 'category.cid')
            ->select('games_info.*','category.category')->paginate(10);
    	return view('dashboard.games',['games'=>$games]);
    }
    
    public function viewImages($gameId){
    	$games=gamesInfo::all();//to show games in combobox

    	$imgs=photo::all()->where('id','=',$gameId);  
       return view('dashboard.gamelinks.gameImages',['images'=>$imgs,'games'=>$games]);
    }
    public function submitImage($GameId,$imgPath){

    }
    public function details($gameId){
        $row = DB::table('games_Info')->where('id', $gameId)->first();
       
       return view('dashboard.gamelinks.gameDetails',['row'=>$row]);
    }
}
