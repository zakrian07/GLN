@extends('layouts.appLayout')

@section('content')
    <section class="content-header">
        <h1>Game
            <small>Detail</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href=""><i class="fa fa-dashboard"></i> Game</a></li>
            <li class="active"><strong>Details</strong></li>
        </ol>
    </section>

<section class="content">
    <div class="row">
	    <div class="col-xs-12">
	        <div class="box">
	            <table class="table table-striped">
	              	<tr>
                        <th>Game ID</th>
                        <td>{{ $row->id  }}</td>
                    </tr>
                    <tr>
                        <th>GLN Game ID</th>
                        <td>{{ $row->gln_game_id }}</td>
                    </tr>
	              	<tr>
                        <th>Game Icon</th>
                        <td>
                            <img src="{{ URL::asset('/images/game_banners').'/'. $row->game_image }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
                        </td>
                    </tr>
	              	<tr>
                        <th>Game Name</th>
                        <td>{{ $row->name }}</td>
                    </tr>
	              	<tr>
                        <th>Game Category</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Is Featured</th>
                        <td> @if($row->featured_graphic!="")
                             <img src="{{ URL::asset('/images/featured_graphics').'/'. $row->featured_graphic }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
                             @else
                             N/a
                             @endif   
                        </td>
                    </tr>
                        
	              	<tr>
                        <th>Description</th>
                        <td>
                       {{ $row->description }}
                        </td>
                    </tr>
	              	<tr>
                        <th>Android Download Link</th>
                        <td>
                            <a href="{{ $row->ios_link }}" target="_blank">{{ $row->ios_link }}</a>
                        </td>
                    </tr>
	              	<tr>
                        <th>IOS Download Link</th>
                        <td>
                            <a href="{{ $row->download_link }}" target="_blank">{{ $row->download_link }}</a>
                        </td>
                    </tr>
	              	<tr>
                        <th>Deep Link</th>
                        <td>

                            <a href="{{ $row->deep_link }}" target="_blank">{{ $row->deep_link }}</a>
                        </td>
                    </tr>

	              	<tr>
                        <th>Created Date</th>
                        <td>{{ $row->created_date }}</td>
                    </tr>
                    
                    <tr>
                        <th><a href="{{ route('games') }}" class="btn btn-success">Back</a></th>
                        <td></td>
                    </tr>
	              </table>	
	        </div>
        </div>
    </div> 
</section>

@endsection
