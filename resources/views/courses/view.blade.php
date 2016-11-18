@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin khóa học</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'courses::add' ) )
            				        <a href="{{route('courses::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm khóa học"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<label for="name"><strong>Khóa:</strong></label>
	        						<p>{{$courses->course}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="name"><strong>Tên đầy đủ:</strong></label>
	        						<p>{{$courses->course_full}}</p>
        						</div>
    							<div class="col-sm-6">
									<label for=""><strong>Ghi chú:</strong></label>
    								<p>{{$courses->note}}</p>	
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