@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Quản lý thông tin hội đồng trong nhóm	
							<select name="council_group" id="council_group" onchange="window.location.href=this.value">
	    				        <option value="{{route('council::')}}" @if(!$council_group_id) selected @endif >-- Tất cả --</option>
	    				        @foreach( $council_group as $opt )
	    				        <option value="{{route('council::',['id'=>$opt->id])}}" @if($opt->id == $council_group_id) selected @endif >{{$opt->name}}</option>
	    				        @endforeach
	    				    </select>
						</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'council::add' ) )
            				        <a href="{{route('council::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm hội đồng"><span class="fa fa-plus"></span></a>
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
    									<th>Tên hội đồng</th>
    									<th>Tên nhóm hội đồng</th>
    									<th>Thời gian bắt đầu</th>
    									<th>Thời gian kết thúc</th>
    									<th>Địa điểm</th>
    									<th>Ghi chú</th>
    									<th>Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $council as $key => $item )
    							    <tr>
    									<td>{{$key+1}}</td>
    									<td>{{$item->name}}</td>
    									<td>@if($item->council_group){{$item->council_group->name}} @endif</td>
    									<td>{{ Date('Y/m/d H:i',strtotime($item->startdate)) }}</td>
    									<td>{{ Date('Y/m/d H:i',strtotime($item->enddate)) }}</td>
    									<td>{{$item->place}}</td>
    									<td>{{$item->note}}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'council::view' ) )
    									    <a href="{{route('council::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin hội đồng"><span class="glyphicon glyphicon-eye-open"></span></a>
    									    @endif
                                            @if( \Auth::user()->has_permission( 'council::addCouncilDetail' ) )
                                            <a href="{{route('council::addCouncilDetail',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm danh sách sinh viên trong hội đồng"><span class="md md-format-list-numbered"></span></a>
                                            @endif
    									    @if( \Auth::user()->has_permission( 'council::listCouncilDetail' ) )
    									    <a href="{{route('council::listCouncilDetail',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách sinh viên trong hội đồng"><span class="glyphicon md-recent-actors"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'council::edit' ) )
    									    <a href="{{route('council::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Sửa"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'council::delete' ) )
    									    <a href="{{route('council::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" data-original-title="Xóa"></span></a>
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