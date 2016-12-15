@extends('layouts.appLayout')

@section('content')
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Category</h3>
                </div><!-- /.box-header -->
          <form role="form" method="post" action="{{ route('updateCategory') }}" id="category" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <input type="hidden" name="id" value="{{ $row->cid }}">
             
                    <div class="form-group">
                      <label class="col-md-2 control-label">Category</label>
                      <div class="col-md-10">             
                                    
                          <input type="text" name='fname' value="{{ $row->category }}" class="form-control" placeholder="First Name"/>
                        <div class="clearfix"> </div>
                      </div>
                    </div>
                  
                 
                    <div class="form-group">
                        <label class="col-md-2 control-label">Select Category Icon</label>
                        <div class="col-md-5">
                          <input type="file"  name="gameIcon"  class="form-control1">
                        </div>
                        <div class="col-md-5">
                          <img src="{{ URL::asset('/images/category_image').'/'. $row->category_image }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
                        </div>
                        <div class="clearfix"> </div>
                     </div>
                  </div><!-- /.box-body -->
				      <div class="box-footer" align="center">
				      <button type="submit" class="btn btn-primary">Save</button>&nbsp;
              <a href="{{ route('category') }}" class="btn btn-success">Back</a>
            </div>
            </form>
          
  @endsection

