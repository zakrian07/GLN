@extends('layouts.appLayout')

@section('content')
  <a id="total" data-total="{{$rewards->total}}"></a>
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class=" panel-heading" style="background-color:rgba(23, 10, 31, 0.61);"> 
									<h2>Rewards
										<a style="margin-top: -11px; float: right;  padding-right: 23px;" type="button" href="{{ URL::action('RewardController@create') }}" >
											<img src="/images/buttons/plus.png" />
										</a>
									</h2>
							</div>
						
							
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
                                            <th>#</th>
											<th>Title</th>
											<th>Prize Type</th>
                                            <th>Created At</th>
                                            <th>End At</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
										</tr>
									</thead>
									<tbody id="table-rows">
									
                                        @foreach($rewards->data as $reward)
                                         <tr id = {{$reward->id}}>
                                         
											<td>{{$reward->id}}</td>
											<td>{{$reward->title}}</td>
                                            <td style="width:10%">{{$reward->prize_type}}</td>
                                            <td style="width:10%">{{$reward->created_date}}</td>
                                            <td>{{$reward->end_date}}</td>
										
											
											<td><a href="{{ $url = action('RewardController@edit', ['id' => $reward->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                            <td>
                                         
                                           <a title="Delete" class="btn btn-danger btn-xs" onclick="deleteReward({{$reward->id}});"><span class="glyphicon glyphicon-remove"></span></a>
                                            
                                           </td>
										 </tr>
                                        @endforeach
									
										
									</tbody>
								</table>
								   
    								<div id="page-selection" class="centered_align"></div>
							</div>
						
						</div>



<script>
function deleteRow(rowid)  
{   
    var row = document.getElementById(rowid);
    row.parentNode.removeChild(row);
}

function deleteReward(id)
{
	$.confirm({
        confirmButtonClass: 'btn-danger',
	 	title: 'Delete ',
        text: "Are you sure! you wants to delete this reward?",
        confirm: function(button) {
	openOverLay();
    $.ajax({
        url: "{{env('REWARDS_API_URL')}}"+'rewards/'+ id,
        type: 'DELETE',            
        // data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data, status)
		{
			closeOverLay();
			if(data['errors']){
				 toastr.error('Failed to Delete');
			}else if(data['success']){
				 toastr.success('Reward is Deleted');
				 deleteRow(data['rewardId']);

			}
		}
	});
 },
        cancel: function(button) {
          
        }
    });

    

};       
 </script>

 <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

   <script>
        // init bootpag
        $('#page-selection').bootpag({
            total: $("#total").data('total'),
			maxVisible: 10
        }).on("page", function(event, /* page number here */ pageNum){
			getRewards(pageNum);
        });


	function getRewards(pageNum)
	{

		$.ajax({
			url: "{{env('REWARDS_API_URL')}}"+'rewards?page='+pageNum,
			type: 'GET',            
			success: function (data, status)
			{
				$('#table-rows').empty();
				console.log(data['data']);
				createTableBody(data['data']);
			}
		});

	};

	function createTableBody(rewards){
		 var rows= null;
		 rewards.forEach(function(reward) {
			rows += "<tr id='"+reward['id']+"'>"
			      +	"<td>"+reward['id']+"</td>"
				  +	"<td>"+reward['title']+"</td>"
				  +	"<td>"+reward['prize_type']+"</td>"
				  +	"<td>"+reward['created_date']+"</td>"
				  +	"<td>"+reward['end_date']+"</td>"
				  +	"<td><a href='{{env('REWARDS_API_URL')}}'+'rewards/"+ reward['id']+"/edit'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>"
				  + "<td><a onclick='deleteReward("+reward['id']+");' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></a></td>"
				  +	"</tr>"

		 });
		 $('#table-rows').append(rows);
	}
    </script>
@endsection

@section('script')
	<script src="/js/jquery.confirm.js"></script>
	<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
@endsection