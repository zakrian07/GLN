<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Kamaln7\Toastr\Facades\Toastr;

use App\Reward;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use GuzzleHttp\Client;
class RewardController extends Controller
{
  
    public function index(){
        $client = new Client(['base_uri' => env('REWARDS_API_URL')]);
        $response = $client->request('GET', 'rewards');
        $rewards =  json_decode($response->getBody()->getContents());
        return view('rewards.index',compact("rewards"));
    }

    public function create(){
        $reward = new Reward;
        
        $client = new Client(['base_uri' =>  env('REWARDS_API_URL')]);
        $response = $client->request('GET', 'languages');
        $multi_languages = (json_decode($response->getBody()->getContents()));
        
        return view('rewards.create', compact('reward','multi_languages'));
    }


    public function edit($reward){
        $client = new Client(['base_uri' =>  env('REWARDS_API_URL')]);
        $response = $client->request('GET', 'rewards/'.$reward);
        $reward = (json_decode($response->getBody()->getContents()));

        $client = new Client(['base_uri' =>  env('REWARDS_API_URL')]);
        $response = $client->request('GET', 'rewards/'.$reward->id.'/languages');
        $translations = (json_decode($response->getBody()->getContents()));

        $client = new Client(['base_uri' =>  env('REWARDS_API_URL')]);
        $response = $client->request('GET', 'languages');
        $multi_languages = (json_decode($response->getBody()->getContents()));
        
       
        
        return view('rewards.edit',compact('reward','multi_languages','translations'));    
    }

  
}
