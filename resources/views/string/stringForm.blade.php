								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Screen Name</label>
									<div class="col-sm-8">
											{!! Form::select('screen_name_id', $screen_names, $string->screen_name_id, array('class' => 'form-control1')) !!}
										
										@if ($errors->has('screen_name_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('screen_name_id') }}</strong>
                                            </span>
                                        @endif
                                	</div>
									<div class="col-sm-2">
									 <a  type="button" href="{{ URL::action('ScreenNameController@create') }}" >
											<img src="/images/buttons/plus.png" />
										</a>
									</div>									
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Control Name</label>
									<div class="col-sm-8">
											{!! Form::select('control_name_id', $control_names, $string->control_name_id, array('class' => 'form-control1')) !!}
                                        @if ($errors->has('control_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('control_name') }}</strong>
                                            </span>
                                        @endif
									</div>
									<div class="col-sm-2">
									 <a  type="button" href="{{ URL::action('ControlNameController@create') }}" >
											<img src="/images/buttons/plus.png" />
										</a>
									</div>	
								</div>

                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Key</label>
									<div class="col-sm-8">
										<input id="key" type="text" class="form-control1"  name="key" value="{{ $string->key}}">
                                        @if ($errors->has('key'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('key') }}</strong>
                                            </span>
                                        @endif
									</div>
								</div>

                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Value</label>
									<div class="col-sm-8">
										<input id="value" type="text" class="form-control1"  name="value" value="{{ $string->value}}">
                                        @if ($errors->has('value'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('value') }}</strong>
                                            </span>
                                        @endif
									</div>
								</div>

                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Purpose</label>
									<div class="col-sm-8">
										<input id="purpose" type="text" class="form-control1"  name="purpose" value="{{ $string->purpose}}">
                                        @if ($errors->has('purpose'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('purpose') }}</strong>
                                            </span>
                                        @endif
									</div>
								</div>

                                
								
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Status</label>

									<div class="col-sm-8">
                                    <select name="is_active" id="is_active" class="form-control1">
										<option value="1" {{$string->is_active == 1? "selected" : false}}>Active</option>
										<option value="0" {{$string->is_active == 0? "selected" : false}}>In Active</option>
									</select></div>
								</div>
  
