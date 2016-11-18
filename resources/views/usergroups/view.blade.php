@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Xem thông tin nhóm người dùng</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'users:groups:add' ) )
            				        <a href="{{route('users:groups:add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm nhóm người dùng"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-12">
        							<label for=""><strong>Tên nhóm:</strong></label>
	        						<p>{{$group->name}}</p>
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Ghi chú:</strong></label>
    								<p>{{$group->description}}</p>	
        						</div>
        						<div class="col-sm-6">
    								<label for="active"><strong>Trạng thái:</strong></label>
    								<p>{{$group->status}}</p>
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