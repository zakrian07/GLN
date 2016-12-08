@extends('layouts.loginLayout')

@section('content')

<div class="inner-bg">
                <div class="container">
                
                    <div class="row">
                        <div class="col-sm-5" style="float: none;margin: 0 auto;">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
                                        <a class="company-logo"> </a>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
                                <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
				                     {{ csrf_field() }}
				                    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				                    		<label class="sr-only" for="email">Email</label>
				                        	 <input id="email" type="text" placeholder='Email' class="form-username form-control" name="email" value="{{ old('email') }}" autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="help-block" style="color:white">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				                    		<label class="sr-only" for="password">Password</label>
				                        	 <input id="password" type="password" placeholder='Password' class="form-password  form-control" name="password" >
                                                @if ($errors->has('password'))
                                                    <span class="help-block" style="color:white">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
				                        <button type="submit" class="btn">Sign in</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	
	                        
                        </div>
                        
                        
                       
                    </div>
                    
                </div>
</div>



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