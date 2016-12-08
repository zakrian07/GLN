<?php

namespace App;
use Validator;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
       "lang_name", "lang_code", "is_active","is_default"
    ];

    public static function validator($language)
    {
        return Validator::make($language, [
            'lang_name' => 'required|max:30',
            'lang_code' => 'required|unique:languages|max:30|integer',
            'is_active' => 'required',
            'is_default'=> 'required'
        ]);
    }



    public static function validator_upadte($language)
    {
        return Validator::make($language, [
            'lang_name' => 'required|max:30',
            'lang_code' => 'required|max:30|integer',
            'is_active' => 'required',
            'is_default'=> 'required'
        ]);
    }

    public function strings(){
       return $this->hasMany(String::class);
    }

    public function copy_strings(){
       return $this->hasMany(String::class,'copy_from');
    }

    public function create_strings($request){
    
        foreach(Language::all() as $lang){
            $lang->strings()->create($request);
        }
        return true;
    }
}
