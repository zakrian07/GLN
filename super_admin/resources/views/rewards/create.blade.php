@extends('layouts.appLayout')

@section('content')
{!! Breadcrumbs::render('reward', $reward) !!}
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">

                <a style="margin-right:10px" type="button" href="{!! URL::previous() !!}">
						<img src="/images/buttons/back5.png" />
				</a>

                Reward</div>
                <div class="panel-body">
               
                 <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							 <form class="form-horizontal" enctype ="multipart/form-data" role="form" method="post" action="{{ route('rewards.store')}}">
                               
                                {{ csrf_field() }}
								
								@include('rewards.RewardForm')
								
							<div><hr></hr></div>
                           

	                        @include('rewards.Translation.addForm')
                           <div id = 'translation_rows'>
                           
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
    openOverLay();
    event.preventDefault();

    var url=$(this).attr("action");
    $.ajax({
        url: "{{env('REWARDS_API_URL')}}rewards",
        type: 'POST',            
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
        {
            closeOverLay();
            if(data['errors']){
                 toastr.error('Failed to Create');
                if(data['errors']['title']){
                    document.getElementById("title_error").innerHTML = data['errors']['title'][0];    
                }else{document.getElementById("title_error").innerHTML = '';}
                
                if(data['errors']['description']){
                    document.getElementById("description_error").innerHTML = data['errors']['description'][0];  
                }else{document.getElementById("description_error").innerHTML = '';}
                if(data['errors']['picture']){
                    document.getElementById("picture_error").innerHTML = data['errors']['picture'][0]; 
                }else{document.getElementById("picture_error").innerHTML = '';}

                if(data['errors']['gallery']){
                    document.getElementById("gallery_error").innerHTML = data['errors']['gallery'][0]; 
                }else{document.getElementById("gallery_error").innerHTML = '';}                
                if(data['errors']['end_date']){
                    document.getElementById("end_date_error").innerHTML = data['errors']['end_date'][0]; 
                }else{document.getElementById("end_date_error").innerHTML = '';}
            }else{
                openOverLay();
                toastr.success('Reward Created');
                iterate_on_add_row(data.id);
                closeOverLay();
                window.location.href = '/rewards';
            }
        }
    });
});
</script>
@endsection

