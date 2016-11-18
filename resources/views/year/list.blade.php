@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Quản lý thông tin đợt thực tập trong năm học</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'year::add' ) )
            				        <a href="{{route('year::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm năm học"><span class="fa fa-plus"></span></a>
            				    @endif
								<a class="bstn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
							</div>
						</div>
					</div>
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
    								<tr>
                                        <th>STT</th>
    									<th>Năm học</th>
    									<th>Ngày bắt đầu</th>
    									<th>Năm hiện tại</th>
    									<th width="300px">Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $year as $key => $item )
    							    <tr>
                                        <td>{{$key+1}}</td>
    									<td>{{$item->year}}</td>
    									<td>{{ Date('d/m/Y',strtotime($item->startdate)) }}</td>
    									<td>@if(\App\Year::isCurrent($item)) <span class="md md-check-box"></span> @else <span class="md md-check-box-outline-blank"></span> @endif</td>
    									<td>
                                            @if( \Auth::user()->has_permission( 'year::view' ) )
                                            <a href="{{route('year::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin năm học"><span class="glyphicon glyphicon-eye-open"></span></a>
                                            @endif
    									    @if( \Auth::user()->has_permission( 'plan::' ) )
    									    <a href="{{route('plan::',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách kế hoạch"><span class="fa fa-file-o"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'intership_time::' ) )
    									    <a href="{{route('intership_time::',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Đợt thực tập"><span class="glyphicon glyphicon-th-list"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'year::edit' ) )
    									    <a href="{{route('year::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Sửa"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'year::delete' ) )
    									    <a href="{{route('year::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" data-original-title="Xóa"></span></a>
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