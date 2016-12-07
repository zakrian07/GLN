                        <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Title in English</label>
									<div class="col-sm-8">
										<input id="title" type="text" class="form-control"  name="title" value="{{ $reward->title}}">
                                        <span class="help-block">
                                                <strong id='title_error'></strong>
                                            </span>
                                	</div>									
								</div>

                               <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Description  in English</label>
									<div class="col-sm-8">

                                        <textarea style="height:100px" id="description" type="text" class="form-control1"  name="description" >{!! $reward->description !!}</textarea>
                                        <span class="help-block">
                                                <strong id='description_error'></strong>
                                            </span>
                                	</div>									
								</div>
  
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Prize Type</label>

									<div class="col-sm-8">
                                    <select name="prize_type" id="prize_type" class="form-control1">

                                    @foreach(['1','2_5', '6_10', '11_20'] as $type)
                                        <option value="{{$type}}" {{$reward->prize_type == $type? "selected" : false}}>{{$type}}</option>
                                     @endforeach   
									</select></div>
								</div>

                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Picture</label>
									<div class="col-sm-8">
                                      @if($reward->picture) 
                                       <div>
										  <img style="width:150px; height:100px" src= "{{env('G_L_R_URL')}}/assets/images/products/{{$reward->picture}}" alt="picture is not present in directory" class="img-rounded">
                                         
                                        <a style="margin-left: -35px; margin-bottom: 64px;" class="btn btn-primary" onclick="deleteImage('{{$reward->id}}','picture','{{$reward->picture}}');">X</a>
                                       </div>
                                       <span class="help-block">
                                                <strong id='picture_error'></strong>
                                            </span>
                                      @else
                                         {!! Form::file('picture') !!} 
                                      @endif   	
                                	</div>
                                    								
								</div>


                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Gallery</label>
									<div class="col-sm-4">
									   <div>
                                        @foreach(explode(",",$reward->gallery) as $image)
                                          @if($image!='')
                                          
                                            <img style="width:150px; height:100px" src="{{env('G_L_R_URL')}}/assets/images/products/{{$image}}" alt="gallery picture is not present in directory" class="img-rounded">
                                            <a style="margin-left: -35px; margin-bottom: 64px;" class="btn btn-primary" onclick="deleteImage('{{$reward->id}}','gallery','{{$image}}');">X</a>
                                          
                                          @endif
                                        @endforeach                                   
                                        </div>
                                        <input style="margin-top:10px" type="file" name="gallery[]" multiple />
                                       <span class="help-block">
                                                <strong id='gallery_error'></strong>
                                            </span>
                                    </div>									
								</div>

                              
                            <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">End Date</label>
									<div class="col-sm-8">
										<div class='input-group date' id='datetimepicker1' style="margin-left:0%">
                                            <input type='text' name ="end_date" class="form-control" value="{{$reward->end_date}}" />
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
          
            