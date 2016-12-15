@extends('layouts.appLayout')
@push('royalslider')
 <link href="{{ URL::asset('/plugins/royalslider/royalslider.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('/plugins/royalslider/ga.js') }}" async="" type="text/javascript"></script>
     <script src="{{ URL::asset('plugins/royalslider/jquery.js') }}"></script>
    <link href="{{ URL::asset('plugins/royalslider/reset.css') }}" rel="stylesheet">
 <link href="{{ URL::asset('/plugins/royalslider/rs-default.css') }}" rel="stylesheet">
 <style>
 #gallery-1 {
  width: 100%;
  height:627px;
  -webkit-user-select: none;
  -moz-user-select: none;  
  user-select: none;
}
.royalSlider > .rsImg {
  visibility:hidden;
}
.royalSlider img {
}
.rsWebkit3d .rsSlide {
    -webkit-transform: none;
}
.rsWebkit3d img {
    -webkit-transform: translateZ(0);
}
      .visibleNearby {
  width: 100%;
  background: #141414;
  color: #FFF;
  padding-top: 25px;
}
.visibleNearby img {
   -webkit-backface-visibility:hidden;
}
.visibleNearby .rsGCaption {
  font-size: 16px;
  line-height: 18px;
  padding: 12px 0 16px;
  background: #141414;
  width: 100%;
  position: static;
  float: left;
  left: auto;
  bottom: auto;
  text-align: center;
}
.visibleNearby .rsGCaption span {
  display: block;
  clear: both;
  color: #bbb;
  font-size: 14px;
  line-height: 22px;
}
.royalSlider > .rsImg {
  visibility:hidden;
}


/* Scaling transforms */
.visibleNearby .rsSlide img {
  opacity: 0.45;
  -webkit-transition: all 0.3s ease-out;
  -moz-transition: all 0.3s ease-out;
  transition: all 0.3s ease-out;

  -webkit-transform: scale(0.9);  
  -moz-transform: scale(0.9); 
  -ms-transform: scale(0.9);
  -o-transform: scale(0.9);
  transform: scale(0.9);
}
.visibleNearby .rsActiveSlide img {
  opacity: 1;
  -webkit-transform: scale(1);  
  -moz-transform: scale(1); 
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}

/* Non-linear resizing on smaller screens */
@media screen and (min-width: 0px) and (max-width: 900px) { 
  #gallery-1 {
    padding: 12px 0 12px;
  }
  #gallery-1 .rsOverflow,
  .royalSlider#gallery-1 {
    height: 400px !important;
  }
}
@media screen and (min-width: 0px) and (max-width: 500px) { 
  #gallery-1 .rsOverflow,
  .royalSlider#gallery-1 {
    height: 300px !important;
  }
}

    </style>
@endpush
@section('content')
	<section class="content-header">
      	<h1>
	        View/Add
	        <small>Images</small>
      	</h1>
      	<ol class="breadcrumb">
              <li><a href=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li><a href=""><i class="fa fa-dashboard"></i> Games</a></li>
              <li class="active"><strong>Images</strong></li>
        </ol>
    </section>

    <section class="content">
	    
	    <div class="row">
            <div class="col-md-12">
            	<div class="box box-primary">
		                <div class="box-header with-border">
		                  <h3 class="box-title">Add Images</h3>
		                </div>
		            <form name="game" id="edit_game" action="{{ route('addImages') }}" method="post" enctype="multipart/form-data"> 
		            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            		<div class="box-body">
		            			<div class="form-group">
		            				<div class="row">
				                        <div class="col-md-2">
				                            <label for="game">Game Name</label>
				                        </div>
			                        	<div class="col-md-10">
					                      <select class="form-control" name="game" required="required">
					                      		<option value="26" selected="selected">Select Games</option>
					                       		@foreach($games as $gameItem)
					                       		<option value="26">{{ $gameItem->name }}</option>
					                       		@endforeach
					                      	</select> 
					                    </div>
					                </div>      
                    		</div>
                    		<div class="form-group">
                    				<div class="row">
			                        <div class="col-md-2">
		                      			<label for="File">Select Images</label>
		                      		</div>

			                      	<div class="col-md-10">	
			                      		<input type="file" name="files[]" multiple="multiple" required="required">
                    				</div>
                    			</div>	
                    		</div>
                    		<div class="box-footer">
                    				<button type="submit" id="submit" class="btn btn-primary">Add New</button>&nbsp;
                    			<a href="{{ route('games') }}" class="btn btn-success">Back</a>
                  			</div>
		            	</div>	
		        	</form>   
		        </div>
		    </div>
		</div>
		    
		<div class="row">
			@if(Session::has('message'))
                      <div class="alert alert-success">
                  <ul>
                
                {{ Session::get('message') }}
                
                  </ul>
                      </div>
		    @endif
		     @if (count($errors) > 0)
		          <div class="alert alert-danger" role="alert">
		            @foreach ($errors->all() as $error)
		                <strong>{{ $error }}</strong>  <br> 
		             @endforeach
		                              
		      @endif
		    <div class="col-md-6 col-lg-4">
		    	<div class="box">
    				<div class="box-header">
	                  <h3 class="box-title" align="center" style="color:white">Images</h3>
	                </div><!-- /.box-header -->
		    		
		    		<div class="box-body table-responsive no-padding">
		    			<table class="table table-hover">
		    				<tbody>
			    				<tr>
			                      <th style="text-align:center">Image</th>
			                      <th style="text-align:center">Delete</th>
			                    </tr>
			                    @foreach($images as $imageItem)
			                    <tr>
			                    	<td align="center">
			                    		<img src="{{ URL::asset('/images/all').'/'. $imageItem->photo_name }}" alt="Game Screenshots" style="height:50px; width:70px;" class="img-rounded">
			                    	</td>
			                    	<td align="center">

			                    		<a href=""  class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg"></i></a>

			                    	</td>
			                    </tr>
			                    @endforeach
			                	    		                      
		    				</tbody>
		    			</table>
		    		</div>
		    	</div>				
		    </div>	
		    <div class="col-md-6 col-lg-8">	
		    		
	        	<div id="gallery-1" class="royalSlider rsDefault">
  				
  					 @foreach($images as $imageItem)

  					 <a class="rsImg" data-rsw="400" data-rsh="500"  data-rsBigImg="{{ URL::asset('/images/all').'/'. $imageItem->photo_name }}" href="{{ URL::asset('/images/all').'/'. $imageItem->photo_name }}">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img width="96" height="72" class="rsTmb" src="{{ URL::asset('/images/all').'/'. $imageItem->photo_name }}" /></a>
  					 
  					 @endforeach

  					 <!--<a class="rsImg" data-rsw="400" data-rsh="500"  data-rsBigImg="http://dimsemenov.com/plugins/royal-slider/img/paintings/1.jpg" href="http://dimsemenov.com/plugins/royal-slider/img/paintings/700x500/1.jpg">Vincent van Gogh - Still Life: Vase with Twelve Sunflowers<img width="96" height="72" class="rsTmb" src="http://dimsemenov.com/plugins/royal-slider/img/paintings/t/1.jpg" /></a>
    	<a class="rsImg" data-rsw="632" data-rsh="500" data-rsBigImg="http://dimsemenov.com/plugins/royal-slider/img/paintings/2.jpg" href="http://dimsemenov.com/plugins/royal-slider/img/paintings/700x500/2.jpg">Vincent van Gogh - The Starry Night<img width="96" height="72" class="rsTmb" src="http://dimsemenov.com/plugins/royal-slider/img/paintings/t/2.jpg" /></a>
    -->
    			</div>	
    					
			</div>		
	    </div>            
	</section>
	<script>
      // Important note! If you're adding CSS3 transition to slides, fadeInLoadedSlide should be disabled to avoid fade-conflicts.
$(document).ready(function($) {
  $('#gallery-1').royalSlider({
    fullscreen: {
      enabled: true,
      nativeFS: true
    },
    controlNavigation: 'thumbnails',
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 850,
    loop: false,
    imageScaleMode: 'fit-if-smaller',
    navigateByClick: true,
    numImagesToPreload:2,
    arrowsNav:true,
    arrowsNavAutoHide: true,
    arrowsNavHideOnTouch: true,
    keyboardNavEnabled: true,
    fadeinLoadedSlide: true,
    globalCaption: true,
    globalCaptionInside: false,
    thumbs: {
      appendSpan: true,
      firstMargin: true,
      paddingBottom: 4
    }
  });

    $('.rsContainer').on('touchmove touchend', function(){});
});

    </script>
@endsection()

