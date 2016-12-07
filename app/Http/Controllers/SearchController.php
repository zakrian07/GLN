<?php

namespace App\Http\Controllers;
use App\String;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Strings;
class SearchController extends Controller
{
    public function find(Request $request){

     return String::with('language')->where(function ($query) use ($request) {
               $request->get('lang_id') != ''? $query->where('language_id', '=', $request->get('lang_id')) : null;
            })->where(function ($query) use ($request) {
                $query->where('key','like','%'.$request->get('q').'%')
                    ->orWhere('value','like','%'.$request->get('q').'%');                                   
            })->get();
    }

}
