@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin đề tài, đề cương</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'topic::add' ) )
            				        <a href="{{route('topic::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm đề tài"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-12">
        							<label for="topic_name"><strong>Tên đề tài:</strong></label>
	        						<p>{{$topic->topic_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="student_id"><strongĐợt thực tập:</strong></label>
	        						<p>{{$topic->intertime_students->intership_time->intertime_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="student_id"><strong>Sinh viên thực hiện:</strong></label>
	        						<p>{{$topic->intertime_students->student->student_name}}</p>
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Giảng viên hướng dẫn:</strong></label>
    								<p>{{$topic->intertime_students->teacher->teacher_name}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Cơ sở thực tập:</strong></label>
    								<p>{{$topic->intertime_students->company->company_name}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Mục tiêu:</strong></label>
    								<p>{{ strip_tags($topic->target) }}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Nội dung chính:</strong></label>
    								<p>{{$topic->content}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Kết quả dự kiến:</strong></label>
    								<p>{{$topic->expect_result}}</p>	
        						</div>
        						<div class="col-sm-6">
    								<label for="teacher"><strong>Tiến độ thực hiện:</strong></label>
    								<ul>
    									<?php $teachers = json_decode($job->teacher); ?>
    									@foreach( $teachers as $idt)
    									<?php $teacher = \App\Teacher::find($idt); ?>
    									<li>{{ $teacher->teacher_name }}</li>
    									@endforeach
    								</ul>
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