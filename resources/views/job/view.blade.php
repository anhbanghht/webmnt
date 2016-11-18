@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin công việc</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'job::add' ) )
            				        <a href="{{route('job::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm người dùng"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-12">
        							<label for="job_name"><strong>Tên công việc:</strong></label>
	        						<p>{{$job->job_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label><strong>Ngày bắt đầu</strong></label>
        							<p>{{Date('Y/m/d',strtotime($job->startdate))}}</p>
    							</div>
    							<div class="col-sm-6">
									<label><strong>Ngày kết thúc</strong></label>
        							<p>{{Date('Y/m/d',strtotime($job->enddate))}}</p>
    							</div>
    							<div class="col-sm-6">
									<label for=""><strong>Đợt thực tập:</strong></label>
    								<p>{{$job->intership_time->intertime_name}}</p>	
        						</div>
        						<div class="col-sm-12">
        							<label for="location"><strong>Địa điểm:</strong></label>
	        						<p>{{$job->location}}</p>
        						</div>
    							<div class="col-sm-6">
    								<label for="description"><strong>Mô tả:</strong></label>
        							<p>{{$job->description}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="content"><strong>Nội dung:</strong></label>
        							<p>{{$job->content}}</p>
        						</div>
    							<div class="col-sm-6">
    								<label for="teacher"><strong>Giáo viên thực hiện:</strong></label>
    								<ul>
    									<?php $teachers = json_decode($job->teacher); ?>
    									@foreach( $teachers as $idt)
    									<?php $teacher = \App\Teacher::find($idt); ?>
    									<li>{{ $teacher->teacher_name }}</li>
    									@endforeach
    								</ul>
    							</div>
    							<div class="col-sm-6">
    								<label for="note"><strong>Ghi chú:</strong></label>
    								<p >{{$job->note}}</p>
    							</div>
    							<div class="col-sm-6">
    								<label for="important"><strong>Quan trọng:</strong></label>
    								<p>{{$job->impor}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="allday"><strong>Cả ngày:</strong></label>
        							<p>{{$job->alld}}</p>
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