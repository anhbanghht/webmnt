@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Quản lý thông tin sinh viên</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'student::add' ) )
            				        <a href="{{route('student::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm sinh viên"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        					    <div class="col-sm-6">
        							<label for="plan_name"><strong>Mã sinh viên:</strong></label>
	        						<p>{{$student->student_id}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label><strong>Họ và tên:</strong></label>
        							<p>{{$student->student_name}}</p>
    							</div>
    							<div class="col-sm-6">
									<label><strong>Ngày sinh:</strong></label>
        							<p>{{$student->birth}}</p>
    							</div>
        						<div class="col-sm-6">
									<label for=""><strong>Lớp:</strong></label>
    								<p>{{$student->class_name}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Khóa học:</strong></label>
    								<p>@if($student->courses){{$student->courses->course}}@endif</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Ngành:</strong></label>
    								<p>@if($student->department){{$student->department->department_name}}@endif</p>	
        						</div>
        						<div class="col-sm-12">
        							<label><strong>Email:</strong></label>
        							<p>{{$student->email}}</p>
    							</div>
    							<div class="col-sm-12">
        							<label><strong>Điện thoại:</strong></label>
        							<p>{{$student->phone}}</p>
    							</div>
    							<div class="col-sm-6">
									<label><strong>Mô tả:</strong></label>
        							<p>{{$student->description}}</p>
    							</div>
    							<div class="col-sm-6">
									<label for=""><strong>Ghi chú:</strong></label>
    								<p>{{$student->note}}</p>	
        						</div>
        					</div>
        					<div class="card-actionbar">
								<div class="card-actionbar-row">
									<a class="btn ink-reaction btn-primary" href="{{ URL::previous() }}">back</a>
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
@section('addtional-js')
<script src="{{ asset('public/assets/js/libs/multi-select/jquery.multi-select.js')}}"></script>
<script>
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "yyyy/mm/dd"});
	$('#teacher').multiSelect({selectableOptgroup: true});
</script>
@stop