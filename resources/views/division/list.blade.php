@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Quản lý phân công giảng dạy</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="card">
				<div class="card-head">
					<ul class="nav nav-tabs" data-toggle="tabs">
						<li class="active"><a href="#first1">Phân công giảng dạy</a></li>
						<li><a href="#second1">Chưa phân công</a></li>
					</ul>
				</div><!--end .card-head -->
				<div class="card-body tab-content">
					<div class="tab-pane active" id="first1">
						<div class="table-responsive">
    						<table class="table no-margin" id="datatable1s">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Lớp học phần</th>
    									<th>Môn học</th>
    									<th>Hình thức thi</th>
    									<th>Ngành học</th>
    									<th>Khóa</th>
    									<th>Số SV</th>
    									<th>GV đảm nhận</th>
    									<th>Ghi chú</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $division as $item )
    							    @if($item->id_teacher!=null)
    							    <tr>
    							        <td>{{$item->id}}</td>
    									<td>{{$item->course_name}}</td>
    									<td>@foreach($subject as $s) @if($item->id_subject == $s->id){{ $s->subject_name }}@endif @endforeach</td>
    									<td>{{$item->type_exam}}</td>
    									<td>@foreach($department as $d) @if($item->id_department == $d->id){{ $d->department_name }}@endif @endforeach</td>
    									<td>{{$item->name_class}}</td>
    									<td>{{$item->num_student}}</td>
										<td>@foreach($teacher as $t) @if( $item->id_teacher == $t->id){{ $t->teacher_name }}@endif @endforeach</td>
    									<td>{{$item->note}}</td>
    								</tr>
    								@endif
    							    @endforeach
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
					
					</div>
					<div class="tab-pane" id="second1">
						<div class="table-responsive">
    						<table class="table no-margin" id="datatable">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Lớp học phần</th>
    									<th>Môn học</th>
    									<th>Hình thức thi</th>
    									<th>Ngành học</th>
    									<th>Khóa</th>
    									<th>Số SV</th>
    									<th>GV đảm nhận</th>
    									<th>Ghi chú</th>
    									<th>Thực hiện</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $division as $item )
    							    <tr>
    							        <td>{{$item->id}}</td>
    									<td>{{$item->course_name}}</td>
    									<td>@foreach($subject as $s) @if($item->id_subject == $s->id){{ $s->subject_name }}@endif @endforeach</td>
            							<td>{{$item->type_exam}}</td>
            							<td>@foreach($department as $d) @if($item->id_department == $d->id){{ $d->department_name }}@endif @endforeach</td>
    									<td>{{$item->name_class}}</td>
    									<td>{{$item->num_student}}</td>
										<td>@foreach($teacher as $t) @if($item->id_teacher == $t->id){{ $t->teacher_name }}@endif @endforeach</td>
    									<td>{{$item->note}}</td>
    									<td>
    									    <a href="{{route('division::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    <a href="{{route('division::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
    									</td>
    								</tr>
    							    @endforeach
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
						
					</div>
				</div><!--end .card-body -->
			</div><!--end .card -->
		</div>
		
    </div>
</section>
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
		 $('#datatable1s').DataTable({
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
        $('.remove-btn').click(function(e){
           e.preventDefault();
           var link = $(e.currentTarget).attr('href');
           $.ajax({
               url: link,
               data: '_token='+token,
               method: 'POST'
           }).done(function(data){
              window.location.reload(); 
           });
        });
   
</script>
	
@stop