<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Members;
use Validator;
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
   public function addMember(){
   	return view("dashboard.memberlinks.addMember");
   }
   public function add(Request $request){
   	        $rule = [
                'email' => 'required|unique:members,email',
                'user_name' => 'required|unique:members,user_name',
                    ];

        $validator = Validator::make($request->all(),$rule);

         if ($validator->fails()) {
             
            return redirect('/members/addMember')->withErrors($validator)->withInput();
        }
    
     /*   DB::table('members')
            ->insert(array('first_name' => $request->input("fname"),
                            'last_name' => $request->input("lname"),
                            'email' => $request->input("email"),
                            'imatrix_id' => $request->input("imid"),
                            'user_name'=>$request->input("uname"),
                            'phone'=>$request->input("phone"),
                            'country'=>$request->input("country")
                ));*/
            return redirect()->route('members')->withMessage("Member has been added Successfully!");
   }
}
