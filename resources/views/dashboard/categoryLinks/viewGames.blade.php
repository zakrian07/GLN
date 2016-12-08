@extends('layouts.appLayout')
@section('content')
	<section class="content-header">
          <h1>
            Game Categories
          </h1>
            <ol class="breadcrumb">
              <li><a href=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li><a href=""><i class=""></i> Category</a></li>
              <li class="active"><strong>Games</strong></li>
            </ol>
        </section>
 
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
							{{ $games->category }}
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
						<a href="" data-action="Detail" data-item-type="Detail" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="Detail">Detail</a>
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
