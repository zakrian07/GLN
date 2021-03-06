@extends('layouts.appLayout')

@section('content')
{!! Breadcrumbs::render('control_name') !!}
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">

                <a style="margin-right:10px" type="button" href="{!! URL::previous() !!}">
						<img src="/images/buttons/back5.png" />
				</a>

                Control Name</div>
                <div class="panel-body">
               
                 <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							 <form class="form-horizontal" role="form" method="post" action="{{ route('control_names.store')}}">
                                {{ csrf_field() }}
								
								@include('control_names.ControlNameForm')
								
							
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