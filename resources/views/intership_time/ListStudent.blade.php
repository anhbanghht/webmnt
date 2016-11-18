@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
			    <div class="card-head card-head-lg">
					<header>Bảng tổng hợp đề tài <span style="color: #311B92;font-weight: bold;">{{ $intership_time->intertime_name }}</span></header>
					<div class="tools">
						<div class="btn-group">
						    @if( \Auth::user()->has_permission( 'intership_time::addListStudent' ) )
        				        <a href="{{route('intership_time::addListStudent',['intertime_id'=>$intership_time->id])}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Cập nhật sinh viên thực tập"><span class="md md-cached"></span></a>
        				    @endif
        				    @if( \Auth::user()->has_permission( 'intership_time::addlistTeacher' ) )
        				        <a href="{{route('intership_time::addlistTeacher',['intertime_id'=>$intership_time->id])}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Phân công GVHD và GVPB"><span class="glyphicon glyphicon-edit"></span></a>
        				    @endif
							<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
						</div>
					</div>
				</div>
    			    <form method="POST">
    				<div class="card-body">
    					<div class="table-responsive">
    						<table id="datatable1" class="table no-margin">
    							<thead>
    								<tr>
                                        <th>STT</th>
    									<th>Mã sinh viên</th>
    									<th>Tên sinh viên</th>
    									<th>Lớp</th>
    									<th>Tên đề tài</th>
                                        <th>Tiến độ</th>
    									<th>GVHD</th>
    									@if($intership_time->intership_type->id==4)
                                        <th>GVPB</th>
                                        @endif
    									<th style="width:200px;">Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    
    							    @foreach( $students as $key => $item )
    							    <tr>
                                        <td>{{$key+1}}</td>
    									<td>{{$item->student->student_id}}</td>
    									<td>{{$item->student->student_name}}</td>
    									<td>{{$item->student->class_name}}</td>
    									<td>@if($item->topics){{$item->topics->topic_name}}@endif</td>
                                        <td>@if($item->topics){{$item->topics->process}}%@endif</td>
    									<td>@if($item->teacher_id){{$item->teacher->teacher_name}}@endif</td>
                                        @if($intership_time->intership_type->id==4)
    									<td>@if($item->teacher_reviewer){{$item->gvpb->teacher_name}}@endif</td>
                                        @endif
    									<td>
                                        
                                            @if( \Auth::user()->has_permission( 'intership_time::view_topic' ) )
                                                <a href="{{route('intership_time::view_topic',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin đề tài thực tập"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                @endif
                                            @if($item->topics)
                                                    @if( \Auth::user()->has_permission( 'topic::process' ) )
                                                        <a href="{{route('topic::process',['id'=>$item->topics->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Tiến độ"><span class="fa fa-clock-o"></span></a>
                                                    @endif
                                                @endif
    									    @if($item->topics)
    									        @if( \Auth::user()->has_permission( 'topic::edit' ) )
        									    <a href="{{route('topic::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Sửa đề tài"><span class="glyphicon glyphicon-pencil"></span></a>
        									    @endif
    									    @else
    									        @if($item->teacher)
            									    @if( \Auth::user()->has_permission( 'topic::add' ) )
            									    <a href="{{route('topic::add',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm đề tài"><span class="glyphicon glyphicon-plus"></span></a>
            									    @endif
            									@endif
    									    @endif
    									    @if( \Auth::user()->has_permission( 'intership_time::delete' ) )
    									    <a href="{{route('intership_time::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
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