<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use App\String;
class ScreenName extends Model
{
     protected $fillable =[
        "title"    
    ];

 public static function validator_on_create($screen_name){

        return Validator::make($screen_name, [
            'title' => 'required|max:50|unique:screen_names'
        ]);
    }

    public static function validator_on_update($screen_name){

        return Validator::make($screen_name, [
            'title' => 'required|max:50|unique:screen_names,id'
        ]);
    }

    public function strings(){
       return $this->hasMany(String::class);
    }
}
