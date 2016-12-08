<?php
namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;
use App\Reward;

class Reward extends Model
{
    
   const CREATED_AT = 'created_date';
   
   public function created_at(){
     return $this->created_date;
   }

   public function prize_type_in_text($type){
    if($type == '1'){
        return '1st';
    }elseif($type == '2_5'){
        return '2nd to 5th';
    }elseif($type == '6_10'){
        return '6th to 10th';
    }elseif($type == '11_20'){
        return '11th to 20th';
    }

   }

   public $prize_types = ['1','2_5', '6_10', '11_20'];
   protected $dates = ['created_date', 'end_date','updated_at'];

     protected $fillable = [
        'title','description', 'picture', 'prize_type','end_date','gallery'
    ];

    public static function validator($reward)
    { 
        return Validator::make($reward, [
            'title' => 'required|max:100',
            'description' => 'required',
            'end_date' => 'required'
        ]);
    }
}
