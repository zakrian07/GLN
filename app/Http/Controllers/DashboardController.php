<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{

    public function __construct()
    {
       
    }

    public function home(){
		
        return view('dashboard.home');
    }
}
