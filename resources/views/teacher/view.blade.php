@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin giảng viên</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'teacher::add' ) )
            				        <a href="{{route('teacher::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm giảng viên"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
    			    <div class="card">
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<label for=""><strong>Ảnh đại diện:</strong></label>
	        						<p><img class="img-circle" src="{{url($teacher->avatar)}}" alt="avatar" width="60" height="60"/></p>
        						</div>
        						<div class="col-sm-6">
        							<label><strong>Họ và tên:</strong></label>
        							<p>{{$teacher->teacher_name}}</p>
    							</div>
    							<div class="col-sm-6">
									<label><strong>Ngày sinh:</strong></label>
        							<p>{{$teacher->dateofbirth}}</p>
    							</div>
    							<div class="col-sm-6">
        							<label><strong>Email:</strong></label>
        							<p>{{$teacher->email}}</p>
    							</div>
    							<div class="col-sm-6">
        							<label><strong>Điện thoại:</strong></label>
        							<p>{{$teacher->phone}}</p>
    							</div>
    							<div class="col-sm-6">
									<label for=""><strong>Học vị:</strong></label>
    								<p>{{$teacher->degree}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Khoa:</strong></label>
    								<p>{{$teacher->faculty}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Bộ môn:</strong></label>
    								<p>{{$teacher->department->department_name}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Lĩnh vực chuyên môn:</strong></label>
    								<p>{{$teacher->subject}}</p>	
        						</div>
    							<div class="col-sm-6">
									<label><strong>Mô tả:</strong></label>
        							<p>{{$teacher->description}}</p>
    							</div>
    							<div class="col-sm-6">
									<label for=""><strong>Ghi chú:</strong></label>
    								<p>{{$teacher->note}}</p>	
        						</div>
        						<div class="col-sm-6">
    								<label for="important"><strong>Đang làm việc:</strong></label>
    								<p>{{$teacher->work}}</p>
        						</div>
        					</div>
        				</div><!--end .card-body -->
        			</div><!--end .card -->
                </div>
            </div>
        </div>
	</div>
</section>
@stop
@section('addtional-css')
<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/multi-select/multi-select.css')}}" />
@stop
@section('addtional-js')
<script src="{{ asset('public/assets/js/libs/multi-select/jquery.multi-select.js')}}"></script>
<script>
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
	$('#teacher').multiSelect({selectableOptgroup: true});
</script>
@stop