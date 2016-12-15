<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Members;
use App\GamesInfo;
use App\Category;
use App\ScreenName;
use App\Http\Requests\CreateUserRequest;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class DashboardController extends Controller
{

    public function __construct()
    {
       
    }

    public function home(){

		$members=Members::all();
		$games=gamesInfo::all();
		$categories=Category::all();
		
		$allMem=$members->count();
		$allGame=$games->count();
		$allCat=$categories->count();
		$allScreen=ScreenName::count();
		$members=Members::paginate(8);
		$games=gamesinfo::paginate(8);
		$categories=Category::paginate(8);
		
        return view('dashboard.home',['allScreen'=>$allScreen,'allmem'=>$allMem,'allgame'=>$allGame,'allcat'=>$allCat,'members'=>$members, 'games'=>$games, 'categories'=>$categories,
        	"membersToday"=>Members::whereRaw('Date(created_date) = CURDATE()')->count(),
        	"gamesToday"=>gamesInfo::whereRaw('Date(created_date) = CURDATE()')->count(),
        	
        	"weeklyMembers"=>Members::whereRaw('WEEK(created_date) = date("w")')->count(),
        	"weeklyGames"=>gamesInfo::whereRaw('WEEK(created_date) = date("w")')->count(),
        	
        	"monthlyMembers"=>Members::whereRaw('MONTH(created_date) = date("m")')->count(),
        	"monthlyGames"=>gamesInfo::whereRaw('MONTH(created_date) = date("m")')->count()
        	
        	]);
    }

   public function authenticate(Request	$request)
    {

  $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required',
        ]);
   
   if($validator->fails()) {

            return redirect('/login')->withErrors($validator)->withInput();
        }
  
   
   $credentials=array("email"=>$request->input('email'),"password"=>$request->input('password'));
   $remember=$request->input('remember');
   
   if (Auth::attempt($credentials,$remember)) {
    
    //echo "Password is correct";
    return redirect('/');
    //   
    
   }
   else
   {
    
     return redirect('/login')
                        ->withErrors("Sorry email or password is not working")
                        ->withInput();
    
   }
   
   
  
    }
public function login(Request $request)
 {
  return view('auth/login');
 }
}
