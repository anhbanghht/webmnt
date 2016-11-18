@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Quản lý công việc trong đợt<span style="color: #311B92;font-weight: bold;">
							<select name="job" id="job" onchange="window.location.href=this.value">
	    				        <option value="{{route('job::')}}" @if(!$intertime_id) selected @endif >-- Tất cả --</option>
	    				        @foreach( $intership_time as $opt )
	    				        <option value="{{route('job::',['intertime_id'=>$opt->id])}}" @if($opt->id == $intertime_id) selected @endif >{{$opt->intertime_name}}</option>
	    				        @endforeach
	    				    </select></span>
						</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'job::add' ) )
            				        <a href="@if(!isset($intertime_id)){{route('job::add')}}@else {{route('job::add',['id'=>$intertime_id])}} @endif" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm công việc"><span class="fa fa-plus"></span></a>
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
    									<th>Tên công việc</th>
    									<th>Đợt thực tập</th>
    									<th>Ngày bắt đầu</th>
    									<th>Ngày kết thúc</th>
    									<th>Địa điểm</th>
    									<th>Mô tả</th>
    									<th>Quan trọng</th>
    									<th>Cả ngày</th>
    									<th width="150px">Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $job as $key => $item )
    							    <tr>
    									<td>{{$key+1}}</td>
    									<td>{{$item->job_name}}</td>
    									<td>{{$item->intership_time->intertime_name	}}</td>
    									<td>{{ Date('Y/m/d',strtotime($item->startdate)) }}</td>
    									<td>{{ Date('Y/m/d',strtotime($item->enddate)) }}</td>
    									<td>{{$item->location}}</td>
    									<td>{{$item->description}}</td>
    									<td>{{$item->impor}}</td>
    									<td>{{$item->alld}}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'job::view' ) )
    									    <a href="{{route('job::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Nội dung công việc"><span class="glyphicon glyphicon-eye-open"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'job::edit' ) )
    									    <a href="{{route('job::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Sửa"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'job::delete' ) )
    									    <a href="{{route('job::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" data-original-title="Xóa"></span></a>
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