@extends('layouts.appLayout')
@section('content')
    <section class="content-header">
          <h1>
            Game
            <small>Management</small>
          </h1>
            <ol class="breadcrumb">
              <li><a href=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="active"><strong>Games</strong></li>
            </ol>
        </section>
          <div class="row">
            <!-- left column -->
                <div class="col-md-12">
                      <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Add Game</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                    <div class="box-header with-border"> 
                        <a href="{{ route('addGameForm')}}" class="btn btn-success pull-right show-hide-form" >Add Game</a>
                    </div>    
                </div><!-- /.box -->
            </div>
        </div>
      <div class="row">
        <div class="col-xs-12">
         @if(Session::has('message'))
          <div class="alert alert-success">
              <ul>
                  <li>    
                    {{ Session::get('message') }}
                </li>
              </ul>
          </div>
         @endif
         @if (count($errors) > 0)
         <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
              <strong>{{ $error }}</strong>  <br> 
             @endforeach   
           </div>                    
        @endif
        <div class="box-header">
              <h3 class="box-title">Games</h3>
        </div>
        <div class="box-body table-responsive no-padding">
          <table id="user_table" class="table table-fhr table-responsive table-hover">
          <thead>
            <tr class="unread checked">
              <th style="text-align:center" class="hidden-xs">
                Game Icon
              </th>
              <th style="text-align:center" class="hidden-xs">
                Game Name
              </th>
              <th style="text-align:center" class="hidden-xs">
                Game Category
              </th>
              <th style="text-align:center" class="hidden-xs">
                Deep Link
              </th>
              <th style="text-align:center" class="hidden-xs">
                Screenshots
              </th>
            <th style="text-align:center" class="hidden-xs">
              Game video
            </th>
            <th style="text-align:center" class="hidden-xs">
              Detail
            </th>
            <th style="text-align:center" class="hidden-xs">
              action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($games as $gameItem)             
            <tr style="text-align:center;" class="unread checked">
              <td class="hidden-xs">
                 <img src="{{ URL::asset('/images/game_banners').'/'. $gameItem->game_image }}" alt="Game Icon" style="height:50px;cursor:pointer;" class="img-rounded category_image">
              </td>
               <td style="text-align:center;" class="hidden-xs">
                 {{ $gameItem->name }}       
                </td>
               <td style="text-align:center;" class="hidden-xs">
                    {{ $gameItem->category }}
               </td>
                <td style="text-align:center;" class="hidden-xs">
                  <a href="{{ $gameItem->deep_link }}">{{ $gameItem->deep_link }}</a>
                </td>
                <td style="text-align:center;" class="hidden-xs">
                    <a href="{{ route('gameImages',$gameItem->id) }}" data-action="Image" data-item-type="Images" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Image">Images</a>
                </td>
                <td style="text-align:center;" class="hidden-xs">
                  <span class="label label-danger">No video</span>
                </td>
                <td style="text-align:center;" class="hidden-xs" >
                  <a href="{{ route('gameDetails',$gameItem->id) }}" class="btn btn-success btn-sm">Detail</a>
               </td>
                <td style="text-align:center;" align="center">
                    <a href="{{ route('editGame',$gameItem->id) }}" class="btn btn-success btn-sm">
                      <i class="fa fa-pencil fa-lg"></i>
                    </a>&nbsp;
                    <a href="{{ route('deleteGame',$gameItem->id)}}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash-o fa-lg "></i>
                    </a>
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
