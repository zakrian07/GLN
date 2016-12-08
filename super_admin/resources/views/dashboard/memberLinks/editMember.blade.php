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
						<div class="input-group in-grp1">							
							<span class="input-group-addon">
								<i class="fa fa"></i>
							</span>
							<input type="text" name='fname' value="{{ $row->first_name }}" class="form-control" placeholder="First Name"/>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Last Name</label>
					<div class="col-md-10">
						<div class="input-group in-grp1">
							<span class="input-group-addon">
								<i class="fa"></i>
							</span>
							<input type="text" name="lname" value="{{ $row->last_name }}" class="form-control" id="exampleInputPassword1" placeholder="">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Email</label>
					<div class="col-md-10">
						<div class="input-group input-icon right in-grp1">
							<span class="input-group-addon">
								<i class="fa fa-envelope-o"></i>
							</span>
							<input id="email" name="email" value="{{ $row->email }}" class="form-control" type="text" placeholder="Email Address">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Username</label>
					<div class="col-md-10">
						<div class="input-group input-icon right in-grp1">
							<span class="input-group-addon">
								<i class="fa"></i>
							</span>
							<input type="text" name="uname" value="{{ $row->user_name }}" class="form-control" placeholder="">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Country</label>
					<div class="col-md-10">
						<div class="input-group input-icon right in-grp1">
							<span class="input-group-addon">
								<i class="fa fa"></i>
							</span>
							<input id="email" name="country" value="{{ $row->country }}" class="form-control1" type="text" >
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Phone</label>
					<div class="col-md-10">
						<div class="input-group input-icon right in-grp1">
							<span class="input-group-addon">
								<i class="fa"></i>
							</span>
							<input type="text" name="phone" value="{{ $row->phone }}" class="form-control1" placeholder="">
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
		
				<div class="form-group">
					<label class="col-md-2 control-label">Imatrix Id</label>
					<div class="col-md-10">
						<div class="input-group input-icon right in-grp1">
							<span class="input-group-addon">
								<i class="fa"></i>
							</span>
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