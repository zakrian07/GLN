                        <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Control Title</label>
									<div class="col-sm-8">
										<input id="title" type="text" class="form-control1"  name="title" value={{ $control_name->title}}>
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                	</div>									
								</div>
								