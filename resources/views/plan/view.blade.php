@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Thông tin kế hoạch</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'plan::' ) )
	            				        <a href="{{route('plan::')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách kế hoạch"><span class="md md-format-list-bulleted"></span></a>
	            				    @endif
	            				    @if( \Auth::user()->has_permission( 'plan::add' ) )
	            				        <a href="{{route('plan::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm kế hoạch"><span class="fa fa-plus"></span></a>
	            				    @endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body floating-label">
        					<div class="row">
        					    <div class="col-sm-12">
        							<label for="plan_name"><strong>Tên kế hoạch:</strong></label>
	        						<p>{{$plan->plan_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="year"><strong>Năm học:</strong></label>
	        						<p>{{$plan->year->year}}</p>
        						</div>
                                <div class="col-sm-6">
                                    <label for="year"><strong>Loại thực tập:</strong></label>
                                    <p>{{$plan->intership_type->intertype_name}}</p>
                                </div>
        						<div class="col-sm-6">
        							<label><strong>Ngày bắt đầu</strong></label>
        							<p>{{Date('d/m/Y',strtotime($plan->startdate))}}</p>
    							</div>
    							<div class="col-sm-6">
									<label><strong>Ngày kết thúc</strong></label>
        							<p>{{Date('d/m/Y',strtotime($plan->enddate))}}</p>
    							</div>
                                <div class="col-sm-12">
                                    <label><strong>Mô tả:</strong></label>
                                    <p>{{$plan->description}}</p>
                                </div>
        						<div class="col-sm-12">
        							<label><strong>Nội dung:</strong></label>
        							<p>{{$plan->content}}</p>
    							</div>
    							<div class="col-sm-12">
									<label for=""><strong>Ghi chú:</strong></label>
    								<p>{{$plan->note}}</p>	
        						</div>
                                <div class="col-sm-12">
                                    <label><strong> <i class="md md-attach-file"></i><a href="{{ asset($plan->file) }}"> Xem file đính kèm</a> </strong></label>
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