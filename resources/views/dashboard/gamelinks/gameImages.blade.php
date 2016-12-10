@extends('layouts.appLayout')
@section('content')
	<section class="content-header">
      	<h1>
	        View/Add
	        <small>Images</small>
      	</h1>
    </section>

    <section class="content">
	    <div class="row">
	    </div>	
	    <div class="row">
            <div class="col-md-12">
            	<div class="box box-primary">
		                <div class="box-header with-border">
		                  <h3 class="box-title">Add Images</h3>
		                </div>
		            <form name="game" id="edit_game" action="process/add_image.php" method="post" enctype="multipart/form-data"> 
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
                    				<button type="submit" id="submit" class="btn btn-primary">Submit</button>&nbsp;
                    			<a href="{{ route('games') }}" class="btn btn-success">Back</a>
                  			</div>
		            	</div>	
		        	</form>   
		        </div>
		    </div>
		</div>
		    
		<div class="row">
		    <div class="col-md-6 col-lg-4">
		    	<div class="box">
    				<div class="box-header">
	                  <h3 class="box-title">Images</h3>
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
			                    		<a href="" data-action="delete_img" data-action-type="Image" data-id="58" data-game="26" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o fa-lg"></i></a>
			                    	</td>
			                    </tr>
			                    @endforeach
			                	    		                      
		    				</tbody>
		    			</table>
		    		</div>
		    	</div>				
		    </div>	
		    <div class="col-md-6 col-lg-8">	
	        	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	        			
  				<!-- Indicators -->
					<ol class="carousel-indicators">
					  	<?php $i=1; ?>
					   @foreach($images as $imageItem)
					   
					    <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="active"></li>
					   <?php $i++; ?>
					    @endforeach
					</ol>

				  <!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
				      		@foreach($images as $imageItem)			    	
					    <div class="item">
					      <img src="{{ URL::asset('/images/all').'/'. $imageItem->photo_name }}" alt="Game Screenshots" width="100%">
					    </div> 
					    	@endforeach 
					   
					</div>

				  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
				 </div>			
			</div>		
	    </div>            
	</section>
@endsection()

