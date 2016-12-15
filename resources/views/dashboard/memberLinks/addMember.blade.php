@extends('layouts.appLayout')
@section('content')
	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add User</h3>
        </div>
		<form action="{{ route('addMember') }}" role="form" method="post"  >
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-md-2">
                            	<label for="fname">First Name</label>
                        	</div>
                          	<div class="col-md-10">
                            	<input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                        	</div>
                      	</div>    
                    </div>
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-md-2">
                            	<label for="lname">Last Name</label>
                        	</div>
                        	<div class="col-md-10">
                            	<input type="text" class="form-control" name="lname" placeholder="Last Name" required="required">
                        	</div>
                    	</div>    
                    </div>
                    <div class="form-group">
                    	<div class="row">
                        	<div class="col-md-2">
                            	<label for="email">Email</label>
                        	</div>
                        	<div class="col-md-10">
                            	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
                        	</div>
                      	</div>    
                    </div>

                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="uname">Username</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="user_name"  required="required">
                          </div>
                      </div>    
                    </div>

                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="password">Password</label>
                          </div>
                          <div class="col-md-10">
                            <input type="password" pattern=".{6,}" title="6 characters minimum" class="form-control" name="password" placeholder="Password" required="required">
                          </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="country">Country</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="country" placeholder="Country" required="required">
                          </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="phone">Phone</label>
                          </div>
                          <div class="col-md-10">
                            <input type="number" class="form-control" name="phone" placeholder="Phone" required="required">
                          </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="imatrix">Referrer Imatrix ID</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control" name="imid" placeholder="Referrer Imatrix ID" required="required">
                          </div>
                      </div>    
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer" align="center">
                    <button type="submit" id="User" class="btn btn-primary">Add Member</button>
                </div>
            </form>

@endsection()

