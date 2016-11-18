@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Danh sách thông tin đợt thực tập  trong năm học <span style="color: #311B92;font-weight: bold;">
						    <select name="year" id="year" onchange="window.location.href=this.value">
    				        <option value="{{route('intership_time::')}}" @if(!$year_id) selected @endif >-- Tất cả --</option>
    				        @foreach( $year as $opt )
    				        <option value="{{route('intership_time::',['id'=>$opt->id])}}" @if($opt->id == $year_id) selected @endif >{{$opt->year}}</option>
    				        @endforeach
    				    </select></span>
						</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'intership_time::add' ) )
            				        <a href="{{route('intership_time::add',['year_id'=>$year_id])}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm đợt thực tập"><span class="fa fa-plus"></span></a>
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
    									<th>Loại thực tập</th>
    									<th>Đợt thực tập</th>
    									<th>Năm học</th>
    									<th>Ngày bắt đầu</th>
    									<th>Ngày kết thúc</th>
    									<th width="350px">Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $intership_time as $key => $item )
    							    <tr>
    									<td>{{$key+1}}</td>
    									<td>{{$item->intership_type->intertype_name	}}</td>
    									<td>{{$item->intertime_name	}}</td>
    									<td>{{$item->year->year}}</td>
    									<td>{{ Date('d/m/Y',strtotime($item->startdate)) }}</td>
    									<td>{{ Date('d/m/Y',strtotime($item->enddate)) }}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'intership_time::view' ) )
    									    <a href="{{route('intership_time::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin đợt thực tập"><span class="glyphicon glyphicon-eye-open"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'intership_time::listStudent' ) )
    									    <a href="{{route('intership_time::listStudent',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách tổng hợp đề tài"><span class="glyphicon md-recent-actors"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'job::' ) )
    									    <a href="{{route('job::',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách công việc"><span class="md md-format-list-numbered"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'council::' ) )
    									    <a href="{{route('council::',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách hội đồng"><span class="md md-group"></span></a>
    									    @endif
                                            @if( \Auth::user()->has_permission( 'intership_time::allowStudent' ) )
                                            <a href="{{route('intership_time::allowStudent',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Nhận xét, đánh giá đề tài thực tập"><span class="fa fa-file-text-o"></span></a>
                                            @endif
    									    @if( \Auth::user()->has_permission( 'intership_time::edit' ) )
    									    <a href="{{route('intership_time::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
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