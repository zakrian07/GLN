<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\gamesInfo;
use DB;
class categoryController extends Controller
{
 
  //show list of category
   public function show(){
 	$categories=Category::paginate(10);
   	return view('dashboard.categories',['categories'=>$categories]);
   }
   public function editCategory($categoryId){
      $row=Category::all()->where("cid",'=',$categoryId)->first();
    return view('dashboard.categoryLinks.editCategory',['row'=>$row]);
   }

   //show all games against specific category
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
