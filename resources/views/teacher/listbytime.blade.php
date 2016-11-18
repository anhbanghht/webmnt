@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Giáo viên hướng dẫn <span style="color: #311B92;font-weight: bold;">{{ $intership_time->intertime_name }}</span></h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    				    <a class="btn ink-reaction btn-primary" href="{{ URL::previous() }}">back</a>
    				    @if( \Auth::user()->has_permission( 'teacher::add' ) )
    				    <a href="{{route('teacher::add')}}" class="btn ink-reaction btn-primary"><span class="fa fa-plus"></span></a>
    					@endif
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
    								<tr>
    									<th>ID</th>
    									<th>Ảnh</th>
    									<th>Tên giáo viên</th>
    									<th>Email</th>
    									<th>Khoa</th>
    									<th>Bộ môn</th>
    									<th>Lĩnh vực chuyên môn</th>
    									<th>Điện thoại</th>
    									<th>Ghi chú</th>
    									<th>Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @if( $teacher->isEmpty() )
    							    <tr>
    									<td rowspan="5">Không có bản ghi nào!</td>
    								</tr>
    							    @else
    							    @foreach( $teacher as $item )
    							    <tr>
    									<td>{{$item->teacher->id}}</td>
    									<td><img class="img-circle" src="{{url($item->teacher->avatar)}}" alt="avatar" width="60" height="60"/></td>
    									<td>{{$item->teacher->teacher_name}}</td>
    									<td>{{$item->teacher->email}}</td>
    									<td>{{$item->teacher->faculty}}</td>
    									<td>{{$item->teacher->department->department_name}}</td>
    									<td>{{$item->teacher->subject}}</td>
    									<td>{{$item->teacher->phone}}</td>
    									<td>{{$item->teacher->note}}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'topic::listtopic' ) )
    									    <a href="{{route('topic::listtopic',['time'=>$intership_time->id,'teacher'=>$item->teacher->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách đề tài"><span class="glyphicon glyphicon-book"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'teacher::edit' ) )
    									    <a href="{{route('teacher::edit',['id'=>$item->teacher->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Sửa"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'teacher::delete' ) )
    									    <a href="{{route('teacher::delete',['id'=>$item->teacher->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" data-original-title="Xóa"></span></a>
    									    @endif
    									</td>
    								</tr>
    							    @endforeach
    								@endif
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