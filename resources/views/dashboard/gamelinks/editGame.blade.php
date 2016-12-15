@extends('layouts.appLayout')
@section('content')
	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit User</h3>
        </div>
		<form role="form" action="{{ route('updateGame') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			 <input type="hidden" name="id" value="{{ $row->id }}">
				
				<div class="form-group">
					<label class="col-md-2 control-label">Game Name</label>
					<div class="col-md-10">							
												
							<input type="text" name='gameName' value="{{ $row->name }}" class="form-control" placeholder="Game Name"/>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">GLN Game Id</label>
					<div class="col-md-10">							
												
							<input disabled="true" type="text" name='gln_game_id' value="{{ $row->gln_game_id }}" class="form-control" placeholder="First Name"/>
						<div class="clearfix"> </div>
					</div>
					
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Game Description</label>
					<div class="col-md-10">
						
							<textarea id="email" name="description"  class="form-control" >{{ $row->description }}</textarea>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Select Category</label>
					<div class="col-md-10">
							<select  name="category" class="form-control"  placeholder="User Name">
								@foreach($categories as $category)
									<option>{{ $category->category }}</option>
								@endforeach
							</select>
						<div class="clearfix"> </div>
					</div>
				</div>

				
				<div class="form-group">
					<label class="col-md-2 control-label">Select Status</label>
					<div class="col-md-10">
					@if($row->idFeatured==0)
							<input name="status"  class="form-control" type="checkbox" />
					@elseIf($row->idFeatured==1)
							<input name="status" checked="checked"  class="form-control" type="checkbox" />
					@endif
						<div class="clearfix"> </div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-2 control-label">Andoid Download Link</label>
					<div class="col-md-10">
							<input type="url" name="androidLink" value="{{ $row->download_link }}" class="form-control1" placeholder="Android Download Link">
					</div>
					<div class="clearfix"> </div>
				</div>
		
				<div class="form-group">
					<label class="col-md-2 control-label">Ios download Link</label>
					<div class="col-md-10">
						<input type="url" name="iosLink" value="{{ $row->ios_link }}" class="form-control1" placeholder="Ios Download Link">
					</div>

					<div class="clearfix"> </div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Deep Link</label>
					<div class="col-md-10">
						<input type="url"  name="deepLink" value="{{ $row->deep_link }}" class="form-control1" placeholder="Deep Link">
					</div>

					<div class="clearfix"> </div>
				</div>
			

				<div class="form-group">
						<label class="col-md-2 control-label">Select Featured Graphic</label>
						<div class="col-md-5">
							<input type="file"  name="graphic"  class="form-control1">
						</div>
						<div class="col-md-5">
							<img src="{{ URL::asset('/images/featured_graphics').'/'. $row->featured_graphic }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
						</div>
						<div class="clearfix"> </div>
				</div>

				<div class="form-group">
						<label class="col-md-2 control-label">Select Game Banner</label>
						<div class="col-md-5">
							<input type="file"  name="gameBanner"  class="form-control1">
						</div>
						<div class="col-md-5">
							<img src="{{ URL::asset('/images/game_banners').'/'. $row->game_banner }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
						</div>
						<div class="clearfix"> </div>
				</div>

				<div class="form-group">
						<label class="col-md-2 control-label">Select Video Thumbnail</label>
						<div class="col-md-5">
							<input type="file"  name="thumbnail"  class="form-control1">
						</div>
						<div class="col-md-5">
							<a href="{{ URL::asset('/images/video_thumbnails').'/'. $row->video_thumbnail_link }}">{{ $row->video_thumbnail_link }} </a>
						</div>
						<div class="clearfix"> </div>
				</div>

				<div class="form-group">
						<label class="col-md-2 control-label">Select Video</label>
						<div class="col-md-5">
							<input type="file"  name="video"  class="form-control1">
						</div>
						<div class="col-md-5">
							
						</div>
						<div class="clearfix"> </div>
				</div>

				<div class="form-group">
						<label class="col-md-2 control-label">Select Game Icon</label>
						<div class="col-md-5">
							<input type="file"  name="gameIcon"  class="form-control1">
						</div>
						<div class="col-md-5">
							<img src="{{ URL::asset('/images/game_image').'/'. $row->game_image }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
						</div>
						<div class="clearfix"> </div>
				</div>

			</div>
			<div class="box-footer" align="center">
                <input type="submit" class="btn btn-primary" value="Save" name="submit">&nbsp;
    			<a href="{{ route('games')}}" class="btn btn-success">Back</a>            
            </div>
		</form>
	</div>
@endsection()

