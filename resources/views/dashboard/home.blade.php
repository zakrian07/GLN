@extends('layouts.appLayout')

@section('content')

				<div class="graphs">
					<div class="col_3">
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-mail-forward"></i>
								<div class="stats">
								  <h5>{{ $allScreen }}</h5>
								  <div class="grow">
									<p>Screens</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-users"></i>
								<div class="stats">
								  <h5>{{ $allmem }}</h5>
								  <div class="grow grow1">
									<p>Users</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3 widget widget1">
							<div class="r3_counter_box">
								<i class="fa fa-eye"></i>
								<div class="stats">
								  <h5>{{ $allgame }}</h5>
								  <div class="grow grow3">
									<p>Games</p>
								  </div>
								</div>
							</div>
						 </div>
						 <div class="col-md-3 widget">
							<div class="r3_counter_box">
								<i class="fa fa-usd"></i>
								<div class="stats">
								  <h5>{{ $allcat }}</h5>
								  <div class="grow grow2">
									<p>Categoies</p>
								  </div>
								</div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

			<!-- switches -->
		<div class="switches">
			<div class="col-4">
				<div class="col-md-4 switch-right">
					<div class="switch-right-grid">
						<div class="switch-right-grid1">
							<h3>TODAY'S STATS</h3>
							
							<ul>
								<li>Members: {{ $membersToday }}</li>
								<li>Games: {{ $gamesToday }}</li>
								
							</ul>
						</div>
					</div>
					<div class="sparkline">
						<canvas id="line" height="150" width="480" style="width: 480px; height: 150px;"></canvas>
							<script>
									var lineChartData = {
										labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Mon"],
										datasets : [
											{
												fillColor : "#fff",
												strokeColor : "#F44336",
												pointColor : "#fbfbfb",
												pointStrokeColor : "#F44336",
												data : [20,35,45,30,10,65,40]
											}
										]
										
									};
									new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
							</script>
					</div>
				</div>
				<div class="col-md-4 switch-right">
					<div class="switch-right-grid">
						<div class="switch-right-grid1">
							<h3>WEEKLY STATS</h3>
					
							<ul>
								<li>Members: {{ $weeklyMembers }}</li>
								<li>Games: {{ $weeklyGames }}</li>
							</ul>
						</div>
					</div>
					<div class="sparkline">
						<canvas id="bar" height="150" width="480" style="width: 480px; height: 150px;"></canvas>
							<script>
								var barChartData = {
									labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Mon","Tue","Wed","Thu"],
									datasets : [
										{
											fillColor : "#8BC34A",
											strokeColor : "#8BC34A",
											data : [25,40,50,65,55,30,20,10,6,4]
										},
										{
											fillColor : "#8BC34A",
											strokeColor : "#8BC34A",
											data : [30,45,55,70,40,25,15,8,5,2]
										}
									]
									
								};
									new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
							</script>
					</div>
				</div>
				<div class="col-md-4 switch-right">
					<div class="switch-right-grid">
						<div class="switch-right-grid1">
							<h3>MONTHLY STATS</h3>
						
							<ul>
								<li>Members: {{ $monthlyMembers }}</li>
								<li>Games: {{ $monthlyGames }}</li>
							</ul>
						</div>
					</div>
					<div class="sparkline">
						<!--graph-->
						<link rel="stylesheet" href="css/graph.css">
						<script src="js/jquery.flot.min.js"></script>
					<!--//graph-->
							<script>
								$(document).ready(function () {
								
									// Graph Data ##############################################
									var graphData = [{
											// Returning Visits
											data: [ [4, 4500], [5,3500], [6, 6550], [7, 7600],[8, 4500], [9,3500], [10, 6550], ],
											color: '#FFCA28',
											points: { radius: 7, fillColor: '#fff' }
										}
									];
								
									// Lines Graph #############################################
									$.plot($('#graph-lines'), graphData, {
										series: {
											points: {
												show: true,
												radius: 1
											},
											lines: {
												show: true
											},
											shadowSize: 0
										},
										grid: {
											color: '#fff',
											borderColor: 'transparent',
											borderWidth: 10,
											hoverable: true
										},
										xaxis: {
											tickColor: 'transparent',
											tickDecimals: false
										},
										yaxis: {
											tickSize: 1200
										}
									});
								
									// Graph Toggle ############################################
									$('#graph-bars').hide();
								
									$('#lines').on('click', function (e) {
										$('#bars').removeClass('active');
										$('#graph-bars').fadeOut();
										$(this).addClass('active');
										$('#graph-lines').fadeIn();
										e.preventDefault();
									});
								
									$('#bars').on('click', function (e) {
										$('#lines').removeClass('active');
										$('#graph-lines').fadeOut();
										$(this).addClass('active');
										$('#graph-bars').fadeIn().removeClass('hidden');
										e.preventDefault();
									});
								
								});
							</script>
							<div id="graph-wrapper">
								<div class="graph-container">
									<div id="graph-lines"> </div>
									<div id="graph-bars"> </div>
								</div>
							</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //switches -->
		<div class="col_1">
			<div class="col-md-4 span_8">
				<div class="activity_box">
					<h3>Latest Users</h3>
					<div class="scrollbar scrollbar1" id="style-2">
						@foreach($members as $member)
						<div class="activity-row">
						
							<div class="col-xs-9 activity-desc">
								<h5><a href="#">{{ $member->first_name }} {{ $member->last_name }}</a></h5>
								<p>{{ $member->user_name }} : {{ $member->email }}</p>
							</div>
							<div class="col-xs-3 activity-img"><span>{{ $member->created_date }}</span></div>
							<div class="clearfix"> </div>
						</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-md-4 span_8">
				<div class="activity_box activity_box1">
					<h3>Latest Games</h3>
					<div class="scrollbar" id="style-2">
						@foreach($games as $game)
						<div class="activity-row">
						
							<div class="col-xs-3 activity-img"><img src="{{ URL::asset('/images/game_banners').'/'. $game->game_image }}" class="img-responsive" alt=""/></div>
							<div class="col-xs-9 activity-desc">
								<h5><a href="#">{{ $game->name }}</a></h5>
								<a href="{{ $game->download_link }}">{{ $game->download_link }}</a>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						@endforeach
					</div>
					
				</div>
			</div>

			<div class="col-md-4 span_8">
				<div class="activity_box activity_box2">
					<h3>Categories</h3>
					<div class="scrollbar" id="style-2">
					@foreach($categories as $category)
						<div class="activity-row activity-row1">
							<div class="single-bottom">
								<ul>
									<li>
										
										<span class=" activity-img">
											<img style="float:left" height="50" width="50" src="{{ URL::asset('/images/category_image').'/'. $category->category_image }}" class="img-responsive" alt=""/>
											<p class="">{{ $category->category }}</p>
										</span> 
										
									</li>

								</ul>
							</div>
						</div>
						@endforeach
					</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			
		</div>
		</div>

@stop
