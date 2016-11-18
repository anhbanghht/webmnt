@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin người dùng</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'users:add' ) )
            				        <a href="{{route('users:add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm người dùng"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<label for=""><strong>Tài khoản:</strong></label>
	        						<p>{{$data->username}}</p>
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Tên hiển thị:</strong></label>
    								<p>{{$data->name}}</p>	
        						</div>
        						<div class="col-sm-6">
    								<label for="active"><strong>Tên giáo viên: </strong></label>
    								<p>{{$data->teacher->teacher_name}}</p>
        						</div>
        						<div class="col-sm-6">
    								<label for="active"><strong>Ảnh đại diện: </strong></label>
    								<p><img class="img-circle" src="{{url($data->teacher->avatar)}}" alt="avatar" width="60" height="60"/></p>
        						</div>
        						<div class="col-sm-6">
    								<label for="active"><strong>Nhóm quản trị: </strong></label>
    								<p>{{$data->usergroup->name}}</p>
        						</div>
        					</div>
        				</div><!--end .card-body -->
        			</div><!--end .card -->
        	</div>
        </div>
	</div>
</section>
@stop
@section('addtional-css')
<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/multi-select/multi-select.css')}}" />
@stop
