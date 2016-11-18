@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Quản lý thông tin giảng viên</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'teacher::add' ) )
            				        <a href="{{route('teacher::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm giảng viên"><span class="fa fa-plus"></span></a>
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
    									<th>Ảnh</th>
    									<th>Tên giáo viên</th>
    									<th>Email</th>
    									<th>Bộ môn</th>
    									<th>Lĩnh vực chuyên môn</th>
    									<th>Điện thoại</th>
    									<th>Đang làm việc</th>
    									<th>Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $teacher as $key => $item )
    							    <tr>
    									<td>{{$key+1}}</td>
    									<td><img class="img-circle" src="{{url($item->avatar)}}" alt="avatar" width="60" height="60"/></td>
    									<td>{{$item->teacher_name}}</td>
    									<td>{{$item->email}}</td>
    									<td>{{$item->department->department_name}}</td>
    									<td>{{$item->subject}}</td>
    									<td>{{$item->phone}}</td>
    									<td>{{$item->work}}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'teacher::view' ) )
    									    <a href="{{route('teacher::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin giảng viên"><span class="glyphicon glyphicon-eye-open"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'teacher::edit' ) )
    									    <a href="{{route('teacher::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'teacher::delete' ) )
    									    <a href="{{route('teacher::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
    									    @endif
    									</td>
    								</tr>
    							    @endforeach
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
    				</div><!--end .card-body -->
        		</div>
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