<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bộ môn Truyền thông & Mạng máy tính</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/bootstrap.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/materialadmin.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/font-awesome.min.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/material-design-iconic-font.min.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css')}}" />
		
		<!--edit duong-->
		@yield('addtional-css')
		<!--end duong-->


		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="{{asset('public/assets/js/libs/utils/html5shiv.js')}}')}}"></script>
		<script type="text/javascript" src="{{asset('public/assets/js/libs/utils/respond.min.js')}}')}}"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed">
        
        @yield('before-body')
        @yield('body')
        @yield('after-body')

		<!-- BEGIN JAVASCRIPT -->
		<script src="{{asset('public/assets/js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
		<script src="{{asset('public/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
		<script src="{{asset('public/assets/js/libs/jquery-ui/jquery-ui.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/bootstrap/bootstrap.min.js') }}"></script>
		<script src="{{asset('public/assets/js/libs/spin.js/spin.min.js') }}"></script>
		<script src="{{asset('public/assets/js/libs/autosize/jquery.autosize.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('public/assets/js/moment.js')}}"></script>
		
		<!--edit duong-->
		@yield('addtional-js-lib')
		<!--end duong-->
		
		<script src="{{asset('public/assets/js/core/source/App.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppNavigation.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppOffcanvas.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppCard.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppForm.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppNavSearch.js')}}"></script>
		<script src="{{asset('public/assets/js/core/source/AppVendor.js')}}"></script>
		@if( \Auth::user() && \Auth::user()->has_permission('chat::get') )
		<script>
			(function($){
				var datatime = '';
				var badge = 0;
				var paged = 1;
				$.ajax({
					url:'{{route("chat::get")}}',
					data: 'page='+paged,
					method: 'GET'
				}).done(function(response){
					if( response.data.length > 0 ){
						$(response.data).each(function(key,item){
							if( key == 0 )
								datatime = moment(item.created_at,'YYYY-MM-DD HH:mm:ss');
							html ='';
							if( item.group_id != {{\Auth::user()->group}} )
								html += '<li class="chat-left">';
							else
								html += '<li>';
							html += '	<div class="chat">';
							html += '		<div class="chat-avatar"></div>';
							html += '		<div class="chat-body">';
							html += '			'+item.content;
							html += '			<small>'+moment(item.created_at,'YYYY-MM-DD HH:mm:ss').format('HH:mm')+'</small>';
							html += '		</div>';
							html += '	</div><!--end .chat -->';
							html += '</li>';
							// Add to chat list
							$('.list-chats').append(html);
						});
						// Refresh for correct scroller size
						$('.offcanvas').trigger('refresh');
					}
				});
				//When enter key
				$('#sidebarChatMessage').keydown(function (e) {
					var input = $(e.currentTarget);
					if (e.keyCode === 13) {
						e.preventDefault();
						
						// Get chat message
						var Time = moment().format('YYYY-MM-DD HH:mm:ss');
						var demoTime = moment(Time,'YYYY-MM-DD HH:mm:ss').format('HH:mm:ss')
						
						var text = input.val();
						if(text != '')
						$.ajax({
							url:"{{route('chat::send')}}",
							method: "POST",
							data: 'text='+text+'&time+='+Time+'&_token={{csrf_token()}}',
						}).done(function(response){
							// Create html
							var html = '';
							html += '<li>';
							html += '	<div class="chat">';
							html += '		<div class="chat-avatar"></div>';
							html += '		<div class="chat-body">';
							html += '			' + text;
							html += '			<small>' + demoTime + '</small>';
							html += '		</div>';
							html += '	</div>';
							html += '</li>';
							var $new = $(html).hide();

							datatime = Time;
							// Add to chat list
							$('.list-chats').prepend($new);
							
							// Animate new inserts
							$new.show('fast');
							
							// Reset chat input
							input.val('').trigger('autosize.resize');
							
							// Refresh for correct scroller size
							$('.offcanvas').trigger('refresh');
						});
					}
				});
				//Update
				setInterval(function(){
					$.ajax({
						url:"{{route('chat::check')}}",
						method: "POST",
						data: 'time='+moment(datatime).format('YYYY-MM-DD HH:mm:ss')+'&_token={{csrf_token()}}&group={{\Auth::user()->group}}',
					}).done(function(response){
						if( response.length > 0 ){
							badge += response.length;
							$('#count-messages').html(badge);
							$(response).each(function(key,item){
								// Create html
								var html = '';
								html += '<li class="chat-left">';
								html += '	<div class="chat">';
								html += '		<div class="chat-avatar"></div>';
								html += '		<div class="chat-body">';
								html += '			' + item.content;
								html += '			<small>'+moment(item.created_at,'YYYY-MM-DD HH:mm:ss').format('HH:mm')+'</small>';
								html += '		</div>';
								html += '	</div>';
								html += '</li>';
								var $new = $(html).hide();

								datatime = moment(item.created_at,'YYYY-MM-DD HH:mm:ss');
								// Add to chat list
								$('.list-chats').prepend($new);
								
								// Animate new inserts
								$new.show('fast');
								
								// Refresh for correct scroller size
								$('.offcanvas').trigger('refresh');
							});
						}
					});
				}, 3000);
				//Chat on menu
				$('#chat-on-menu').click(function(e){
					badge = '';
					$('#count-messages').html(badge);
				});
			})(jQuery);
		</script>
		@endif
		@yield('addtional-js')
		<!-- END JAVASCRIPT -->
		<script type="text/javascript">
			var base_url="<?php echo url(''); ?>";
		</script>

	</body>
</html>
