                        <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Title in English</label>
									<div class="col-sm-8">
										<input id="title" type="text" class="form-control1"  name="title" value={{ $reward->title}}>
                                            <span class="help-block">
                                                <strong id='title_error'></strong>
                                            </span>
                                       
                                	</div>									
								</div>
 
                                 <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Description in English</label>
									<div class="col-sm-8">
									
                                       <textarea style="height:100px" id="description" type="text" class="form-control1"  name="description" >{{ $reward->description }}</textarea>
                                            <span class="help-block">
                                                <strong id='description_error'></strong>
                                            </span>
                                    </div>									
								</div>

								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Prize Type</label>

									<div class="col-sm-8">
                                    <select name="prize_type" id="prize_type" class="form-control1">

                                    @foreach($reward->prize_types as $type)
                                        <option value={{$type}} {{$reward->prize_type == $type? "selected" : false}}>{{$reward->prize_type_in_text($type)}}</option>
                                     @endforeach   
									</select></div>
								</div>

                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Picture</label>
									<div class="col-sm-8">
										  {!! Form::file('picture') !!}
                                        
                                            <span class="help-block">
                                                <strong id='picture_error'></strong>
                                            </span>
                                        
                                	</div>									
								</div>

                                 <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Gallery</label>
									<div class="col-sm-8">
										  <input type="file" name="gallery[]" multiple />
                                       
                                            <span class="help-block">
                                                <strong id='gallery_error'></strong>
                                            </span>
                                       
                                	</div>									
								</div>


                            <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">End Date</label>
									<div class="col-sm-8">
										<div class='input-group date' id='datetimepicker1' style="margin-left:0%">
                                            <input type='text' name ="end_date" class="form-control" value={{$reward->end_date}} />
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                       
                                        </div>
                                        
                                        
                                            <span class="help-block">
                                                <strong id='end_date_error'></strong>
                                            </span>
                                        
                                <script type="text/javascript">
                                    $(function () {
                                     $('#datetimepicker1').datetimepicker({
                                            format:'YYYY-MM-DD hh:mm:00'
                                        });
                                    });
                                </script>
   
                                	</div>									
								</div>
          
          