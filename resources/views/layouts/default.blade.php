@extends('layouts.blank')

@section('body')
<!-- BEGIN HEADER-->
	<header id="header" >
		<div class="headerbar">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="headerbar-left">
				<ul class="header-nav header-nav-options">
					<li class="header-nav-brand" >
						<div class="brand-holder">
							<a href="{{ route('dashboard') }}">
								<span class="text-lg text-bold text-primary">Mạng Máy Tính</span>
							</a>
						</div>
					</li>
					<li>
						<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</li>
					@yield('add_links')
				</ul>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="headerbar-right">
				@if( Auth::user()->has_permission('chat::send'))
				<ul class="header-nav header-nav-options">
					<li class="dropdown hidden-xs">
						<a class="btn btn-icon-toggle btn-default" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false" id="chat-on-menu">
							<i class="fa fa-comments"></i><sup class="badge style-danger" id="count-messages"></sup>
						</a>
					</li><!--end .dropdown -->
				</ul>
				@endif
				<ul class="header-nav header-nav-profile">
					<?php if(Auth::user()):?>
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="{{ url(Auth::user()->teacher->avatar) }}" alt="" />
								<span class="profile-info">
								{{ (Auth::user()->name!='')? Auth::user()->name : Auth::user()->email }}
									<small><?php echo Helps::getGroupUser(Auth::user()->group)->name;?></small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li><a href="{{ route('users:view_user',Auth::user()->id) }}">Cá Nhân</a></li>
								<li><a href="{{ route('users:changepass') }}">Đổi mật khẩu</a></li>
								<li><a href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off text-danger"></i> Đăng xuất</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					<?php else: ?>
						<li>
							<a href="{{ route('login') }}">Đăng nhập</a>
						</li><!--end .dropdown -->
					<?php endif; ?>
				</ul><!--end .header-nav-profile -->
			</div><!--end #header-navbar-collapse -->
		</div>
	</header>
	<!-- END HEADER-->

	<!-- BEGIN BASE-->
	<div id="base">

		<!-- BEGIN OFFCANVAS LEFT -->
		<div class="offcanvas">
		</div><!--end .offcanvas-->
		<!-- END OFFCANVAS LEFT -->

		<!-- BEGIN CONTENT-->
		<div id="content">
                @yield('content')
		</div><!--end #content-->
		<!-- END CONTENT -->

		<!-- BEGIN MENUBAR-->
		<div id="menubar" class="menubar-inverse ">
			<div class="menubar-fixed-panel">
				<div>
					<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
						<i class="fa fa-bars"></i>
					</a>
				</div>
				<div class="expanded">
					<a href="{{ route('dashboard') }}">
						<span class="text-lg text-bold text-primary ">Mạng máy tính</span>
					</a>
				</div>
			</div>
			<div class="menubar-scroll-panel">
				<!-- BEGIN MAIN MENU -->
				<ul id="main-menu" class="gui-controls">
					<!-- BEGIN DASHBOARD -->
					<li class="expanding">
						<a href="javascript:void(0)">
							<div class="gui-icon"><i class="md md-home"></i></div>
							<span class="title">Bảng kiểm soát</span>
						</a>
						<!--start submenu -->
						<ul>
							<li><a href="{{ route('dashboard') }}" @yield('active_dashboard_calendar')><span class="title">Lịch</span></a></li>
						</ul><!--end /submenu -->
					</li><!--end /menu-li -->
					<!-- END DASHBOARD -->
					
					<!-- chung -->
					<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-folder-open-o"></i></div>
								<span class="title">Thành phần chung</span>
							</a>
							<!--start submenu -->
							<ul>
								@if( \Auth::user()->has_permission( 'year::' ) )
								<li><a href="{{route('year::')}}" @if( \Request::route()->getName() == 'year::' ) class="active" @endif><span class="title">Quản lý thông tin thực tập trong năm học</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'teacher::' ) )
								<li><a href="{{route('teacher::')}}" @if( \Request::route()->getName() == 'teacher::' ) class="active" @endif><span class="title">Quản lý giáo viên</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'courses::' ) )
								<li><a href="{{route('courses::')}}" @if( \Request::route()->getName() == 'courses::' ) class="active" @endif><span class="title">Quản lý khóa học</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'student::' ) )
								<li><a href="{{route('student::')}}" @if( \Request::route()->getName() == 'student::' ) class="active" @endif><span class="title">Quản lý sinh viên</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'intership_type::' ) )
								<li><a href="{{route('intership_type::')}}" @if( \Request::route()->getName() == 'intership_type::' ) class="active" @endif><span class="title">Quản lý loại thực tập</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'users:groups:' ) )
								<li><a href="{{route('users:groups:')}}" @if( \Request::route()->getName() == 'users:groups:' ) class="active" @endif><span class="title">Quản lý nhóm người dùng</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'users:' ) )
								<li><a href="{{route('users:')}}" @if( \Request::route()->getName() == 'users:' ) class="active" @endif><span class="title">Quản lý người dùng</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'modules:' ) )
								<li><a href="{{route('modules:')}}" @if( \Request::route()->getName() == 'modules:' ) class="active" @endif><span class="title">Quản lý quyền truy cập</span></a></li>
								@endif
								@if( \Auth::user()->has_permission( 'department::' ) )
								<li><a href="{{route('department::')}}" @if( \Request::route()->getName() == 'department::' ) class="active" @endif><span class="title">Quản lý thông tin bộ môn</span></a></li>
								@endif
							
							</ul><!--end /submenu -->
						</li>
					
					<!-- Begin View Admin site Dương -->
					<li class="gui-folder">
						<a>
							<div class="gui-icon"><i class="md md-email"></i></div>
							<span class="title">Quản lý phản hồi</span>
						</a>
						<!--start submenu -->
						<ul style="display: none;">
							<li class="expanded"><a href="{{route('site::inbox')}}" @yield('active_Inbox')><span class="title">Danh sách phản hồi</span></a></li>
						</ul><!--end /submenu -->
					</li>
					<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-computer"></i></div>
								<span class="title">Quản lý site</span>
							</a>
							<!--start submenu -->
							<ul style="display: none;">
								<li class="gui-folder">
									<a href="javascript:void(0);" @yield('active_category')>
										<span class="title">Quản lý thể loại</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="{{route('site::listcategory')}}" @yield('active_category_list')><span class="title">Danh sách thể loại</span></a></li>
										<li><a href="{{route('site::getaddcategory')}}" @yield('active_category_add')><span class="title">Thêm mới thể loại</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li class="gui-folder">
									<a href="javascript:void(0);" @yield('active_notes')>
										<span class="title">Quản lý thông báo</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="{{route('site::listnotes')}}" @yield('active_notes_list')><span class="title">Danh sách thông báo</span></a></li>
										<li><a href="{{route('site::getaddnotes')}}" @yield('active_notes_add')><span class="title">Thêm mới thông báo</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li class="gui-folder">
									<a href="javascript:void(0);" @yield('active_article')>
										<span class="title">Quản lý bài viết</span>
									</a>
									<!--start submenu -->
									<ul>
										<li><a href="{{route('site::listarticle')}}" @yield('active_article_list')><span class="title">Danh sách bài viết</span></a></li>
										<li><a href="{{route('site::getaddarticle')}}" @yield('active_article_add')><span class="title">Thêm bài viết</span></a></li>
									</ul><!--end /submenu -->
								</li><!--end /menu-li -->
								<li class="gui-folder">
									<a href="{{route('site::geteditintroduce',1)}}" @yield('active_introduce')>
										<span class="title">Quản lý giới thiệu</span>
									</a>
								</li><!--end /menu-li -->
							</ul><!--end /submenu -->
						</li>
<!-- End View Admin site Dương-->
<!-- Duong -->					
					<!-- BEGIN UI -->
					<li class="gui-folder">
						<a>
							<div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
							<span class="title">Quản lý nhiệm vụ</span>
						</a>
						<!--start submenu -->
						<ul>
							<li><a href="{{route('assign::sendfile')}}" @yield('active_insert_file')><span class="title">Quản lý thêm dữ liệu</span></a></li>
							<li><a href="{{route('assign::listfile')}}" @yield('active_list_file')><span class="title">Danh sách file dữ liệu</span></a></li>
							<li><a href="{{route('assign::listwork')}}" @yield('active_work')><span class="title">Quản lý công việc</span></a></li>
							<li><a href="{{route('assign::listassignall')}}" @yield('active_task_all')><span class="title">Danh sách nhiệm vụ</span></a></li>
							<li><a href="{{route('assign::showcalendar')}}" @yield('active_assign_calendar')><span class="title">Lịch</span></a></li>
						</ul><!--end /submenu -->
					</li><!--end /menu-li -->
<!-- Huyen -->					
					<!-- BEGIN UI -->
					<li class="gui-folder">
						<a>
							<div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
							<span class="title">Quản lý đào tạo</span>
						</a>
						<!--start submenu -->
						<ul>
							<li><a href="{{route('managerfile::')}}" ><span class="title">Nhập dữ liệu</span></a></li>
							<li><a href="{{route('program1::')}}" ><span class="title">Chương trình đào tạo</span></a></li>
							<li><a href="{{route('program::')}}" ><span class="title">Danh sách môn học</span></a></li>
							<li><a href="{{route('division::')}}" ><span class="title">Phân công giảng dạy</span></a></li>
							<li><a href="{{route('responsible::')}}" ><span class="title">Phân công phụ trách môn</span></a></li>
							<li><a href="{{route('record::')}}" ><span class="title">Hồ sơ giảng dạy</span></a></li>
							<li><a href="{{route('schedule::')}}" ><span class="title">Thời khóa biểu</span></a></li>
						</ul><!--end /submenu -->

<!-- Tuoi -->					
					<!-- BEGIN UI -->
					<li class="gui-folder">
						<a>
							<div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
							<span class="title">Module thực tập</span>
						</a>
						<ul>
							<li class="gui-folder">
								<a>
									<span class="title">Quản lý thực tập</span>
								</a>
								<!--start submenu -->
								<ul>
									@if( \Auth::user()->has_permission( 'plan::' ) )
									<li><a href="{{route('plan::')}}" @if( \Request::route()->getName() == 'plan::' ) class="active" @endif><span class="title">Quản lý kế hoạch</span></a></li>
									@endif
									@if( \Auth::user()->has_permission( 'job::' ) )
									<li><a href="{{route('job::')}}" ><span class="title" @if( \Request::route()->getName() == 'job::' ) class="active" @endif>Quản lý công việc</span></a></li>
									@endif
									@if( \Auth::user()->has_permission( 'intership_time::' ) )
									<li><a href="{{route('intership_time::')}}" ><span class="title" @if( \Request::route()->getName() == 'intership_time::' ) class="active" @endif>Quản lý đợt thực tập</span></a></li>
									@endif
								</ul><!--end /submenu -->
							</li><!--end /menu-li -->
							<li class="gui-folder">
								<a>
									<span class="title">Quản lý hội đồng</span>
								</a>
								<!--start submenu -->
								<ul>
									@if( \Auth::user()->has_permission( 'council_group::' ) )
									<li><a href="{{route('council_group::')}}" @if( \Request::route()->getName() == 'council_group::' ) class="active" @endif><span class="title">Quản lý thông tin nhóm hội đồng</span></a></li>
									@endif
									@if( \Auth::user()->has_permission( 'council::' ) )
									<li><a href="{{route('council::')}}" @if( \Request::route()->getName() == 'council::' ) class="active" @endif><span class="title">Quản lý thông tin hội đồng</span></a></li>
									@endif
								</ul><!--end /submenu -->
							</li><!--end /menu-li -->
							@if( \Auth::user()->has_permission( 'company::' ) )
							<li><a href="{{route('company::')}}" @if( \Request::route()->getName() == 'company::' ) class="active" @endif><span class="title">Quản lý thông tin cơ sở thực tập</span></a></li>
							@endif
							
						</ul>
					</li><!--end /menu-li -->
					
				</ul><!--end .main-menu -->
				<!-- END MAIN MENU -->

				<div class="menubar-foot-panel">
					<small class="no-linebreak hidden-folded">
						<span class="opacity-75">Copyright &copy; 2016</span> 
					</small>
				</div>
			</div><!--end .menubar-scroll-panel-->
		</div><!--end #menubar-->
		<!-- END MENUBAR -->

		<!-- BEGIN OFFCANVAS RIGHT -->
		<div class="offcanvas">

			<!-- BEGIN OFFCANVAS CHAT -->
			<div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
				<div class="offcanvas-head style-default-bright">
					<header class="text-primary">Chat</header>
					<div class="offcanvas-tools">
						<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
							<i class="md md-close"></i>
						</a>
					</div>
					<form class="form">
						<div class="form-group floating-label">
							<textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize" rows="1"></textarea>
							<label for="sidebarChatMessage">Nhấn Enter để gửi</label>
						</div>
					</form>
				</div>
				<div class="offcanvas-body">
					<ul class="list-chats">
					</ul>
				</div><!--end .offcanvas-body -->
			</div><!--end .offcanvas-pane -->
			<!-- END OFFCANVAS CHAT -->

		</div><!--end .offcanvas-->
		<!-- END OFFCANVAS RIGHT -->

	</div><!--end #base-->
	<!-- END BASE -->
@stop
