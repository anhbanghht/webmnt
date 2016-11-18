@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin loại thực tập</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'intership_type::add' ) )
            				        <a href="{{route('intership_type::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm người dùng"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-6">
        							<label for="intertype_name"><strong>Loại thực tập:</strong></label>
	        						<p>{{$intership_type->intertype_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label><strong>Tên đầy đủ:</strong></label>
        							<p>{{$intership_type->intertype_fullname}}</p>
    							</div>
    							<div class="col-sm-6">
									<label><strong>Mô tả:</strong></label>
        							<p>{{$intership_type->description}}</p>
    							</div>
    							<div class="col-sm-6">
									<label for=""><strong>Ghi chú:</strong></label>
    								<p>{{$intership_type->note}}</p>	
        						</div>
        						<div class="col-sm-6">
        							<label for="allow"><strong>Đi thực tập tại cơ sở:</strong></label>
        							<p>{{$intership_type->allo}}</p>
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