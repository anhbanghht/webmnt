@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin năm học</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'year::add' ) )
            				        <a href="{{route('year::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm thông tin năm học"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<label for="name"><strong>Năm học:</strong></label>
	        						<p>{{$year->year}}</p>
        						</div>
                                <div class="col-sm-6">
                                    <label><strong>Ngày bắt đầu</strong></label>
                                    <p>{{Date('Y/m/d',strtotime($year->startdate))}}</p>
                                </div>
                                <div class="col-sm-6">
                                    <label for=""><strong>Năm hiện tại:</strong></label>
                                    <p>@if(\App\Year::isCurrent($year)) <span class="md md-check-box"></span> @else <span class="md md-check-box-outline-blank"></span> @endif</p>    
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
</script>
@stop