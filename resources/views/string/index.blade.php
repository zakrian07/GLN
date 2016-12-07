@extends('layouts.appLayout')

@section('content')
{!! Breadcrumbs::render('strings', $language) !!}
                 		<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-heading" style="background-color:rgba(23, 10, 31, 0.61);">
								
								  <div class="row">
								    <div class="col-md-3">
									<h2>Strings of {{$language->lang_name}} Language
									</div>
								
								  <div class="col-md-1 col-md-offset-7"> 
										@if($language->is_default == false)
											<a class="btn btn-primary" style="margin-top: -11px; margin-right:10px;float: right;  padding-right: 10px;" type="button" href="{{ route('languages.strings.copy', ['language' => $language])}}">
												Copy Strings
											</a>
										@endif									
									</div>
									<div class="col-md-1 "> 
										<a style="margin-top: -11px; float: right;  padding-right: 23px;" type="button" href="{{ action('StringController@create', ['language' => $language])}}">
											<img src="/images/buttons/plus.png" />
										</a>
									</div>
									
								  </div>

								
								<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
							</div>
							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>key</th>
                                            <th>status</th>
                                            <th>screen_name</th>
											<th>control_name</th>
											<th>value</th>
                                            <th>purpose</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
										</tr>
									</thead>
									<tbody id="table">
                                        @foreach($strings as $string)
                                            
                                         <tr>
											<td>{{$string->key}}</td>
											<td><span class="label label-{{$string->is_active==1? 'success': 'danger'}}">{{$string->is_active==1? 'Active': 'In Active'}}</span> </td>
                                            <td>{{$string->screen_name?$string->screen_name->title:"Not Set"}}</td>
                                            <td>{{$string->control_name?$string->control_name->title:"Not Set"}}</td>
                                            <td>{{$string->value}}</td>
                                            <td>{{$string->purpose}}</td>
											<td><a href="{{ route('languages.strings.edit', ['language' => $language,'string'=>$string])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                            <td>
                                          
                                           {!! Form::open([
                                                'method' => 'DELETE',
												
                                                'url' => action('StringController@destroy', ['language'=>$language->id,'id' => $string->id]) 
                                            ]) !!}
                                               
											<button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this String, it wil delete All associated Strings.?');"><span class="glyphicon glyphicon-remove"></span></button>
                                            {!! Form::close() !!}
                                          
                                           </td>
										 </tr>
                                        @endforeach
										
										
									</tbody>
								</table>
							</div>
							<div class="pagination centered_align"> {{ $strings->links()}} </div>
						</div>


@endsection