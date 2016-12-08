<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\gamesInfo;
use DB;
class categoryController extends Controller
{
   public function show(){
 	$categories=Category::paginate(10);
   	return view('dashboard.categories',['categories'=>$categories]);
   }
   Public function gamesByCategory($categoryId){
   	//select games_info.*, category.category from games_info join category where games_info.cid=category.cid and category.cid=12
    
      die("gamesByCategory()");
    		$gameCat=DB::table('games_info')
        ->join('category', function ($join) {
            $join->on('games_info.cid', '=', 'category.cid')
                 ->where('category.cid', '=', $categoryId);
               })->select();;
    	
    	return view('dashboard.categoryLinks.viewGames',['games'=>$gameCat]);
    }
}
