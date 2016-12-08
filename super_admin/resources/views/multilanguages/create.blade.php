@extends('layouts.appLayout')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">

                <a style="margin-right:10px" type="button" href="{!! URL::previous() !!}">
						<img src="/images/buttons/back5.png" />
				</a>

                Add Multi Language for loot reward web</div>
                <div class="panel-body">
               
                 <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							 <form class="form-horizontal" role="form" method="post" action="{{env('REWARDS_API_URL')}}languages">
                                {{ csrf_field() }}
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Title</label>
									<div class="col-sm-8">
										<input id="language" type="text" class="form-control"  name="language" value="{{ $multi_language->language}}">
                                       <span class="help-block">
                                             <strong id='title_error'></strong>
                                       </span>
                                	</div>									
								</div>
								
							
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




<script>
$(document).on("submit", "form", function(event)
{
    event.preventDefault();
    var url=$(this).attr("action");
    $.ajax({
        url: url,
        type: 'POST',            
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {
                if(data['errors']){
                 toastr.error('Failed to Create');
                if(data['errors']['title']){
                    document.getElementById("title_error").innerHTML = data['errors']['title'][0];    
                }else{document.getElementById("title_error").innerHTML = '';}
                
            }else{
                toastr.success('Multi Language is created');
                 window.location.href = '/multilanguages';
            }
        }
    });
});
</script>
@endsection

