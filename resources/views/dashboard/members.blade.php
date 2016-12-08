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
                <button class="btn btn-success pull-right show-hide-form" >Add User</button>
            </div>
            
            <form action="{{ route('addMember') }}" role="form" method="post" style="display:none" action="" id="add_user" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="uname" placeholder="Username" required="required">
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
					<td  style="text-align:center;" class="hidden-xs">
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
      <script src="/js/toastr.min.js"></script>   
   <script src="/js/moment.js"></script>
   <script src="/js/bootstrap-datepicker.js"></script>
   
  
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/scripts.js"></script>


    {!! Toastr::render() !!}

 <!--<script src="js/bootstrap.min.js"></script>-->
<script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
})
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="/js/typehead.js"></script>
@endpush