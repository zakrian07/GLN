@extends('layouts.appLayout')

@section('content')
{!! Breadcrumbs::render('screen_name') !!}
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">Screen Name</div>
                <div class="panel-body">
               
                 <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							 <form class="form-horizontal" role="form" method="post" action="{{ route('screen_names.update',['screen_name'=>$screen_name])}}">
                                 {{method_field('patch')}}
                                {{ csrf_field() }}
								
								@include('screen_names.ScreenNameForm')
								
							
							<div class="form-group">
                            <div class="col-md-3 col-md-offset-4">
                                <button type="submit" class="col-md-12 btn-success btn">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
						</div>
					</div>
                	</div>
					</div>
                    	</div>
					</div>
                    	</div>
					</div>  

@endsection