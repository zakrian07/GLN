<!DOCTYPE HTML>
<html>
<head>
<title>Game loot Super Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="csrf-token" content="{{ csrf_token() }}">



 <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
 <!-- Bootstrap Core JavaScript -->

  <!-- Scripts -->
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="/js/Chart.js"></script>
 <!-- Bootstrap Core CSS -->
 <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <link href="assets/plugins/sweet-alert/sweet-alert.css" rel="stylesheet" type="text/css" />
    <link href="assets/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Fancy Box-->
    <link href="assets/plugins/fancy-box-2.1.5/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    
<link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="/css/font-awesome.css" rel="stylesheet"> 
<link href="/css/bootstrap.datepicker.css" rel="stylesheet"> 

<link href="/css/typehead.css" rel='stylesheet' type='text/css' />

<!-- lined-icons -->
<link rel="stylesheet" href="/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->

<!-- //chart -->
<!--animate-->
<link href="/css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="/css/overlay.css" rel="stylesheet" type="text/css" media="all">
<link href="/css/page_loader.css" rel="stylesheet" type="text/css" media="all">
<script src="/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<link href='/css/fonts2.css' rel='stylesheet' type='text/css'>

@stack('styles')

</head> 
   
 <body class="sticky-header left-side-collapsed">
    <section>
    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="{{ URL::action('DashboardController@home') }}">Game Loot <span></span></a></h1>
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
							<a href="#"><i class="lnr lnr-text-align-justify"></i>
								<span>Localization</span></a>
								<ul class="sub-menu-list">
									<li><a href="{{ URL::action('LanguageController@index') }}">Languages</a></li>
                                    <li><a href="{{ URL::action('ScreenNameController@index') }}">Screens</a></li>
                                    <li><a href="{{ URL::action('ControlNameController@index') }}">Controls</a></li>
								</ul>
						</li>
						
                        <li ><a href="{{ URL::action('RewardController@index') }}"><i class="lnr lnr-indent-increase"></i><span>Reward</span></a></li>
                        <li ><a href="{{ route('members') }}"><i class="lnr lnr-indent-increase"></i><span>Users</span></a></li>
                        <li ><a href="{{route('games')}}"><i class="lnr lnr-indent-increase"></i><span>Games</span></a></li>
                        <li ><a href="{{ route('category') }}"><i class="lnr lnr-indent-increase"></i><span>Category</span></a></li>
                        <li ><a href="{{ URL::action('MultiLanguageController@index') }}"><i class="lnr lnr-text-align-justify"></i><span>Multi Languages</span></a></li> 
					    
                    </ul>
				<!--sidebar nav end-->
			</div>
		
        </div>
		<!-- left side end-->
    
		<!-- main content start-->
		<div class="main-content game_zone" style="background-color: #8ecfd3 !important">
			<!-- header-starts -->
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
            
           <div> 

        <!--Header Start -->


		<!-- //header-ends -->
		<div id="page-wrapper" class="">
        <div class="loader"></div>
        <!-- The overlay -->
        <div id="myNav" class="overlay">
            <!-- Overlay content -->
            <div class="overlay-content">
                <img style="width:25%" src="/images/loading.gif"/>
            </div>
        </div>


        @yield('content')
        </div>
		<a id="language_id" data-lang_id= "{{ isset($language)? $language->id : ''}}" ></a>	
            <!--body wrapper start-->
			
			 <!--body wrapper end-->
		
        <!--footer section start-->
			<footer style="z-index:2;color: #c300c3;font-size: 18px;background-color: #d7e911">
			   <p><strong>Game Loot Network<strong></a></p>
			</footer>
        <!--footer section end-->

      <!-- main content end-->
   </section>
   
 <script src="/js/jquery.nicescroll.js"></script>
<script src="/js/scripts.js"></script>

 <script src="/js/overlay.js"></script>

   <script src="/js/moment.js"></script>
   <script src="/js/bootstrap-datepicker.js"></script>
   <link href="/css/toastr.min.css" rel="stylesheet">
  
    <script src="/js/toastr.min.js"></script>
    {!! Toastr::render() !!}

<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
 
    <script src="assets/magnific.min.js"></script>
 
    <!-- jquery sweet alert plugin-->
    <script type="text/javascript" src="assets/plugins/sweet-alert/sweet-alert.js"></script>
     <!-- Fancy Box -->
<script src="custom.js"></script>
    <script src="assets/plugins/fancy-box-2.1.5/jquery.fancybox.pack.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
  
    
   <script src="assets/dist/js/app.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>


<!--<script src="/js/typehead.js"></script>-->



</body>
</html>