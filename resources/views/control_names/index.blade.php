@extends('layouts.appLayout')

@section('content')
{!! Breadcrumbs::render('control_names') !!}
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class=" panel-heading" style="background-color:rgba(23, 10, 31, 0.61);"> 
									<h2>Control Names
										<a style="margin-top: -11px; float: right;  padding-right: 23px;" type="button" href="{{ URL::action('ControlNameController@create') }}" >
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
											<th>Edit</th>
                                            <th>Delete</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($control_names as $name)
                                         <tr>
											<td>{{$name->id}}</td>
											<td>{{$name->title}}</td>
										
											
											<td><a href="{{ $url = action('ControlNameController@edit', ['id' => $name->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                            <td>
                                           {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => action('ControlNameController@destroy', ['id' => $name->id]) 
                                            ]) !!}
                                                <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-remove"></span></button>
                                            {!! Form::close() !!}
                                            
                                           </td>
										 </tr>
                                        @endforeach
										
										
									</tbody>
								</table>
							</div>
							<div class="pagination centered_align"> {{ $control_names->links() }} </div>
						</div>


@endsection
