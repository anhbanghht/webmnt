<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Material Admin</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">

		<!-- BEGIN STYLESHEETS -->
		<!--link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/-->
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/bootstrap.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/materialadmin.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/font-awesome.min.css')}}" /> <!--Font Awesome Icon Font-->
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/material-design-iconic-font.min.css')}}" /> <!--Material Design Iconic Font-->
	<!--Edit by Nguyen Duc Duong-->
		<!--link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/-->
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/toastr/toastr.css?1425466569') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/select2/select2.css?1424887856') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/multi-select/multi-select.css?1424887857') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('/public/assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864') }}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/style-duong.css')}}" />
	<!--End Edit-->
		<!-- Additional CSS includes -->
		@yield('addtinal-css')
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="{{asset('public/assets/js/libs/utils/html5shiv.js')}}"></script>
		<script type="text/javascript" src="{{asset('public/assets/js/libs/utils/respond.min.js')}}"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed menubar-first menubar-visible">
		@yield('before-body')
		@yield('body')
		@yield('after-body')

		<!-- BEGIN JAVASCRIPT -->
		<script src="{{asset('public/assets/js/libs/jquery/jquery-1.11.2.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/bootstrap/bootstrap.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
		@yield('addtional-jslib')
		
		<!-- Put App.js last in your javascript imports -->
		
		{{--test--}}
		<script src="{{asset('public/assets/js/core/source/App.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppNavigation.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppOffcanvas.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppCard.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppForm.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppNavSearch.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppVendor.js')}}"></script>
	<!--Edit by Nguyen Duc Duong-->	
		<script src="{{ asset('/public/assets/js/libs/jquery-ui/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/spin.js/spin.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/autosize/jquery.autosize.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/select2/select2.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/multi-select/jquery.multi-select.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/moment/moment.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/dropzone/dropzone.min.js') }}"></script>
		<script src="{{ asset('/public/assets/js/libs/toastr/toastr.js') }}"></script>
		
		<script src="{{asset('public/assets/js/core/demo/Demo.js')}}"></script>
		<!--script src="{{asset('public/assets/js/core/demo/DemoLayouts.js')}}"></script-->
		<script src="{{asset('public/assets/js/jquery-duong.js')}}"></script>
		<script>
			var message = {token: "<input type='hidden' name='_token' value='<?php echo csrf_token();?>'>"}; 
		</script>
	<!--End Edit-->
		@yield('addtional-custom-js')
	</body>
</html>