<!DOCTYPE HTML>
<html>
<head>
<title>Game Loot Network Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gamelootnetwork" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="csrf-token" content="{{ csrf_token() }}">
 
<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>


    <script type="application/x-javascript"> 
    	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
    	function hideURLbar(){ window.scrollTo(0,1); } 
    </script>

<link href="{{ URL::asset('/css/page_loader.css') }}" rel="stylesheet" type="text/css" media="all">
 <!-- Bootstrap Core CSS -->
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="{{ URL::asset('css/icon-font.min.css') }}" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="{{ URL::asset('js/Chart.js') }}"></script>
<!-- //chart -->
<!--animate-->
<link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="{{ URL::asset('js/wow.min.js') }}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="{{ URL::asset('js/jquery-1.10.2.min.js') }}"></script>
<!-- Placed js at the end of the document so the pages load faster -->
@stack('royalslider')
</head> 