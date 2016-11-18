@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
    			    <div class="card-head card-head-lg">
						<header>Danh sách kế hoạch trong năm <span style="color: #311B92;font-weight: bold;">
						    <select name="year" id="year" onchange="window.location.href=this.value">
	    				        <option value="{{route('plan::')}}" @if(!$year_id) selected @endif >-- Tất cả --</option>
	    				        @foreach( $year as $opt )
	    				        <option value="{{route('plan::',['year_id'=>$opt->id])}}" @if($opt->id == $year_id) selected @endif >{{$opt->year}}</option>
	    				        @endforeach
	    				    </select></span>
						</header>
						<div class="tools">
							<div class="btn-group">
							    @if( \Auth::user()->has_permission( 'plan::add' ) )
            				        <a href="{{route('plan::add')}}" class="btn btn-icon-toggle btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thêm kế hoạch"><span class="fa fa-plus"></span></a>
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
    									<th>Tên kế hoạch</th>
    									<th>Năm học</th>
                                        <th>Loại thực tập</th>
    									<th>Ngày bắt đầu</th>
    									<th>Ngày kết thúc</th>
    									<th style="width:200px;">Hành động</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $plan as $key => $item )
    							    <tr @if(!$item->viewed) class="danger" @endif>
    									<td>{{$key+1}}</td>
    									<td>{{$item->plan_name}}</td>
    									<td>@if($item->year){{$item->year->year}}@endif</td>
                                        <td>@if($item->intership_type){{$item->intership_type->intertype_name}}@endif</td>
    									<td>{{ Date('d/m/Y',strtotime($item->startdate)) }}</td>
    									<td>{{ Date('d/m/Y',strtotime($item->enddate)) }}</td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'plan::view' ) )
    									    <a href="{{route('plan::view',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin kế hoạch thực tập"><span class="glyphicon glyphicon-eye-open"></span></a>
    									    @endif
                                            @if( \Auth::user()->has_permission( 'job::' ) )
                                            <a href="{{route('job::',['id'=>$item->id])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Danh sách công việc"><span class="md md-format-list-numbered"></span></a>
                                            @endif
    									    @if( \Auth::user()->has_permission( 'plan::edit' ) )
    									    <a href="{{route('plan::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'plan::delete' ) )
    									    <a href="{{route('plan::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
    									    @endif
    									</td>
    								</tr>
    							    @endforeach
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
    				</div><!--end .card-body -->
    				<div class="card-actionbar">
        					<div class="card-actionbar-row">
        						{{$plan->links()}}
        					</div>
        				</div>
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