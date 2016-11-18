@extends('layouts.default')

@section('content')
<section>
	<div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
					    <div class="card-head card-head-lg">
							<header>Thêm danh sách sinh viên trong hội đồng <span style="color: #311B92;font-weight: bold;">{{$council->name}}</span> đợt <span style="color: #311B92;font-weight: bold;">{{$council->council_group->name}}</span></header>
							<div class="tools">
								<div class="btn-group">
									<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
								</div>
							</div>
						</div>
						<div class="card-body">
		                    <div class="table-responsive">
								<table id="datatable1" class="table no-margin datatable">
									<thead>
										<tr>
											<th class="hidden"></th>
											<th>Mã sinh viên</th>
											<th>Tên sinh viên</th>
											<th>Đề tài</th>
											<th>GVHD</th>
										</tr>
									</thead>
									<tbody>
									    @foreach( $students as $item )
									    <tr data-id="{{$item->id}}"	class="@if( in_array( $item->id, $students_selected->pluck('list_student_by_intershiptime_id')->toArray() ) ) disabled pre @endif">
									    	<td class="hidden"><input type="checkbox" name="ids[]" class="ids" value="{{$item->id}}" /></td>
											<td>{{$item->student->student_id}}</td>
											<td>{{$item->student->student_name}}</td>
											<td>@if($item->topics){{$item->topics->topic_name}}@endif</td>
											<td>@if($item->teacher){{$item->teacher->teacher_name}}@endif</td>
										</tr>
									    @endforeach
									</tbody>
								</table>
							</div><!--end .table-responsive -->
						</div>
						<div class="card-actionbar">
		        			<div class="card-actionbar-row">
		        				<button class="btn ink-reaction btn-primary" id="add_to_list">Thêm vào danh sách</button>
		        			</div>
		        		</div>
					</div>
    		</div>
        </div>
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
					    <div class="card-head card-head-lg">
							<header>Danh sách sinh viên được thêm</header>
						</div>
				<div class="card-body">
                    <div class="table-responsive">
                    	
						<table id="tableResult" class="table no-margin datatable">
							<thead>
								<tr>
									<th class="hidden"></th>
									<th>Mã sinh viên</th>
									<th>Tên sinh viên</th>
									<th>Đề tài</th>
									<th>GVHD</th>
								</tr>
							</thead>
							<tbody>
								@foreach($students_on_selected as $item)
							    <tr data-id="9" class="odd" role="row">
							    	<td class="hidden"><input type="checkbox" name="ids[]" class="ids" value="{{$item->list_student_by_intershiptime_id}}" ></td>
									<td>{{$item->intertime_students->student->student_id}}</td>
									<td>{{$item->intertime_students->student->student_name}}</td>
									<td>@if($item->intertime_students->topics){{$item->intertime_students->topics->topic_name}}@endif</td>
									<td>@if($item->intertime_students->teacher){{$item->intertime_students->teacher->teacher_name}}@endif</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div><!--end .table-responsive -->
				</div>
			    <div class="card-actionbar">
        			<div class="card-actionbar-row">
        				<button class="btn ink-reaction btn-primary" id="add_to_list">Cập nhật danh sách</button>
        			</div>
        		</div>
        		</form>
    		</div>
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
    (function($){
        $('#datatable1').DataTable({
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

		$('#datatable1 tbody').on('click', 'tr:not(.disabled)', function() {
			$(this).toggleClass('selected');
			if( $(this).hasClass('selected') )
				$(this).find('.ids').prop('checked',true);
			else
				$(this).find('.ids').prop('checked',false);
		});
		
		$('#add_to_list').on('click', function(e){
			e.preventDefault();
			$('#datatable1 tbody tr.selected').each(function(key,item){
				$(item).removeClass('selected');
				var newrow = $(item).clone();
				$(item).addClass('disabled');
				$(item).click(function(e){
					e.preventDefault();
					return false;
				});
				$('#tableResult tbody').append(newrow);
			});
		});
		var token = "{{csrf_token()}}";
        $('#datatable1').on('click','.remove-btn',function(e){
           e.preventDefault();
           var agree = confirm('Bạn có chắc chắn muốn xóa?');
           if(agree){
	           var link = $(e.currentTarget).attr('href');
	           $.ajax({
	               url: link,
	               data: '_token='+token,
	               method: 'POST'
	           }).done(function(data){
	           		alert("Xóa thành công!");
	              window.location.reload(); 
	           });
	       } else {
	       	return false;
	       }
        });
    })(jQuery);
</script>
@stop