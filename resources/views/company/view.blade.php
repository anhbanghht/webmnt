@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Quản lý thông tin cơ sở thực tập</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'company::add' ) )
            				        <a href="{{route('company::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm cơ sở thực tập"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-12">
        							<label for="job_name"><strong>Tên cơ sở:</strong></label>
	        						<p>{{$company->company_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="email"><strong>Email:</strong></label>
	        						<p>{{$company->email}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="website"><strong>Website:</strong></label>
	        						<p>{{$company->website}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="phone"><strong>Phone:</strong></label>
	        						<p>{{$company->phone}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="address"><strong>Địa chỉ:</strong></label>
	        						<p>{{$company->address}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="subject"><strong>Lĩnh vực:</strong></label>
	        						<p>{{$company->subject}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="student_quantity"><strong>Số lượng sinh viên:</strong></label>
	        						<p>{{$company->student_quantity}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="guide_people"><strong>Cán bộ hướng dẫn của cơ sở:</strong></label>
	        						<p>{{$company->guide_people}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="teacher_id"><strong>Phụ trách cơ sở:</strong></label>
	        						<p>{{$company->teacher->teacher_name}}</p>
        						</div>
                                <div class="col-sm-6">
                                    <label for="intertime_id"><strong>Đợt thực tập:</strong></label>
                                    <p>{{$company->intership_time->intertime_name}}</p>
                                </div>
    							<div class="col-sm-6">
									<label for=""><strong>Các hướng đề tài thực tập:</strong></label>
    								<p>{{$company->description}}</p>	
        						</div>
    							<div class="col-sm-6">
    								<label for="note"><strong>Ghi chú:</strong></label>
    								<p >{{$company->note}}</p>
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