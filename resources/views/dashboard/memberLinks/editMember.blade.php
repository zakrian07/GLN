@extends('layouts.appLayout')
@section('content')
	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit User</h3>
        </div>
		<form role="form" action="{{ route('update') }}" method="post" class="form-horizontal">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			 <input type="hidden" name="id" value="{{ $row->id }}">
			<div class="box-body">
				<div class="form-group">
					<label class="col-md-2 control-label">First Name</label>
					<div class="col-md-10">
						<div class="input-group">							
							
							<input type="text" name='fname' value="{{ $row->first_name }}" class="form-control" placeholder="First Name"/>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Last Name</label>
					<div class="col-md-10">
						<div class="input-group in-grp1">
							
							<input type="text" name="lname" value="{{ $row->last_name }}" class="form-control" id="exampleInputPassword1" placeholder="">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Email</label>
					<div class="col-md-10">
						<div class="input-group input-icon right in-grp1">
							
							<input id="email" name="email" value="{{ $row->email }}" class="form-control" type="text" placeholder="Email Address">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Username</label>
					<div class="col-md-10">
						<div class="input-group ">
							<input type="text" name="uname" value="{{ $row->user_name }}" class="form-control" placeholder="">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Country</label>
					<div class="col-md-10">
						<div class="input-group input-icon ">
							<input id="email" name="country" value="{{ $row->country }}" class="form-control1" type="text" >
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Phone</label>
					<div class="col-md-10">
						<div class="input-group">
							
							<input type="text" name="phone" value="{{ $row->phone }}" class="form-control1" placeholder="">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
		
				<div class="form-group">
					<label class="col-md-2 control-label">Imatrix Id</label>
					<div class="col-md-10">
						<div class="input-group ">
							
							<input type="text" name="imatrix" value="{{ $row->imatrix_id }}" class="form-control1" placeholder="">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="box-footer">
                <input type="submit" class="btn btn-primary" value="submit" name="submit">&nbsp;
    			<!--	<a href="{{ route('members')}}" class="btn btn-success">Back</a>-->            
            </div>
		</form>

	</div>
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