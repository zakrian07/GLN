@extends('layouts.appLayout')

@section('content')
  <a id="total"></a>
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class=" panel-heading" style="background-color:rgba(23, 10, 31, 0.61);"> 
									<h2>Multi Languages
										<a style="margin-top: -11px; float: right;  padding-right: 23px;" type="button" href="{{ URL::action('MultiLanguageController@create') }}" >
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
											<th>Created At</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
										</tr>
									</thead>
									<tbody id="table-rows">
									
                                        @foreach($languages as $language)
                                         <tr id = {{$language->id}}>
                                         
											<td>{{$language->id}}</td>
											<td>{{$language->language}}</td>
                                            <td style="width:10%">{{$language->created_at}}</td>
                                           
											
											<td><a href="{{ $url = action('MultiLanguageController@edit', ['id' => $language->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                            <td>
                                         
                                           <a title="Delete" class="btn btn-danger btn-xs" onclick="deleteLanguage({{$language->id}});"><span class="glyphicon glyphicon-remove"></span></a>
                                            
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

function deleteLanguage(id)
{
    $.ajax({
        url: "{{env('REWARDS_API_URL')}}languages/"+ id,
        type: 'DELETE',            
        processData: false,
        contentType: false,
        success: function (data, status)
		{
			if(data['errors']){
				 toastr.error('Failed to Delete');
			}else{
				 toastr.success('MultiLanguage is Deleted');
				 deleteRow(data['id']);
			}
		}
	});

};
         
 </script>

@endsection

