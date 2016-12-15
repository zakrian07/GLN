<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="{{ URL::action('DashboardController@home') }}">Easy <span>Admin</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="{{ URL::action('DashboardController@home') }}"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li ><a href="{{ URL::action('DashboardController@home') }}"><i class="lnr lnr-power-switch"></i><span>Dashboard</span></a></li>
					    <li class="menu-list">
							<a href="#"><i class="glyphicon glyphicon-map-marker"></i>
								<span>Localization</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ URL::action('LanguageController@index') }}">Languages</a></li>
                                    <li><a href="{{ URL::action('ScreenNameController@index') }}">Screens</a></li>
                                    <li><a href="{{ URL::action('ControlNameController@index') }}">Controls</a></li>
								</ul>
						</li>
						
                        <li ><a href="{{ URL::action('RewardController@index') }}"><i class="lnr lnr-indent-increase"></i><span>Reward</span></a></li>
                        <li ><a href="{{ route('members') }}"><i class="glyphicon glyphicon-user"></i><span>Users</span></a></li>
                        <li ><a href="{{route('games')}}"><i class="glyphicon glyphicon-sound-stereo"></i><span>Games</span></a></li>
                        <li ><a href="{{ route('category') }}"><i class="glyphicon glyphicon-list-alt"></i><span>Category</span></a></li>
                        <li ><a href="{{ URL::action('MultiLanguageController@index') }}"><i class="glyphicon glyphicon-info-sign"></i><span>Multi Languages</span></a></li> 
					    
                    </ul>
				<!--sidebar nav end-->
			</div>
		</div>