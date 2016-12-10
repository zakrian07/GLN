
     @include('layouts/header')
 
 <body class="sticky-header left-side-collapsed">
    <section>
        @include('layouts/left_menu')
        <div class="main-content game_zone" style="background-color: #8ecfd3 !important">
            <!-- header-starts -->
            @include("layouts/header_menu")
        <!-- //header-ends -->
        

		<!-- //header-ends -->
		<div id="page-wrapper" class="">
         
            @yield('content')
           <!-- <div class="loader">
                
            </div>-->
                <!-- The overlay--> 
             <div id="myNav" class="overlay">
                <!-- Overlay content 
                <div class="overlay-content">
                    <img style="width:25%" src="/images/loading.gif"/>
                </div>-->
            </div>
             
        </div>
		<a id="language_id" data-lang_id= "{{ isset($language)? $language->id : ''}}" ></a>	
            <!--body wrapper start-->
			
			 <!--body wrapper end-->
		
 @include("layouts/footer")