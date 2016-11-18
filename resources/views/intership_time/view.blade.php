@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin đợt thực tập </header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'intership_time::add' ) )
            				        <a href="{{route('intership_time::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm đợt thực tập"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<label for="intertime_name"><strong>Đợt thực tập:</strong></label>
	        						<p>{{$intership_time->intertime_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="teacher_id"><strong>Loại thực tập:</strong></label>
	        						<p>{{$intership_time->intership_type->intertype_name}}</p>
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Năm học:</strong></label>
    								<p>{{$intership_time->year->year}}</p>	
        						</div>
        						<div class="col-sm-6">
        							<label><strong>Ngày bắt đầu</strong></label>
        							<p>{{Date('d/m/Y',strtotime($intership_time->startdate))}}</p>
    							</div>
    							<div class="col-sm-6">
									<label><strong>Ngày kết thúc</strong></label>
        							<p>{{Date('d/m/Y',strtotime($intership_time->enddate))}}</p>
    							</div>
        						<div class="col-sm-12">
        							<label for="content"><strong>Nội dung:</strong></label>
	        						<p>{!!$intership_time->content!!}</p>
        						</div>
        						
    							<div class="col-sm-12">
									<label for=""><strong>Ghi chú:</strong></label>
    								<p>{{$intership_time->note}}</p>	
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