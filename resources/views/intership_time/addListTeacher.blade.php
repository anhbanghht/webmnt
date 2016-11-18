@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
    	<div class="row">
           <div class="col-md-12">
        		<form class="form" method="post">
        		    {{ csrf_field() }}
        			<div class="card card-underline">
					    <div class="card-head card-head-lg">
							<header>Phân công GVHD, GVPB trong đợt <span style="color: #311B92;font-weight: bold;">{{ $intership_time->intertime_name }}</span></header>
						</div>
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
    								<tr>
    								    <th class="hidden"></th>
    								    <th>#</th>
    									<th>Mã sinh viên</th>
    									<th>Tên sinh viên</th>
    									<th>Lớp</th>
    									<th>GVHD</th>
    									@if($intership_time->intership_type->id==4)
                                        <th>GVPB</th>
                                        @endif
    								</tr>
    							</thead>
    							<tbody>
    							    @if( $students->isEmpty() )
    							    <tr>
    									<td colspan="6">Không có bản ghi nào!</td>
    								</tr>
    							    @else
    							    @foreach( $students as $key => $item )
    							    <tr>
    							        <td class="hidden"><input type="checkbox" name="ids[]" value="{{$item->id}}" checked/></td>
    									<td>{{$key+1}}</td>
    									<td>{{$item->student->student_id}}</td>
    									<td>{{$item->student->student_name}}</td>
    									<td>{{$item->student->class_name}}</td>
    									<td><select id="teacher_id" name="teacher_id[]" class="form-control">
    									        <option value=""> -- Chọn GVHD -- </option>
            									@foreach($teacher as $row)
            										<option value="{{$row->id}}" @if($row->id==$item->teacher_id) selected @endif> {{$row->teacher_name}}</option>
            									@endforeach
    										</select>
    									</td>
                                        @if($intership_time->intership_type->id==4)
    									<td><select id="teacher_reviewer" name="teacher_reviewer[]" class="form-control">
    									        <option value=""> -- Chọn GVPB -- </option>
            									@foreach($teacher as $row)
            										<option value="{{$row->id}}" @if($row->id==$item->teacher_reviewer) selected @endif> {{$row->teacher_name}}</option>
            									@endforeach
    										</select>
    									</td>
                                        @endif
    								</tr>
    							    @endforeach
    								@endif
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
    					<div class="card-actionbar">
                			<div class="card-actionbar-row">
                				<input type="submit" class="btn ink-reaction btn-primary" value="Cập nhật" />
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
        $('.remove-btn').click(function(e){
           e.preventDefault();
           var link = $(e.currentTarget).attr('href');
           $.ajax({
               url: link,
               data: '_token='+token,
               method: 'POST'
           }).done(function(data){
              window.location.reload(); 
           });
        });
        var old = null;
        $('#teacher_reviewer').focus(function(e){
            old = $(this).val();
        }).change(function(e){
            if( $('#teacher_id').val() == $(this).val() ){
                alert('GVPB và GVHD không được trùng nhau!');
                $(this).val(old);
            }
            return true;
        });
        $('#teacher_id').focus(function(e){
            old = $(this).val();
        }).change(function(e){
            if( $('#teacher_reviewer').val() == $(this).val() ){
                alert('GVPB và GVHD không được trùng nhau!');
                $(this).val(old);
            }
            return true;
        });
    })(jQuery);
</script>
@stop