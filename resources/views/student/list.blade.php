@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Quản lý thông tin sinh viên</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'student::add' ) )
            				        <a href="{{route('student::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm sinh viên"><span class="fa fa-plus"></span></a>
            				    @endif
            				    @if( \Auth::user()->has_permission( 'student::import' ) )
            				        <a href="#" id="import_student" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Nhập sinh viên"><span class="fa fa-file-excel-o"></span></a>
            				    @endif
								<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
    				<div class="card-body"> 
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Mã sinh viên</th>
    									<th>Tên sinh viên</th>
    									<th>Ngày sinh</th>
    									<th>Lớp</th>
    									<th>Khóa</th>
    									<th>Email</th>
    									<th style="width:160px">Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $student as $key => $item )
    							    <tr>
    									<td>{{$key+1}}</td>
    									<td>{{$item->student_id}}</td>
    									<td>{{$item->student_name}}</td>
    									<td>{{$item->birth}}</td>
    									<td>{{$item->class_name}}</td>
    									<td>@if($item->courses){{$item->courses->course}}@endif</td>
    									<td>{{$item->email}}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'student::view' ) )
    									    <a href="{{route('student::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin sinh viên"><span class="glyphicon glyphicon-eye-open"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'student::edit' ) )
    									    <a href="{{route('student::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'student::delete' ) )
    									    <a href="{{route('student::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
    									    @endif
    									</td>
    								</tr>
    							    @endforeach
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
    				</div><!--end .card-body -->
    			</div><!--end .card -->
    		</div>
		</div>
		
    </div>
</section>
@stop
@section('after-body')
<!-- BEGIN Nhập file -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="textModalLabel">Nhập hội đồng</h4>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" id="import_form" class="form-horizontal">
					{{csrf_field()}}
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">File:</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" id="file" name="file"/>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Trang:</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="sheet" name="sheet"/>
							<span class="help-block">Số trang (sheet) có dữ liệu cần import</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Mã hội đồng:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="student_id" name="student_id"/>
							<span class="help-block">Tên cột chứa mã sinh viên</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Họ và tên:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="student_name" name="student_name"/>
							<span class="help-block">Tên cột chứa tên sinh viên</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Ngày sinh:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="dateofbirth" name="dateofbirth"/>
							<span class="help-block">Tên cột chứa ngày sinh</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Lớp:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="class_name" name="class_name"/>
							<span class="help-block">Tên cột chứa Lớp</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Khóa học:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="course_id" name="course_id"/>
							<span class="help-block">Tên cột chứa khóa học</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Ngành:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="id_department" name="id_department"/>
							<span class="help-block">Tên cột chứa mã sinh viên</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Email:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="email" name="email"/>
							<span class="help-block">Tên cột chứa email</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">SĐT:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="phone" name="phone"/>
							<span class="help-block">Tên cột chứa số điện thoại</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Mô tả:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="description" name="description"/>
							<span class="help-block">Tên cột chứa thông tin mô tả</span>
						</div>
					</div>
					<div class="form-group">
						<label for="regular13" class="col-sm-2 control-label">Ghi chú:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="note" name="note"/>
							<span class="help-block">Tên cột chứa thông tin ghi chú</span>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
				<button type="button" class="btn btn-success" id="import-btn">Nhập dữ liệu</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END Nhập file -->
@stop
@section('addtional-css')
<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/DataTables/jquery.dataTables.css')}}" />
<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css')}}" />
<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css')}}" />
@stop
@section('addtional-js')
<script src="{{ asset('public/assets/js/libs/DataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js')}}"></script>
<script src="{{ asset('public/assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script>
    (function($){
        $('#datatable').DataTable({
			"dom": 'lCfrtip',
			"order": [],
			"colVis": {
				"buttonText": "Columns",
				"overlayFade": 0,
				"align": "right"
			},
			"language": {
				"lengthMenu": '_MENU_ entries per page',
				"search": '<i class="fa fa-search"></i>',
				"paginate": {
					"previous": '<i class="fa fa-angle-left"></i>',
					"next": '<i class="fa fa-angle-right"></i>'
				}
			}
		});

		var token = "{{csrf_token()}}";
        $('#datatable').on('click','.remove-btn',function(e){
           e.preventDefault();
           var agree = confirm('Bạn có chắc chắn muốn xóa?');
           if(agree){
	           var link = $(e.currentTarget).attr('href');
	           $.ajax({
	               url: link,
	               data: '_token='+token,
	               method: 'POST'
	           }).done(function(data){
	           		alert("Xóa sinh viên thành công!");
	              window.location.reload(); 
	           });
	       } else {
	       	return false;
	       }
        });
        
        $('#import_student').click(function(e){
        	e.preventDefault();
        	$('#importModal').modal('show');
        });
        $('#import-btn').click(function(e){
        	var formElement = document.querySelector("form#import_form");
        	var dataform = new FormData(formElement);
        	$.ajax({
        		url:'{{route("student::import")}}',
        		data: dataform,
        		contentType: false,
			    processData: false,
			    method: 'POST'
        	}).done(function(response){
        		console.log(response);
        		if(response.status == true ){
        			alert("Nhập sinh viên thành công!");
        			formElement.reset();
        			window.location.reload();
        		}
        		$('#importModal').modal('hide');
        	});
        });
    })(jQuery);
</script>
@stop