@extends('layouts.appLayout')

@push('styles')

  <script src="assets/scripts/jquery-ui.js"></script>

@endpush
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
                <button class="btn btn-success pull-right show-hide-form" >Add User</button>
            </div>
            
            <form role="form" method="post" style="display:none" action="" id="add_user" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="user_name" placeholder="Username" required="required">
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

                <div class="box-footer">
                    <button type="submit" id="User" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
	                    <a href="" class="btn btn-danger btn-sm"  ><i class="fa fa-trash-o fa-lg"></i></a>
	                </td>
				</tr>					
		    @endforeach
		    </tbody>
			</table>
		</div>
	</div>
  <script type="text/javascript">
  console.log("event called");
     
      $('.btn-danger').click(function() {

    var memberId=$("#memberId").find(".unread").val();

    console.log("memberId",memberId);

    $.ajax({
        url: "{{ route('deleteMember' ," + memberId + ")  }}",
        type: 'get',
        success: function( msg ) {
              
            }
        });
       
    });

  </script>
@endsection()