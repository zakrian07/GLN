@extends('layouts.appLayout')

@section('content')
<section class="content-header">
          <h1>
            Categories
            <small>Information</small>
          </h1>
            <ol class="breadcrumb">
              <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><strong>categories</strong></li>
            </ol>
        </section>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Category</h3>
                </div><!-- /.box-header -->
                <div class="row">
                <!--alert msg-->
                </div>
                <!-- form start -->
                <div class="box-header with-border"> <button class="btn btn-success pull-right show-hide-form" >Add Category</button></div>
                <form role="form" method="post" action="process/add_category.php" style="display:none" id="category" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="category">Category</label>
                          </div>
                          <div class="col-md-10">  
                            <input type="text" class="form-control" name="category" placeholder="Category" required="required">
                          </div>
                      </div>      
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-2">
                            <label for="File">Select Category Icon</label>
                          </div> 
                          <div class="col-md-10">  
                            <input type="file" name="file" required="required">
                          </div>
                        </div>    
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" id="category" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Categories</h3>
                </div><!-- /.box-header --><br>

		<div class="box-body table-responsive no-padding">
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
		 	<table id="user_table" class="table table-fhr table-responsive table-hover">
		 		<thead>
		 			<tr class="unread checked">
						<th style="text-align:center" class="hidden-xs">
							Category Id
						</th>
						<th style="text-align:center" class="hidden-xs">
							Category Icon
						</th>
						<th style="text-align:center" class="hidden-xs">
							Category
						</th>
						<th style="text-align:center" class="hidden-xs">
							action
						</th>
						<th style="text-align:center" class="hidden-xs">
							view Games
						</th>
					</tr>
		 		</thead>
			
				<tbody>
		 	@foreach($categories as $categoryItem)							
					<tr class="unread checked">
						<td style="text-align:center" class="hidden-xs">
							{{ $categoryItem->cid }}	
						</td>
						<td style="text-align:center" class="hidden-xs">
						 	<img src="{{ URL::asset('/images/category_image').'/'.$categoryItem->category_image }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">	
						</td>
						<td style="text-align:center" class="hidden-xs">
							{{ $categoryItem->category }}
						</td>
						<td style="text-align:center" class="hidden-xs">
							<a href="{{ route('editCategory',$categoryItem->cid) }}" data-action="edit" data-item-type="users" data-id="12215" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Edit">
								<i class="fa fa-pencil fa-lg"></i>
							</a>&nbsp;
		                    <a href="{{ route('deleteCategory',$categoryItem->cid)}}"  class="btn btn-danger btn-sm">
		                    	<i class="fa fa-trash-o fa-lg"></i>
		                    </a>
						</td>
						<td style="text-align:center" class="hidden-xs">
							<a href="{{ route('gameByCategory',$categoryItem->cid) }}" class="btn btn-info">View Games</a>
						</td>
					</tr>					
		    @endforeach
		    </tbody>
			</table>
		</div>
	</div>
	</div>
	</div>
@endsection()