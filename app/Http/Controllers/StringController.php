<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Url;
use Kamaln7\Toastr\Facades\Toastr;

use App\String;
use App\Language;
use App\ScreenName;
use App\ControlName;

class StringController extends Controller
{
    //
    public function __construct(){
      
    }

    public function index(Language $language){
       $strings = $language->strings()->orderBy('created_at','ASC')->paginate(15);
        //  dd($strings->links());
       return view('string.index',compact('strings','language'));
    }

   public function strings($language_code){
       $strings = Language::where(['lang_code'=>$language_code])->first()->strings()->where('is_active', true)->get();
       return Response()->json($strings, 200, [], JSON_NUMERIC_CHECK);
    }

    public function destroy(Language $language, String $string){
        if($string->delete()){
            Toastr::success('String is deleted', $title = 'Success', $options = []);
        }else{
            Toastr::error('String failed to deleted', $title = 'Fail', $options = []);
        }
        return redirect()->route('languages.strings.index', ['language'=>$language]);
    }

    public function create(Language $language){
        $string = new String;
        Session::put('backUrl', url()->current());
        $screen_names = ScreenName::pluck('title', 'id');
        $control_names = ControlName::pluck('title', 'id');
        return view('string.create', compact('string','language','screen_names','control_names'));
    }

    public function store(Language $language,Request $request){
        $validator = String::validator_on_create($request->all());
       
          // if language is default then create same string records for all other languages.
            // if($language->create_strings()){
                // show message that strings are created for other languages
                
            // }else{ //  if language is not default then dont create records for all other languages.              
                // then create strings just for this language.
                // show that we are not able to create records
            // }    

            if($language->is_default){
                if ($validator->fails() || String::where('key',$request->get('key'))->count()>0) {
                    Toastr::error('Key already exist', $title = 'Fail', $options = []);
                    return  redirect()->route('languages.strings.create', ['language'=>$language])    
                            ->withErrors($validator)
                            ->withInput($request->all());
                }

                
                if($language->create_strings($request->all())){            
                    Toastr::success('Strings are Saved for all languages', $title = 'Success', $options = []);
                }else{
                    Toastr::error('String failed to Save', $title = 'Fail', $options = []);  
                } 
                
            }else{

                if ($validator->fails() || $language->strings->where('key',$request->get('key'))->count()>0) {
                    Toastr::error('Key already exist', $title = 'Fail', $options = []);
                    return  redirect()->route('languages.strings.create', ['language'=>$language])    
                            ->withErrors($validator)
                            ->withInput($request->all());
                }

                if($language->strings()->create($request->all())){            
                    Toastr::success('String is Saved', $title = 'Success', $options = []);
                }else{
                    Toastr::error('String failed to Save', $title = 'Fail', $options = []);  
                }

            }

    //    if ($validator->fails() || $language->strings->where('key',$request->get('key'))->count()>0) {
        // if ($validator->fails() || $language->strings->where('key',$request->get('key'))->count()>0) {
        //     Toastr::error('Key already exist', $title = 'Fail', $options = []);
        //     return  redirect()->route('languages.strings.create', ['language'=>$language])    
        //             ->withErrors($validator)
        //             ->withInput($request->all());
        // } 
          
          Session::put('backUrl', null);
        //   if($language->strings()->create($request->all())){
            
        //       Toastr::success('String is Saved', $title = 'Success', $options = []);
        //   }else{
        //       Toastr::error('String failed to Save', $title = 'Fail', $options = []);  
        //   }
          return redirect()->route('languages.strings.index', ['language'=>$language]);
      
        
    }

    public function edit(Language $language,String $string){
        $screen_names = ScreenName::pluck('title', 'id');
        $control_names = ControlName::pluck('title', 'id');
        Session::put('backUrl', url()->current());
        return view('string.edit',compact('string','language','screen_names','control_names'));    
    }

    public function update(Language $language,String $string,Request $request){
        $validator = String::validator_on_update($request->all());

       if($language->strings->where('key',$request->get('key'))->count()==1){
         
          if($string->key != $request->key ){
                 Toastr::error('String failed to Save', $title = 'Fail', $options = []);
            return  redirect()->route('languages.strings.edit', ['language'=>$language,'string'=>$string])    
                    ->withErrors($validator)
                    ->withInput($request->all());
              }  
        }

       if ($validator->fails()) {
            Toastr::error('String failed to Save', $title = 'Fail', $options = []);
            return  redirect()->route('languages.strings.edit', ['language'=>$language,'string'=>$string])    
                    ->withErrors($validator)
                    ->withInput($request->all());
        } else {
          Session::put('backUrl', null);
          if($language->strings->find($string)->update($request->all())){
               Toastr::success('String is Updated', $title = 'Success', $options = []);  
          }else{
               Toastr::error('String failed to Updated', $title = 'Fail', $options = []);
          }
          return redirect()->route('languages.strings.index', ['language'=>$language]);    
        }
  
    }

   public function copy(Language $language){
    //    dd($language);
        $default_language = Language::where('is_default',true)->first();
        $default_language_strings = $default_language;
        $default_language_strings? $default_language_strings = $default_language_strings->strings : $default_language_strings = []; 
        if($default_language_strings == null){
            Toastr::error('There is no any default language', $title = 'Fail', $options = []);             
        }else{
          foreach($default_language_strings as $string){
            if($language->strings->where('key', '=', $string->key)->count() == 0){
                $language->strings()->create(['copy_from'=>$default_language->id,'key'=>$string->key,'value'=>$string->value,'purpose'=>$string->purpose,'is_active'=>$string->is_active,'screen_name_id'=>$string->screen_name_id,'control_name_id'=>$string->control_name_id]);
            }
          }
          Toastr::success('All Strings of Default Language have been copied', $title = 'Success', $options = []);
        }
           

       return redirect()->route('languages.strings.index', ['language'=>$language]); 
    }

}
