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
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
        				<div class="card-body floating-label">
        					<div class="row">
        						<div class="col-sm-12">
        							<label for="topic_name"><strong>Tên đề tài:</strong></label>
	        						<p>{{$item->topics->topic_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="student_id"><strong>Đợt thực tập:</strong></label>
	        						<p>{{$item->intership_time->intertime_name}}</p>
        						</div>
        						<div class="col-sm-6">
        							<label for="student_id"><strong>Sinh viên thực hiện:</strong></label>
	        						<p>{{$item->student->student_name}}</p>
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Giảng viên hướng dẫn:</strong></label>
    								<p>{{$item->teacher->teacher_name}}</p>	
        						</div>
        						<div class="col-sm-6">
									<label for=""><strong>Cơ sở thực tập:</strong></label>
    								<p>@if($item->company){{$item->company->company_name}}@endif</p>	
        						</div>
        						<div class="col-sm-12">
									<label for=""><strong>Mục tiêu:</strong></label>
    								<p>{!! $item->topics->target !!}</p>	
        						</div>
        						<div class="col-sm-12">
									<label for=""><strong>Nội dung chính:</strong></label>
    								<p>{!! $item->topics->content !!}</p>	
        						</div>
        						<div class="col-sm-12">
									<label for=""><strong>Tiến độ đã đạt:</strong></label>
    								<p>{{$item->topics->process}} % </p>	
        						</div>
                                <div class="col-sm-12">
                                    <label for=""><strong>Kết quả dự kiến:</strong></label>
                                    <p>{{$item->topics->expect_result}}</p> 
                                </div>
        						<div class="col-sm-12">
    								<label for="teacher"><strong>Tiến độ thực hiện:</strong></label>
    								<div class="table-responsive">
                                        <table class="table no-margin dataTable no-footer">
                                            <thead>
                                                <th>STT</th>
                                                <th>Ngày bắt đầu</th>
                                                <th>Ngày kết thúc</th>
                                                <th>Nội dung</th>
                                                <th>Ghi chú</th>
                                                <th>Kết quả</th>
                                                <th>Trạng thái</th>
                                            </thead>
                                            <tbody>
                                                @if(count($item->topics->topic_process))
                                                @foreach($item->topics->topic_process as $key => $row)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$row->sdate}}</td>
                                                    <td>{{$row->edate}}</td>
                                                    <td>{{$row->content}}</td>
                                                    <td>{{$row->note}}</td>
                                                    <td>{{$row->result}}</td>
                                                    <td>{{$row->status}}</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>                        
                                    </div>
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