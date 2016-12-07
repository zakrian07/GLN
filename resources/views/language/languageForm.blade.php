@extends('layouts.appLayout')

@section('content')
{!! Breadcrumbs::render('language') !!}
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">Language</div>
                <div class="panel-body">
               
                 <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							 <form class="form-horizontal" role="form" method="post" action={{$action}}>

								@if($method != null)
								{!! method_field('patch') !!}
								@endif
								{{ csrf_field() }}
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Language Name</label>
									<div class="col-sm-8">
										<input id="lang_name" type="text" class="form-control1"  name="lang_name" value="{{ $language?  $language->lang_name :  old('lang_name')}}">
                                        @if ($errors->has('lang_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lang_name') }}</strong>
                                            </span>
                                        @endif
                                	</div>									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Language Code</label>
									<div class="col-sm-8">
										<input id="lang_code" type="text" class="form-control1"  name="lang_code" value="{{  $language?  $language->lang_code :  old('lang_code') }}">
                                        @if ($errors->has('lang_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lang_code') }}</strong>
                                            </span>
                                        @endif
									</div>
									
								</div>

                                
								
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Status</label>

									<div class="col-sm-8">
                                    <select name="is_active" id="selector1" class="form-control1">
										<option value="1" {{$language->is_active == 1? "selected" : false}}>Active</option>
										<option value="0" {{$language->is_active == 0? "selected" : false}}>In Active</option>
									</select></div>
								</div>



								<div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Is Default</label>
									<div class="col-sm-8" >
										<div class="checkbox-inline"><label style="margin-top:-10px">{!! Form::checkbox('is_default',1, $language->is_default )!!}</label></div>
										
									</div>
								</div>

							<div class="form-group">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="col-md-12 btn-success btn">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
						</div>
					</div>
                	</div>
					</div>
                    	</div>
					</div>
                    	</div>
					</div>    
@endsection