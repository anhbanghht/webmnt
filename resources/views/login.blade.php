@extends('layouts.blank')
@section('body')
<!-- BEGIN LOGIN SECTION -->
<div class="" style="background-image: url('{{asset('public/assets/img/login1.jpg')}}'); background-position:top left; height:275px">
	<div class="cover-text" style="padding-top: 85px; padding-left: 25px;">
		<span class="text-primary-dark text-xl">Khoa công nghệ thông tin</span>
		<h1 class="text-xxl text-bold text-primary-dark" style="margin-top:5px">BỘ MÔN TRUYỀN THÔNG VÀ MẠNG MÁY TÍNH </h1>
	</div>
</div>
<section class="section-account" style="">
	<div class="card contain-sm style-transparent" style="margin-bottom:0px;">
		<div class="card-body" style="">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<form class="form floating-label" action="" accept-charset="utf-8" method="post">
						{{ csrf_field() }}
						@if( session()->has('errors') )
	                    <div class="form-group has-error">
	                        <div class="col-xs-12 text-center">
	                            <span class="help-block">{{session()->get('errors')}}</span>
	                        </div>
	                    </div>
	                     @endif
						<div class="form-group">
							<input type="text" class="form-control" id="username" required name="username">
							<label for="username">Tên đăng Nhập</label>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" required name="password">
							<label for="password">Mật khẩu</label>
							<!--p class="help-block"><a href="javascript:void(0)">Quên mật khẩu?</a></p-->
						</div>
						<br/>
						<div class="row">
							<div class="col-xs-6 text-left">
								<div class="checkbox checkbox-inline checkbox-styled">
									<label>
										<input type="checkbox"> <span>Ghi nhớ đăng nhập</span>
									</label>
								</div>
							</div><!--end .col -->
							<div class="col-xs-6 text-right">
								<button class="btn btn-primary btn-raised" type="submit">Đăng nhập</button>
							</div><!--end .col -->
						</div><!--end .row -->
					</form>
				</div><!--end .col -->
			</div><!--end .card -->
		</section>
		<!-- END LOGIN SECTION -->
@stop