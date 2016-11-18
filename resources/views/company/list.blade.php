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
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Tên cơ sở thực tập</th>
    									<th>Email</th>
    									<th>Website</th>
    									<th>Điện thoại</th>
    									<th>Địa chỉ</th>
    									<th>Lĩnh vực</th>
    									<th>Số lượng sinh viên</th>
    									<th>Cán bộ hướng dẫn</th>
    									<th>Phụ trách cơ sở</th>
                                        <th>Đợt thực tập</th>
                                        <th>Các hướng đề tài thực tập</th>
    									<th>Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $company as $key => $item )
    							    <tr>
    									<td>{{$key+1}}</td>
    									<td>{{$item->company_name}}</td>
    									<td>{{$item->email}}</td>
    									<td>{{$item->website}}</td>
    									<td>{{$item->phone}}</td>
    									<td>{{$item->address}}</td>
    									<td>{{$item->subject}}</td>
    									<td>{{$item->student_quantity}}</td>
    									<td>{{$item->guide_people}}</td>
    									<td>@if($item->teacher){{$item->teacher->teacher_name}}@endif</td>
                                        <td>@if($item->intership_time){{$item->intership_time->intertime_name}}@endif</td>
    									<td>{{$item->description}}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'company::view' ) )
    									    <a href="{{route('company::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin cơ sở thực tập"><span class="glyphicon glyphicon-eye-open"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'company::edit' ) )
    									    <a href="{{route('company::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'company::delete' ) )
    									    <a href="{{route('company::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
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
	           		alert("Xóa cơ sở thực tập thành công!");
	              window.location.reload(); 
	           });
	       } else {
	       	return false;
	       }
        });
        
    })(jQuery);
</script>
@stop