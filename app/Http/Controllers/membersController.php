<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Members;
class MembersController extends Controller
{
	public function listing(){
		$members=Members::paginate(10);
		return view('dashboard.members',['members'=>$members]);
	}

   public function editMember($memberId){
   	$row=members::all()->where("id",'=',$memberId)->first();
   	return view('dashboard.memberLinks.editMember',['row'=>$row]);
   }

}
