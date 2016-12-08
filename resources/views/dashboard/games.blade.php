@extends('layouts.appLayout')
@section('content')
	<section class="content-header">
          <h1>
            Game
            <small>Management</small>
          </h1>
            <ol class="breadcrumb">
              <li><a href=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><strong>Games</strong></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Game</h3>
                </div><!-- /.box-header -->
                <div class="row">
                	<!--this area for form msg-->
                </div>
                <!-- form start -->
                <div class="box-header with-border"> <button class="btn btn-success pull-right show-hide-form" >Add Game</button></div>
                <form role="form" method="post" action="" style="display:none" id="add_game" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-2">
                              <label for="game">Game Name</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="game" placeholder="Game name" required="required">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-2">
                              <label for="game">GLN Game ID</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="gln_game_id" placeholder="GLN Game ID" required="required">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="game">Game Description</label>
                          </div>
                          <div class="col-md-10">
                            <textarea class="form-control" rows="3" name="describe" name="about" placeholder="Description" required="required"></textarea>
                          </div>
                        </div>  
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-2">
                            <label for="category">Select Category</label>
                          </div>
                          <div class="col-md-10">  
                            <select class="form-control" name="category" required="required">
                             <option value=""></option>
                            </select> 
                          </div>
                        </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="status">Select Status</label>
                        </div>
                        <div class="col-md-10">  
                          <input type="checkbox" name="isFeature" value="1">&nbsp; Featured
                        </div>
                      </div>  
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                            <label for="android">Android Download link</label>
                          </div>
                          <div class="col-md-10">
                            <input type="url" class="form-control" name="link1" pattern="https?://.+" placeholder="Android Download link" required="required">
                          </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                            <label for="ios">Ios Download link</label>
                          </div>
                          <div class="col-md-10">
                            <input type="url" class="form-control" name="link4" pattern="https?://.+" placeholder="Ios Download link" required="required">
                          </div>
                      </div>    
                    </div>
                   <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                            <label for="deep">Deep link</label>
                          </div>
                          <div class="col-md-10">
                            <input type="url" class="form-control" name="link3" pattern="https?://.+" placeholder="Deep link" required="required">
                          </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="File">Select Game Icon</label>
                        </div>
                        <div class="col-md-10">  
                          <input type="file" name="file" required="required" accept="image/*">
                        </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="File">Select Game Banner</label>
                        </div>
                        <div class="col-md-10">  
                          <input type="file" name="game_banner" required="required" accept="image/*">
                        </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="File">Select Featured Graphic</label>
                        </div>
                        <div class="col-md-10">  
                          <input type="file" name="featured_graphic"  accept="image/*">
                        </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="File">Select Game Screenshots</label>
                        </div>
                        <div class="col-md-10">   
                          <input type="file" name="images[]" multiple="multiple" required="required" accept="image/*">
                        </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="File">Select video</label>
                        </div> 
                        <div class="col-md-10"> 
                          <input type="file" name="video" accept="video/*">
                        </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="File">Select Video Thumbnail</label>
                        </div>
                        <div class="col-md-10">  
                          <input type="file" name="video_thumbnail" accept="image/*">
                        </div>
                      </div>    
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div> 
          <div class="row">
            <div class="col-xs-12">
	<div class="box">
	 	<div class="box-header">
	        <h3 class="box-title">Games</h3>
	    </div>

		<div class="box-body table-responsive no-padding">
		 	<table id="user_table" class="table table-fhr table-responsive table-hover">
	 		<thead>
	 			<tr class="unread checked">
					<th style="text-align:center" class="hidden-xs">
						Game Icon
					</th>
					<th style="text-align:center" class="hidden-xs">
						Game Name
					</th>
					<th style="text-align:center" class="hidden-xs">
						Game Category
					</th>
					<th style="text-align:center" class="hidden-xs">
						Deep Link
					</th>
					<th style="text-align:center" class="hidden-xs">
						Screenshots
					</th>
					<th style="text-align:center" class="hidden-xs">
						Game video
					</th>
					<th style="text-align:center" class="hidden-xs">
						Detail
					</th>
					<th style="text-align:center" class="hidden-xs">
						action
					</th>
				</tr>
	 		</thead>
			<tbody>
	 	@foreach($games as $gameItem)							
				<tr style="text-align:center;" class="unread checked">
					<td class="hidden-xs">
						<img src="{{ URL::asset('/images/game_banners').'/'. $gameItem->game_image }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
					</td>
					<td style="text-align:center;" class="hidden-xs">
						{{ $gameItem->name }}				
					</td>
					<td style="text-align:center;" class="hidden-xs">
							{{ $gameItem->category }}
					</td>
					<td style="text-align:center;" class="hidden-xs">
						<a href="{{ $gameItem->deep_link }}">{{ $gameItem->deep_link }}</a>
					</td>
					<td style="text-align:center;" class="hidden-xs">
						<a href="{{ route('gameImages',$gameItem->id) }}" data-action="Image" data-item-type="Images" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Image">Images</a>
					</td>
					<td style="text-align:center;" class="hidden-xs">
						<span class="label label-danger">No video</span>
					</td>
					<td style="text-align:center;" class="hidden-xs" >
						<a href="{{ route('gameDetails',$gameItem->id) }}" data-action="Detail" data-item-type="Detail" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Detail">Detail</a>
					</td>
					
					<td style="text-align:center;" align="center">
						<a href="" data-action="edit" data-item-type="users" data-id="12215" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Edit">
							<i class="fa fa-pencil fa-lg"></i>
						</a>&nbsp;
	                    <a href="" data-action="delete" data-action-type="User" data-id="12215" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
	                    	<i class="fa fa-trash-o fa-lg"></i>
	                    </a>
	                </td>
				</tr>					
		    @endforeach
		    </tbody>
			</table>
		</div>
	</div>
	</div>
	</div>
<<<<<<< HEAD
@endsection()

@push('styles')
<!-- Fancy Box -->
    <script src="assets/plugins/fancy-box-2.1.5/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/Chart.js"></script>
<script src="js/wow.min.js"></script>
    <script src="assets/magnific.min.js"></script>
       <!-- jquery sweet alert plugin-->
    <script type="text/javascript" src="assets/plugins/sweet-alert/sweet-alert.js"></script>
     
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
  
@endpush

@push('scripts')

 <script src="/js/overlay.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="/js/bootstrap.min.js"></script>
   <script src="/js/moment.js"></script>
   <script src="/js/bootstrap-datepicker.js"></script>
   <link href="/css/toastr.min.css" rel="stylesheet">
  
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/scripts.js"></script>

    <script src="/js/toastr.min.js"></script>
    {!! Toastr::render() !!}
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
 <!--<script src="js/bootstrap.min.js"></script>-->
<script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
})
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="/js/typehead.js"></script>
@endpush
=======
@endsection()
>>>>>>> 781fed86929c1fc2c3a1234b9f36203e0edfaf23
