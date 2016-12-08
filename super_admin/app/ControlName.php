<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use App\String;
class ControlName extends Model
{
     protected $fillable =[
        "title"    
    ];

 public static function validator_on_create($control_name){

        return Validator::make($control_name, [
            'title' => 'required|max:50|unique:control_names'
        ]);
    }

    public static function validator_on_update($control_name){

        return Validator::make($control_name, [
            'title' => 'required|max:50|unique:control_names,id'
        ]);
    }

    public function strings(){
       return $this->hasMany(String::class);
    }
}
