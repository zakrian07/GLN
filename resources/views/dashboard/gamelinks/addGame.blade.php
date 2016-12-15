@extends('layouts.appLayout')
@section('content')
	<div class="box box-primary">
       <div class="box-header with-border">
          <h3 class="box-title">Add Game</h3>
        </div>
		
                
    <form role="form" method="post" action="{{ route('addGames')}}"  id="add_game" enctype="multipart/form-data">
      <div class="box-body">
        <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                  <label for="game">Game Name</label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="game" placeholder="Game name" required="required">
              </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                  <label for="game">GLN Game ID</label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="gln_game_id" placeholder="GLN Game ID" required="required">
              </div>
            </div>
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-2">
                  <label for="game">Game Description</label>
              </div>
              <div class="col-md-10">
                <textarea class="form-control" rows="3" name="describe" name="about" placeholder="Description" required="required"></textarea>
              </div>
            </div>  
        </div>
        <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="category">Select Category</label>
              </div>
              <div class="col-md-10">  
                <select class="form-control" name="category" required="required">
                @foreach($categories as $category)
                 <option value="">{{ $category->category }}</option>
                 @endforeach
                </select> 
              </div>
            </div>    
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="status">Select Status</label>
            </div>
            <div class="col-md-10">  
              <input type="checkbox" name="isFeature" value="1">&nbsp; Featured
            </div>
          </div>  
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-2">
                <label for="android">Android Download link</label>
              </div>
              <div class="col-md-10">
                <input type="url" class="form-control" name="link1" pattern="https?://.+" placeholder="Android Download link" required="required">
              </div>
          </div>    
        </div>
        <div class="form-group">
          <div class="row">
              <div class="col-md-2">
                <label for="ios">Ios Download link</label>
              </div>
              <div class="col-md-10">
                <input type="url" class="form-control" name="link4" pattern="https?://.+" placeholder="Ios Download link" required="required">
              </div>
          </div>    
        </div>
       <div class="form-group">
          <div class="row">
              <div class="col-md-2">
                <label for="deep">Deep link</label>
              </div>
              <div class="col-md-10">
                <input type="url" class="form-control" name="link3" pattern="https?://.+" placeholder="Deep link" required="required">
              </div>
          </div>    
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="File">Select Game Icon</label>
            </div>
            <div class="col-md-10">  
              <input type="file" name="file" required="required" accept="image/*">
            </div>
          </div>    
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="File">Select Game Banner</label>
            </div>
            <div class="col-md-10">  
              <input type="file" name="game_banner" required="required" accept="image/*">
            </div>
          </div>    
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="File">Select Featured Graphic</label>
            </div>
            <div class="col-md-10">  
              <input type="file" name="featured_graphic"  accept="image/*">
            </div>
          </div>    
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="File">Select Game Screenshots</label>
            </div>
            <div class="col-md-10">   
              <input type="file" name="images" multiple="multiple" required="required" accept="image/*">
            </div>
          </div>    
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="File">Select video</label>
            </div> 
            <div class="col-md-10"> 
              <input type="file" name="video" accept="video/*">
            </div>
          </div>    
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="File">Select Video Thumbnail</label>
            </div>
            <div class="col-md-10">  
              <input type="file" name="video_thumbnail" accept="image/*">
            </div>
          </div>    
        </div>
      </div><!-- /.box-body -->

      <div class="box-footer" align="center">
        <button type="submit" id="submit" class="btn btn-primary">Add Game</button>
      </div>
    </form>
</div>
@endsection()

