<?php

namespace App\Http\Controllers;
use App\Language;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
class LanguageController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(){
         $languages = Language::paginate(15);
         return view('language.index',compact("languages"));
    }

    public function languages(){
         $languages = Language::where('is_active', true)->get();
         return Response()->json($languages, 200, [], JSON_NUMERIC_CHECK);
    }

   public function _new(){
       $action = '/languages';
       $method = null;
        $language = new Language;
         return view('language.languageForm', compact('language','method', 'action'));
    }

   public function create(Request $request){
       
        $request->get('is_default')? null : $request->request->add(['is_default'=> false]);
        $validator = Language::validator($request->all());

        if ($validator->fails()) {
            Toastr::error('Language failed to Save', $title = 'Fail', $options = []);
            return redirect('/languages/new')
                ->withErrors($validator)
                ->withInput($request->all());
        } 
           
         if(Language::where('is_default',true)->count()>0 && $request->get('is_default')){
           Toastr::error('You cant create more than one languages as default', $title = 'Fail', $options = []);
            return redirect('/languages/new')
                ->withErrors($validator)
                ->withInput($request->all());
         }

         if($language = Language::create($request->all())){

             Toastr::success('Language is Saved', $title = 'Success', $options = []);
             return redirect()->route('languages.strings.copy', ['language'=>$language]); 
            //   return redirect('/languages');
         }else{
              Toastr::error('Language failed to Save', $title = 'Fail', $options = []);
               return view('language.languageForm');
         }
        
    }   

  public function edit(Language $language){
        $action = '/languages/'.$language->id.'/update';
        $method ='PATCH';
        return view('language.languageForm', compact('language','method', 'action'));
    }

 
 public function update(Language $language,Request $request){
      $request->get('is_default')? null : $request->request->add(['is_default'=> false]);
      $validator = Language::validator_upadte($request->all());
      
       if ($validator->fails()) {
            Toastr::error('Language failed to Save', $title = 'Fail', $options = []);
            return redirect('/languages/'.$language->id.'/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        } 

        $default_languages = Language::where('is_default',true)->where('id', '!=' , $language->id);

        if($default_languages->count()>0 && $request->get('is_default')){
           Toastr::error('You cant make more than one languages as default', $title = 'Fail', $options = []);
             return redirect('/languages/'.$language->id.'/edit')
                ->withErrors($validator)
                ->withInput($request->all());
         }

         $is_any_other_language_with_same_key = Language::where('lang_code',$request->get('lang_code'))->where('id', '!=' , $language->id);

        if($is_any_other_language_with_same_key->count()>0){
           Toastr::error('You cant make more than one languages as default', $title = 'Fail', $options = []);
             return redirect('/languages/'.$language->id.'/edit')
                ->withErrors($validator)
                ->withInput($request->all());
         }


       if($language->update($request->all())){
           Toastr::success('Language is Updated', $title = 'Success', $options = []);
           return redirect('/languages');
       }else{
           Toastr::error('Language failed to Update', $title = 'Fail', $options = []);
           return view('language.languageForm');
       }
           
        

       
  }

    public function delete($id)
    {
        $language = Language::findOrFail($id);
        if($language->delete()){
        Toastr::success('Language is deleted', $title = 'Success', $options = []);
            }else{
                Toastr::error('Language failed to delete', $title = 'Fail', $options = []);
            }
        return redirect('/languages');
    }   

}
