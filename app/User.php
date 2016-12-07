<?php

namespace App;
use Validator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname', 'email', 'password','is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function validator($user)
    {
        return Validator::make($user, [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'is_admin' => 'required|max:1|In:1',
            'password' => 'required|min:6|confirmed',
            'email' => 'required',
        ]);
    }

}
