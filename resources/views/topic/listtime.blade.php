@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Danh sách đề tài của giáo viên</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    				    <a class="btn ink-reaction btn-primary" href="{{ URL::previous() }}">back</a>
    				    <a href="{{route('topic::add')}}" class="btn ink-reaction btn-primary"><span class="fa fa-plus"></span></a>
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
    								<tr>
    									<th width="100px">STT</th>
    									<th width="500px">Tên đề tài</th>
    									<th width="200px">Đợt thực tập</th>
    									<th width="200px">Sinh viên thực hiện</th>
    									<th width="200px">Giáo viên hướng dẫn</th>
    									<th width="400px">Tiến độ</th>
    									<th width="450px">Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $topic as $key => $item )
    							    <tr>
    									<td width="100px">{{$key+1}}</td>
    									<td width="500px">{{$item->topic_name}}</td>
    									<td width="200px">{{$item->intership_time->intertime_name}}</td>
    									<td width="200px">{{$item->student->student_name}}</td>
    									<td width="200px">{{$item->teacher->teacher_name}}</td>
    									<td width="400px">{{$item->process}}%</td>
    									<td width="450px">
    									    @if( \Auth::user()->has_permission( 'topic::process' ) )
    									    <a href="{{route('topic::process',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Tiến độ"><span class="fa fa-stack-overflow"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'topic::edit' ) )
    									    <a href="{{route('topic::edit',['id'=>$item->teacher->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Sửa"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'topic::delete' ) )
    									    <a href="{{route('topic::delete',['id'=>$item->teacher->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" data-original-title="Xóa"></span></a>
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