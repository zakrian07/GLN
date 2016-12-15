@extends('layouts.loginLayout')

@section('content')

 
<div class="inner-bg">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-5" style="float: none;margin: 0 auto;">
                        	
                        	<div class="form-box">
                                @if (count($errors) > 0)
    
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                          <strong>{{ $error }}</strong>  <br> 
                                        @endforeach
                              
                                    </div>
                                 @endif
	                        	<div class="form-top">
	                        		<div class="form-top-left">
                                        <a class="company-logo"> </a>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
                                 
	                            <div class="form-bottom">
                                <form class="login-form" role="form" method="POST" action="{{url('post_login')}}">
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
