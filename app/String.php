<?php

namespace App;
use Validator;
use App\ScreenName;
use App\ControlName;

use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class String extends Model
{
    //
    protected $fillable =[
        "screen_name_id","copy_from","control_name_id","key","value","purpose","language_id","is_active",'created_at'    
    ];


    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'key' => 1,
            'purpose' => 3,
            'value' => 2,
            'created_at' => 4
        ]
    ];

    public static function validator_on_create($string){

        return Validator::make($string, [
            'screen_name_id' => 'required|max:30',
            'control_name_id' => 'required|max:30',
            'key' => 'required|max:30',
            'value' => 'required',
            'is_active' => 'required',
        ]);
    }

    public static function validator_on_update($string){

        return Validator::make($string, [
            'screen_name_id' => 'required|max:30',
            'control_name_id' => 'required|max:30',
            'key' => 'required|max:30',
            'value' => 'required',
            'is_active' => 'required',
        ]);
    }

    public function language(){
         return $this->belongsTo(Language::class);
    }

    public function screen_name(){
         return $this->belongsTo(ScreenName::class);
    }

     public function control_name(){
         return $this->belongsTo(ControlName::class);
    }

    public function copy_from_language(){
         return $this->belongsTo(Language::class,'copy_from');
    }
}
