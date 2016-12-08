@extends('layouts.appLayout')
@section('content')
<section class="content-header">
    <h1>Game
        <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><strong>Games</strong></li>
    </ol>
</section>

<section class="content">
    <div class="row">
	    <div class="col-xs-12">
	        <div class="box">
	            <table class="table table-striped">
	              	<tr>
                        <th>Game ID</th>
                        <td>{{ $row->id  }}</td>
                    </tr>
                    <tr>
                        <th>GLN Game ID</th>
                        <td>{{ $row->gln_game_id }}</td>
                    </tr>
	              	<tr>
                        <th>Game Icon</th>
                        <td>
                            <img src="{{ URL::asset('/images/game_banners').'/'. $row->game_image }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
                        </td>
                    </tr>
	              	<tr>
                        <th>Game Name</th>
                        <td>{{ $row->name }}</td>
                    </tr>
	              	<tr>
                        <th>Game Category</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Is Featured</th>
                        <td> @if($row->featured_graphic!="")
                             <img src="{{ URL::asset('/images/featured_graphics').'/'. $row->featured_graphic }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
                             @else
                             N/a
                             @endif   
                         </td>
                    </tr>
                        
	              	<tr>
                        <th>Description</th>
                        <td>
                       {{ $row->description }}
                        </td>
                    </tr>
	              		<tr><th>Android Download Link</th>
                        <td>
                            <a href="{{ $row->download_link }}" target="_blank">{{ $row->download_link }}</a>
                        </td>
                    </tr>
	              	<tr>
                        <th>IOS Download Link</th>
                        <td>
                            <a href="{{ $row->download_link }}" target="_blank">{{ $row->download_link }}</a>
                        </td>
                    </tr>
	              	<tr>
                        <th>Deep Link</th>
                        <td>
<<<<<<< HEAD
                            <a href="{{ $row->deep_link }}" target="_blank">{{ $row->deep_link }}</a>
=======
                            <a href="{{ $row->download_link }}" target="_blank">{{ $row->download_link }}</a>
>>>>>>> 781fed86929c1fc2c3a1234b9f36203e0edfaf23
                        </td>
                    </tr>
	              	<tr>
                        <th>Created Date</th>
                        <td>{{ $row->created_date }}</td>
                    </tr>
                    <tr>
                        <th><a href="" class="btn btn-success">Back</a></th>
                        <td></td>
                    </tr>
	              	</table>	
	              </div>
                </div>
            </div> 
     </section>
<<<<<<< HEAD
@endsection

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
@endsection
>>>>>>> 781fed86929c1fc2c3a1234b9f36203e0edfaf23
