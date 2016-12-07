<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Kamaln7\Toastr\Facades\Toastr;
use App\ControlName;
use App\Http\Requests;

class ControlNameController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
         $control_names = ControlName::paginate(15);
         return view('control_names.index',compact("control_names"));
    }

     public function destroy(ControlName $control_name){
        if($control_name->delete()){
            Toastr::success('Control name is deleted', $title = 'Success', $options = []);
        }else{
            Toastr::error('Control name failed to deleted', $title = 'Fail', $options = []);
        }
        return redirect()->route('control_names.index');
    }

    public function create(){
        $control_name = new ControlName;
        return view('control_names.create', compact('control_name'));
    }

    public function store(Request $request){
        $validator = ControlName::validator_on_create($request->all());
       
        if ($validator->fails()) {
             Toastr::error('Control name failed to Save', $title = 'Fail', $options = []);
            return  redirect()->route('control_names.create')    
                    ->withErrors($validator)
                    ->withInput($request->all());
        } else {
          if(ControlName::create($request->all())){
             Toastr::success('Control name is Saved', $title = 'Success', $options = []);
          }else{
            Toastr::error('Control name failed to Save', $title = 'Fail', $options = []);
          }
          
        //   return redirect()->route('screen_names.index');
          return ($url = Session::get('backUrl')) 
                    ? Redirect::to($url) 
                    : Redirect::route('control_names.index');

        }
        
    }

    public function edit(ControlName $control_name){
        return view('control_names.edit',compact('control_name'));    
    }

    public function update(ControlName $control_name,Request $request){
        $validator = ControlName::validator_on_update($request->all());

        if ($validator->fails()) {
             Toastr::error('Control name failed to Save', $title = 'Fail', $options = []);
            return  redirect()->route('screen_names.edit', ['control_name'=>$control_name])    
                    ->withErrors($validator)
                    ->withInput($request->all());
        } else {
          if($control_name->update($request->all())){
              Toastr::success('Control name is Updated', $title = 'Success', $options = []);
          }else{
              Toastr::error('Control name failed to Update', $title = 'Fail', $options = []);
          }

          return redirect()->route('control_names.index', ['control_name'=>$control_name]);    
        }
  
    }

}
