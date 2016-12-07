@extends('layouts.appLayout')

@section('content')
{!! Breadcrumbs::render('string', $language, null, 'languages.strings.create') !!}
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">String</div>
                <div class="panel-body">
               
                 <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							 <form class="form-horizontal" role="form" method="post" action="{{ route('languages.strings.store', ['language' => $language])}}">
                                {{ csrf_field() }}
								
								@include('string.stringForm')
								
							
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