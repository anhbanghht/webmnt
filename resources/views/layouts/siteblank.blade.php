<!DOCTYPE html>
<html lang="en">
	<head>
		<!--=============================================== 
		Template Design By WpFreeware Team.
		Author URI : http://www.wpfreeware.com/
		====================================================-->

		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('titlepage')</title>

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="{{ URL::asset('public/default/images/logo_icon.icon') }}" />

		<!-- CSS
		================================================== -->       
		<!-- Bootstrap css file-->
		<link href="{{ URL::asset('public/default/css/bootstrap.min.css')}}" rel="stylesheet">
		<!-- Font awesome css file-->
		<link href="{{ URL::asset('public/default/css/font-awesome.min.css')}}" rel="stylesheet">
		<!-- Superslide css file-->
		<link rel="stylesheet" href="{{ URL::asset('public/default/css/superslides.css')}}">
		<!-- Slick slider css file -->
		<link href="{{ URL::asset('public/default/css/slick.css')}}" rel="stylesheet"> 
		<!-- Circle counter cdn css file -->
		<link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>  
		<!-- smooth animate css file -->
		<link rel="stylesheet" href="{{ URL::asset('public/default/css/animate.css')}}"> 
		<!-- preloader -->
		<link rel="stylesheet" href="{{ URL::asset('public/default/css/queryLoader.css')}}" type="text/css" />
		<!-- gallery slider css -->
		<link type="text/css" media="all" rel="stylesheet" href="{{ URL::asset('public/default/css/jquery.tosrus.all.css')}}" />    
		<!-- Default Theme css file -->
		<link id="switcher" href="{{ URL::asset('public/default/css/themes/default-theme.css')}}" rel="stylesheet">
		<!-- Main structure css file -->
		<link href="{{ URL::asset('public/default/css/style.css')}}" rel="stylesheet">
	   
		<!-- Google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
		<link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!--edit duong-->
		@yield('addtional-css')
		<!--end duong-->
		
	</head>
	<body>          
        @yield('before-body')
        @yield('slide-body')
        @yield('body')
        @yield('after-body')

		<!-- Javascript Files
		================================================== -->

		<!-- initialize jQuery Library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Preloader js file -->
		<script src="{{ URL::asset('public/default/js/queryloader2.min.js')}}" type="text/javascript"></script>
		<!-- For smooth animatin  -->
		<script src="{{ URL::asset('public/default/js/wow.min.js')}}"></script>  
		<!-- Bootstrap js -->
		<script src="{{ URL::asset('public/default/js/bootstrap.min.js')}}"></script>
		<!-- slick slider -->
		<script src="{{ URL::asset('public/default/js/slick.min.js')}}"></script>
		<!-- superslides slider -->
		<script src="{{ URL::asset('public/default/js/jquery.easing.1.3.js')}}"></script>
		<script src="{{ URL::asset('public/default/js/jquery.animate-enhanced.min.js')}}"></script>
		<script src="{{ URL::asset('public/default/js/jquery.superslides.min.js')}}" type="text/javascript" charset="utf-8"></script>   
		<!-- for circle counter -->
		<script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
		<!-- Gallery slider -->
		<script type="text/javascript" language="javascript" src="{{ URL::asset('public/default/js/jquery.tosrus.min.all.js')}}"></script>   
	   
		<!-- Custom js-->
		<script src="{{ URL::asset('public/default/js/custom.js')}}"></script>
		<!--=============================================== 
		Template Design By WpFreeware Team.
		Author URI : http://www.wpfreeware.com/
		====================================================-->
		<script>
			var message = {token: "<?php echo csrf_token();?>"}; 
		</script>
		@yield('addtional-js')
		<!-- END JAVASCRIPT -->

	</body>
</html>
