<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GamelootNetwork Super Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="/css/fonts.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/form-elements.css">
        <link rel="stylesheet" href="css/login_style.css">
        <link href="/css/page_loader.css" rel="stylesheet" type="text/css" media="all">

    <!-- CSRF Token -->
    

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

 <body>

        <!-- Top content -->
        <div class="top-content">
         <div class="loader"></div>
        	 @yield('content')
         </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Copyright 2016 <strong>Game Loot Network.</strong> All rights reserved. </p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/login_scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        })
        </script>
    </body>
</html>
