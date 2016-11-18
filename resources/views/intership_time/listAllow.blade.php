@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card card-underline">
			    <div class="card-head card-head-lg">
					<header>Nhận xét đánh giá sinh viên <span style="color: #311B92;font-weight: bold;">{{ $intership_time->intertime_name }}</span></header>
					<div class="tools">
						<div class="btn-group">
							<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
						</div>
					</div>
				</div>
    			    <form method="POST">
                    {{csrf_field()}}
    				<div class="card-body">
    					<div class="table-responsive">
    						<table id="datatable1" class="table no-margin">
    							<thead>
    								<tr><th>STT</th>
    									<th>Mã sinh viên</th>
    									<th>Tên sinh viên</th>
    									<th>Lớp</th>
    									<th>Tên đề tài</th>
                                        <th>Tiến độ</th>
    									<th>GVHD</th>
                                        @if($intership_time->intership_type->id==4)
    									<th>GVPB</th>
                                        @endif
    									<th>Cho phép báo cáo</th>
                                        <th>Lý do</th>
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
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input class="form-control" id="allow" name="allow[{{$item->id}}]" type="checkbox" value="1" @if($item->allow) checked @endif />
                                                </label>
                                            </div>                           
                                        </td>
                                        <td>
                                            <textarea name="note[{{$item->id}}]">{{$item->note}}</textarea>
                                        </td>
    								</tr>
    							    @endforeach
    								
    							</tbody>
    						</table>
    						
    					</div><!--end .table-responsive -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button class="btn ink-reaction btn-primary" type="submit">Cập nhật</button>
                            </div>
                        </div>
    				</div><!--end .card-body -->
                    </form>
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
        
    })(jQuery);
</script>
@stop