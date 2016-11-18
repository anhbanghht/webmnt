@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin hội đồng</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'council::add' ) )
            				        <a href="{{route('council::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm hội đồng"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<label for="name"><strong>Tên hội đồng:</strong></label>
	        						<p>{{$council->name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="name"><strong>Tên nhóm hội đồng:</strong></label>
	        						<p>{{$council->council_group->name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for=""><strong>Thời gian bắt đầu:</strong></label>
	        						<p>{{Date('Y/m/d H:i', strtotime($council->startdate)) }}</p>
        						</div>
                                <div class="col-sm-6">
                                    <label for=""><strong>Thời gian kết thúc:</strong></label>
                                    <p>{{Date('Y/m/d H:i', strtotime($council->enddate)) }}</p>
                                </div>
        						<div class="col-sm-6">
        							<label for=""><strong>Địa điểm:</strong></label>
	        						<p>{{$council->place}}</p>
        						</div>
    							<div class="col-sm-6">
    								<label for="teacher"><strong>Giáo viên trong hội đồng:</strong></label>
    								<ul>
    									<?php $teachers = json_decode($council->teacher); ?>
    									@foreach( $teachers as $idt)
    									<?php $teacher = \App\Teacher::find($idt); ?>
    									<li>{{ $teacher->teacher_name }}</li>
    									@endforeach
    								</ul>
    							</div>
    							<div class="col-sm-6">
    								<label for="note"><strong>Ghi chú:</strong></label>
    								<p >{{$council->note}}</p>
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
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#teacher').multiSelect({selectableOptgroup: true});
    $("#time_start").inputmask('hh:mm', {placeholder: 'hh:mm', alias: 'time24', hourFormat: '24'});
    $("#time_end").inputmask('hh:mm', {placeholder: 'hh:mm', alias: 'time24', hourFormat: '24'});
</script>
@stop