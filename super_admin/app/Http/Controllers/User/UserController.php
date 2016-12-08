<?php

namespace App\Http\Controllers\User;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User  Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible to update user profile
    |
    */
    public function __construct()
    {
      $this->middleware('auth');
    }

   

  public function edit(User $user){
      return view('user.userForm', compact('user'));
  }

 // This method will update the User Profile.
  public function update(User $user, Request $request){

      $validator = $user->validator($request->all());
      
      $validator->after(function($validator) use ($request, $user) {
      $check = auth()->validate([
             'email'    => $request->email,
             'password' => $request->current_password
      ]);

      if (!$check):
          $validator->errors()->add('current_password', 
          'Your current password is incorrect, please try again.');
        endif;
       });

       if ($validator->fails()):
          Toastr::error('Failed to Update', $title = 'Fail', $options = []);
             return redirect('users/'.$user->id.'/edit')
                 ->withErrors($validator)
                 ->withInput();
        endif;

         $user->password = bcrypt($request->password);
         $user->fname = $request->fname;
         $user->lname = $request->lname;
         if($user->save()){
              Toastr::success('Updated', $title = 'Success', $options = []);
         }else{
             Toastr::error('Failed to Update', $title = 'Fail', $options = []);
         }
         return redirect('/');
  }
   
}
