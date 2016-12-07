<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MultiLanguage;
use GuzzleHttp\Client;
class MultiLanguageController extends Controller
{
     public function index(){
        $client = new Client(['base_uri' =>  env('REWARDS_API_URL')]);
        $response = $client->request('GET', 'languages');
        $languages =  json_decode($response->getBody()->getContents());
        return view('multilanguages.index',compact("languages"));
    }

    public function create(){
        $multi_language = new MultiLanguage;
        return view('multilanguages.create', compact('multi_language'));
    }

    public function edit($multi_language){
        $client = new Client(['base_uri' =>  env('REWARDS_API_URL')]);
        $response = $client->request('GET', 'languages/'.$multi_language);
        $multi_language = (json_decode($response->getBody()->getContents()));
        return view('multilanguages.edit',compact('multi_language'));    
    }
}
