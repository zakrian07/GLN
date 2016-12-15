<div class="header-section">
			 
			    <!--toggle button start-->
                <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
                <!--toggle button end-->

                <!--notification menu start -->
               <!--notification menu start -->
			     <div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						<ul class="nofitications-dropdown">
							
							<li class="login_box" id="loginContainer">
									<div class="search-box" >
										<div id="sb-search" class="sb-search" style="overflow:visible">
											<form class="typeahead" >
												<input class="sb-search-input search-input"  name="q" placeholder="Enter your search term..." type="search" id="search">
												<input class="sb-search-submit" value="">
												<span class="sb-icon-search"> </span>
											</form>
										</div>
									</div>
										<!-- search-scripts -->
										<script src="/js/classie.js"></script>
										<script src="/js/uisearch.js"></script>
										   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
											<script>
												new UISearch( document.getElementById( 'sb-search' ) );
											</script>
										<!-- //search-scripts -->
							</li>
									   							   		
							<div class="clearfix"></div>	
						</ul>
					</div>
					<div class="profile_details">	
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">	
                                         <!--   <span style="background:url(images/1.jpg) no-repeat center"> </span> --> 
                                            <div class="user-name" style="padding-top: 6px; padding-right: 20px">
                                                <p>{{ Auth::user()->fname }}</p>
                                            </div>
                                            <i class="lnr lnr-chevron-down"></i>
                                            <i class="lnr lnr-chevron-up"></i>
                                            <div class="clearfix"></div>	
                                        </div>	
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                        <li>
                                         <a href="{{ URL::action('User\UserController@edit', Auth::user()->id ) }}"><i class="fa fa-user"></i> Profile</a>
                                        </li> 
                                        <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                           <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        
                                        </li>
                                    </ul>
                                </li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>		
						             	
					<div class="clearfix"></div>
				</div>
			</div> <!--notification menu end -->
</div>