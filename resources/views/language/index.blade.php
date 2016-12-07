@extends('layouts.appLayout')

@section('content')
	{!! Breadcrumbs::render('languages') !!}
                   

						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class=" panel-heading" style="background-color:rgba(23, 10, 31, 0.61);"> 
									<h2>Languagues
										<a style="margin-top: -11px; float: right;  padding-right: 23px;" type="button" href="{{ URL::action('LanguageController@_new') }}" >
											<img src="/images/buttons/plus.png" />
										</a>
									</h2>
							</div>
						
							
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
										
											<th>Name</th>
											<th>Code</th>
											<th>Status</th>
											<th>Strings</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($languages as $lang)
                                            
                                         <tr style="{{$lang->is_default? 'background-color: rgba(215, 215, 215, 0.66)' : null }}">
											
											<td>{{$lang->lang_name}}</td>
											<td>{{$lang->lang_code}}</td>
											<td><span class="label label-{{$lang->is_active==1? 'success': 'danger'}}">{{$lang->is_active==1? 'Active': 'In Active'}}</span> </td>
                                           <td >
										    <a href = "{{URL::route('languages.strings.index', ['language'=>$lang]) }}" class="btn btn-primary btn-sm">
											 Strings
											</a>
										    </td>
											
											<td><a href="{{ $url = action('LanguageController@edit', ['id' => $lang->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                            <td>
                                           {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => action('LanguageController@delete', ['id' => $lang->id]) 
                                            ]) !!}
                                                <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-remove"></span></button>
                                            {!! Form::close() !!}
                                            
                                           </td>
										 </tr>
                                        @endforeach
										
										
									</tbody>
								</table>
								
							</div>
							<div class="pagination centered_align"> {{ $languages->links() }} </div>
						</div>


@endsection
