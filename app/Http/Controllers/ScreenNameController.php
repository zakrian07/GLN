<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Kamaln7\Toastr\Facades\Toastr;

use App\ScreenName;
use App\Http\Requests;

class ScreenNameController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
         $screen_names = ScreenName::paginate(15);
         return view('screen_names.index',compact("screen_names"));
    }

     public function destroy(ScreenName $screen_name){
        if($screen_name->delete()){
            Toastr::success('Screen name is deleted', $title = 'Success', $options = []);
        }else{
            Toastr::error('Screen name failed to deleted', $title = 'Fail', $options = []);
        }
        return redirect()->route('screen_names.index');
    }

    public function create(){
        $screen_name = new ScreenName;
        return view('screen_names.create', compact('screen_name'));
    }

    public function store(Request $request){
        $validator = ScreenName::validator_on_create($request->all());
       
        if ($validator->fails()) {
            Toastr::error('Screen name failed to Save', $title = 'Fail', $options = []);
            return  redirect()->route('screen_names.create')    
                    ->withErrors($validator)
                    ->withInput($request->all());
        } else {
            
          if(ScreenName::create($request->all())){
                Toastr::success('Screen name is Saved', $title = 'Success', $options = []);
          }else{
                 Toastr::error('Screen name failed to Save', $title = 'Fail', $options = []);
          }
        //   return redirect()->route('screen_names.index');
          return ($url = Session::get('backUrl')) 
                    ? Redirect::to($url) 
                    : Redirect::route('screen_names.index');

        }
        
    }

    public function edit(ScreenName $screen_name){
        return view('screen_names.edit',compact('screen_name'));    
    }

    public function update(ScreenName $screen_name,Request $request){
        $validator = ScreenName::validator_on_update($request->all());

        if ($validator->fails()) {
            Toastr::error('Screen name failed to Update', $title = 'Fail', $options = []);
            return  redirect()->route('screen_names.edit', ['screen_name'=>$screen_name])    
                    ->withErrors($validator)
                    ->withInput($request->all());
        } else {
             
          if($screen_name->update($request->all())){
             Toastr::success('Screen name is Update', $title = 'Success', $options = []);
          }else{
             Toastr::error('Screen name failed to Update', $title = 'Fail', $options = []);
          }
          return redirect()->route('screen_names.index', ['screen_name'=>$screen_name]);    
        }
  
    }

}
