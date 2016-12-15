@extends('layouts.appLayout')
@section('content')
<section class="content-header">
  <h1>
    User<small>Management</small>
  </h1>
		<ol class="breadcrumb">
		<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><strong>Users</strong></li>
		</ol>
</section>

<div class="row">
            <!-- left column -->
        <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
            <div class="box-header with-border"> 
                <a href="{{ route('memberForm') }}" class="btn btn-success pull-right show-hide-form" >Add User</a>
            </div>
            
            
        </div><!-- /.box -->
    </div>
</div>

<div class="row">
            <!-- left column -->
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Filter Options</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <form role="form" method="post">
                    
                  <div class="box-body">
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                              <label>Email</label>
                              <input id="autocomplete_email"  placeholder="Enter Email" class="form-control" >
                          </div>
                          <div class="col-md-4">
                              <label>User Name</label>
                              <input id="autocomplete_name" name="search_user" placeholder="Enter User name" class="form-control" >
                          </div>
                          
                      </div>    
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
	

          <div class="row">
            <div class="col-xs-12">
	<div class="box">
   @if(Session::has('message'))
                      <div class="alert alert-success">
                  <ul>
                
                {{ Session::get('message') }}
                
                  </ul>
                      </div>
    @endif
     @if (count($errors) > 0)
          <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong>  <br> 
             @endforeach
                              
      @endif
		<div class="box-header">
		        <h3 class="box-title">Users</h3>
		</div>

		<div class="box-body table-responsive no-padding">
		 	<table id="user_table" class="table table-fhr table-responsive table-hover">
	 		  <thead>
	 			  <tr class="unread checked">
				  	<th style="text-align:center" class="hidden-xs">
						Imatrix ID
					 </th>
					<th style="text-align:center" class="hidden-xs">
						First Name
					</th>
					<th style="text-align:center" class="hidden-xs">
						Last Name
					</th>
					<th style="text-align:center" class="hidden-xs">
						Email
					</th>
					<th style="text-align:center" class="hidden-xs">
						Username
					</th>
					<th style="text-align:center" class="hidden-xs">
						Created Date
					</th>
					<th style="text-align:center" class="hidden-xs">
						action
					</th>
				</tr>
	 		</thead>
			<tbody>
	 	@foreach($members as $listItem)							
				<tr class="unread checked">
					 					
          <td id="memberId" style="text-align:center;" class="hidden-xs">
						{{ $listItem->imatrix_id }}
					</td>
					<td style="text-align:center;" class="hidden-xs">
						{{ $listItem->first_name }}
					</td>
					<td style="text-align:center;" class="hidden-xs">
						{{ $listItem->last_name }}
					</td>
					<td style="text-align:center;" class="hidden-xs">
						{{ $listItem->email }}
					</td>
					<td style="text-align:center;" class="hidden-xs">
						{{ $listItem->user_name }}
					</td>
					<td style="text-align:center;" class="hidden-xs">
						{{ $listItem->created_date }}
					</td>
					<td style="text-align:center;" align="center">
						<a href="{{ route('editMember',$listItem->id) }}" data-action="edit" data-item-type="users" data-id="12215" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Edit">
							<i class="fa fa-pencil fa-lg"></i>
						</a>&nbsp;
	                    <a href="{{ route('deleteMember', $listItem->id) }}" class="btn btn-danger btn-sm"  ><i class="fa fa-trash-o fa-lg"></i></a>
	         </td>
	
				  </tr>					
		      @endforeach
		    </tbody>
			</table>
		</div>
	</div>

@endsection()
