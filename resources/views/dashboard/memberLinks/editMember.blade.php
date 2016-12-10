@extends('layouts.appLayout')
@section('content')
	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit User</h3>
        </div>
		<form role="form" action="{{ route('updateMember') }}" method="post" class="form-horizontal">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			 <input type="hidden" name="id" value="{{ $row->id }}">
				<div class="form-group">
					<label class="col-md-2 control-label">First Name</label>
					<div class="col-md-10">							
												
							<input type="text" name='fname' value="{{ $row->first_name }}" class="form-control" placeholder="First Name"/>
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Last Name</label>
					<div class="col-md-10">							
												
							<input type="text" name='lname' value="{{ $row->last_name }}" class="form-control" placeholder="First Name"/>
						<div class="clearfix"> </div>
					</div>
					
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Email</label>
					<div class="col-md-10">
						
							<input id="email" name="email" value="{{ $row->email }}" class="form-control" type="text" placeholder="Email Address">
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">User Name</label>
					<div class="col-md-10">
						
							<input id="email" name="uname" value="{{ $row->user_name }}" class="form-control" type="text" placeholder="User Name">
						<div class="clearfix"> </div>
					</div>
				</div>

			
				<div class="form-group">
					<label class="col-md-2 control-label">Country</label>
					<div class="col-md-10">
						
							<input id="email" name="country" value="{{ $row->country }}" class="form-control" type="text" placeholder="country">
						<div class="clearfix"> </div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Phone</label>
					<div class="col-md-10">
						
							<input type="text" name="phone" value="{{ $row->phone }}" class="form-control1" placeholder="">
						</div>
					<div class="clearfix"> </div>
				</div>
		
				<div class="form-group">
					<label class="col-md-2 control-label">Imatrix Id</label>
					<div class="col-md-10">
						<input type="text" disabled="true" name="imatrix" value="{{ $row->imatrix_id }}" class="form-control1" placeholder="">
							</div>

					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="box-footer" align="center">
                <input type="submit" class="btn btn-primary" value="submit" name="submit">&nbsp;
    			<a href="{{ route('members')}}" class="btn btn-success">Back</a>            
            </div>
		</form>

@endsection()

