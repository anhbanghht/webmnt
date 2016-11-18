@extends('layouts.default')

@section('content')
<section>
	<div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post" id="add-form">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Thêm thông tin đề tài</header>
							<div class="tools">
								<div class="btn-group">
								    @if( \Auth::user()->has_permission( 'intership_time::listStudent' ) )
                				    <a href="{{route('intership_time::listStudent',['intertime_id'=>$intertime_students->intertime_id])}}"class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách đề tài sinh viên"><span class="md md-format-list-bulleted"></span></a>
                					@endif
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-6">
        							<div class="form-group">
        								<label for="student_id">Năm học:</label>
        								<p class="form-control-static" >{{$intertime_students->intership_time->year->year}}</p>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<p class="form-control-static">{{$intertime_students->intership_time->intertime_name}}</p>
        								<label for="teacher_id">Đợt thực tập:</label>
        								<input type="hidden" name="teacher_id" value="{{$intertime_students->teacher->id}}">
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<label for="student_id">Sinh viên:</label>
        								<p class="form-control-static">{{$intertime_students->student->student_name}}</p>
        							</div>
        						</div>
        						<div class="col-sm-6">
        							<div class="form-group">
        								<p class="form-control-static">{{$intertime_students->teacher->teacher_name}}</p>
        								<label for="teacher_id">Giảng viên hướng dẫn:</label>
        								<input type="hidden" name="teacher_id" value="{{$intertime_students->teacher->id}}">
        							</div>
        						</div>
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('topic_name')) has-error @endif">
    									<label for="topic_name">Tên đề tài:</label>
    									<textarea aria-required="true" name="topic_name" id="topic_name" class="form-control" rows="1">{{old('topic_name')}}</textarea>
                                        @foreach( $errors->get('topic_name') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
    							</div>
        					</div>
        				</div><!--end .card-body -->
        			</div><!--end .card -->
	        	</div>
	        </div>
		<!--Đề cương -->
    	<div class="row">
           <div class="col-md-12">
        		{{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Thêm thông tin đề cương</header>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('target')) has-error @endif">
    									<label for="target">Mục tiêu:</label>
    									<textarea aria-required="true" name="target" id="target" class="form-control" rows="5" >{{old('target')}}</textarea>
                                        @foreach( $errors->get('target') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
        						</div>
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('content')) has-error @endif">
    									<label for="target">Nội dung chính:</label>
    									<textarea aria-required="true" id="txt_content" name="content" class="form-control" rows="5" >{{old('content')}}</textarea>
                                        @foreach( $errors->get('content') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
        						</div>
        						<div class="col-sm-12">
        							<div class="form-group @if($errors->has('expect_result')) has-error @endif">
    									<label for="target">Kết quả dự kiến:</label>
    									<textarea aria-required="true" name="expect_result" id="expect_result" class="form-control" rows="3" >{{old('expect_result')}}</textarea>
                                        @foreach( $errors->get('expect_result') as $message )
                                            <span class="help-block">{{$message}}</span>
                                        @endforeach
    								</div>
        						</div>
        					</div>
        				</div><!--end .card-body -->
        			</div><!--end .card -->
	        	</div>
	        </div>
	        <div class="row">
           <div class="col-md-12">
        		{{ csrf_field() }}
        			<div class="card card-underline">
        				<div class="card-head card-head-lg">
							<header>Thêm tiến độ đề tài</header>
							<div class="tools">
								<div class="btn-group">
									<a class="btn btn-icon-toggle btn-primary" id="themtiendo" href="#"  data-toggle="tooltip" data-placement="top" data-original-title="Thêm tiến độ"><i class="fa fa-plus"></i></a>
								</div>
							</div>
						</div>
        				<div class="card-body">
        					<div class="row">
        						<div class="table-responsive">
    						<table class="table no-margin" id="tiendo">
    							<thead>
    								<tr>
    									<th>Ngày bắt đầu</th>
    									<th>Ngày kết thúc</th>
    									<th>Mô tả</th>
    									<th>Nội dung</th>
    									<th>Kết quả</th>
    									<th>Ghi chú</th>
    									<th>Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    								@if(old('sub_startdate'))
    								@foreach(old('sub_startdate') as $key => $row)
    								<tr>
    									<td>{{old('sub_startdate')[$key]}}</td>
    									<td>{{old('sub_enddate')[$key]}}</td>
    									<td>{{old('sub_description')[$key]}}</td>
    									<td>{{old('sub_content')[$key]}}</td>
    									<td>{{old('sub_result')[$key]}}</td>
    									<td>{{old('sub_note')[$key]}}</td>
    									<td>
    										<a class="btn btn-icon-toggle btn-primary edit_row" href="#"  data-toggle="tooltip" data-placement="top" data-original-title="Sửa tiến độ đề tài"><i class="fa fa-pencil"></i></a>
											<a class="btn btn-icon-toggle btn-primary remove_row" href="#"  data-toggle="tooltip" data-placement="top" data-original-title="Xóa tiến độ đề tài"><i class="fa fa-trash"></i></a>
										</td>
    								</tr>
    								@endforeach
    								@endif
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
        				</div>
        				</div><!--end .card-body -->
        				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						<button type="submit" class="btn ink-reaction btn-primary">Thêm đề tài</button>
        					</div>
        				</div>
        			</div><!--end .card -->
	        	</div>
	        </div>
		</div>
	</form>
</section>
<table id="clone" style="display:none">
	<tr>
		<td class='sub_startdate'></td>	
		<td class='sub_enddate'></td>
		<td class='sub_description'></td>
		<td class='sub_content'></td>
		<td class='sub_result'></td>
		<td class='sub_note'></td>
		<td>
			<a class="btn btn-icon-toggle btn-primary edit_row" href="#"  data-toggle="tooltip" data-placement="top" data-original-title="Sửa tiến độ đề tài"><i class="fa fa-pencil"></i></a>
			<a class="btn btn-icon-toggle btn-primary remove_row" href="#"  data-toggle="tooltip" data-placement="top" data-original-title="Xóa tiến độ đề tài"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
</table>
@stop
@section('after-body')
<div class="modal fade" id="add-process" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="formModalLabel">Thêm tiến độ đề tài</h4>
			</div>
			<form class="" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Ngày bắt đầu</label>
								<input class="sub_startdate form-control" type="text" name="sub_startdate" id="">
								<p class="help-block">ngày/tháng/năm</p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Ngày kết thúc</label>
								<input class="sub_enddate form-control" type="text" name="sub_enddate" id="">
								<p class="help-block">ngày/tháng/năm</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_description">Mô tả:</label>
								<textarea aria-required="true" id="" name="sub_description" class="sub_description form-control" rows="3" ></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_content">Nội dung:</label>
								<textarea aria-required="true" id="" name="sub_content" class="sub_content form-control" rows="3" ></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_result">Kết quả:</label>
								<textarea aria-required="true" name="sub_result" class="sub_result form-control" rows="3" ></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_note">Ghi chú</label>
								<textarea aria-required="true" name="sub_note" class="sub_note form-control" rows="3" ></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="add-row">Thêm</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="edit-process" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="formModalLabel">Sửa tiến độ đề tài</h4>
			</div>
			<form class="" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Ngày bắt đầu</label>
								<input class="form-control sub_startdate" type="text" name="sub_startdate">
								<p class="help-block">ngày/tháng/năm</p>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Ngày kết thúc</label>
								<input class="form-control sub_enddate" type="text" name="sub_enddate">
								<p class="help-block">ngày/tháng/năm</p>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_description">Mô tả:</label>
								<textarea aria-required="true" name="sub_description" class="form-control sub_description" rows="3" ></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_content">Nội dung:</label>
								<textarea aria-required="true" name="sub_content" class="form-control sub_content" rows="3" ></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_result">Kết quả:</label>
								<textarea aria-required="true" name="sub_result" class="form-control sub_result" rows="3" ></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="sub_note">Ghi chú</label>
								<textarea aria-required="true" name="sub_note" class="form-control sub_note" rows="3" ></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="edit-row">Cập nhật</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop
@section('addtional-js')
<script src="{{asset('public/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/assets/js/libs/ckeditor/ckeditor.js')}}"></script>
<script>
	CKEDITOR.replace("target");
	CKEDITOR.replace("txt_content");
	$('#startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#enddate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('.sub_startdate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('.sub_enddate').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('.datepicker').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
	$('#themtiendo').click(function(e){
		e.preventDefault();
		$('#add-process').modal('show');
	});
	$('#add-row').click(function(e){
		var row = $('#clone tr').clone();
		row.find('.sub_startdate').html($('#add-process .sub_startdate').val());
		row.find('.sub_enddate').html($('#add-process .sub_enddate').val());
		row.find('.sub_description').html($('#add-process .sub_description').val());
		row.find('.sub_content').html($('#add-process .sub_content').val());
		row.find('.sub_result').html($('#add-process .sub_result').val());
		row.find('.sub_note').html($('#add-process .sub_note').val());
		row.find('.remove_row').tooltip();
		row.find('.edit_row').tooltip();
		$('#tiendo tbody').append(row);
		$('#add-process').modal('hide');
		$('#add-process').find('form')[0].reset();
	});
	$('#tiendo tbody').on('click','.remove_row', function(e){
		e.preventDefault();
		$(this).parents('tr').remove();
	});
	var old;
	$('#tiendo tbody').on('click','.edit_row', function(e){
		e.preventDefault();
		old = $(this).parents('tr');
		$("#edit-process").modal('show');
	});
	$('#edit-process').on('show.bs.modal',function(){
		$('#edit-process .sub_startdate').val(old.find('.sub_startdate').html());
		$('#edit-process .sub_enddate').val(old.find('.sub_enddate').html());
		$('#edit-process .sub_description').val(old.find('.sub_description').html());
		$('#edit-process .sub_content').val(old.find('.sub_content').html());
		$('#edit-process .sub_result').val(old.find('.sub_result').html());
		$('#edit-process .sub_note').val(old.find('.sub_note').html());
	});
	$('#edit-row').click(function(e){
		var row = $('#clone tr').clone();
		row.find('.sub_startdate').html($('#edit-process .sub_startdate').val());
		row.find('.sub_enddate').html($('#edit-process .sub_enddate').val());
		row.find('.sub_description').html($('#edit-process .sub_description').val());
		row.find('.sub_content').html($('#edit-process .sub_content').val());
		row.find('.sub_result').html($('#edit-process .sub_result').val());
		row.find('.sub_note').html($('#edit-process .sub_note').val());
		row.find('.remove_row').tooltip();
		row.find('.edit_row').tooltip();
		old[0].outerHTML = row.html();
		old.remove();
		$('#edit-process').modal('hide');
		$('#edit-process').find('form')[0].reset();
	});
	$('#add-form').submit(function(e){
		$('#tiendo tbody tr').each(function(key,item){
			$('#add-form').append('<input type="hidden" name="sub_startdate[]" value="'+$(item).find('.sub_startdate').html()+'"/>');
			$('#add-form').append('<input type="hidden" name="sub_enddate[]" value="'+$(item).find('.sub_enddate').html()+'"/>');
			$('#add-form').append('<input type="hidden" name="sub_description[]" value="'+$(item).find('.sub_description').html()+'"/>');
			$('#add-form').append('<input type="hidden" name="sub_content[]" value="'+$(item).find('.sub_content').html()+'"/>');
			$('#add-form').append('<input type="hidden" name="sub_result[]" value="'+$(item).find('.sub_result').html()+'"/>');
			$('#add-form').append('<input type="hidden" name="sub_note[]" value="'+$(item).find('.sub_note').html()+'"/>');
		});
	});
</script>
@stop