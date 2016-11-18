@extends('layouts.default')

@section('content')
<section>

    <div class="section-body contain-lg">
    	<div class="row">
      <form class="form" method="post">
        {{csrf_field()}}
        	<div class="col-lg-12">
    			<div class="card card-underline">
			    <div class="card-head card-head-lg">
					<header>Điểm tổng kết của sinh viên trong hội đồng <span style="color: #311B92;font-weight: bold;">{{$council->name}}</span> đợt <span style="color: #311B92;font-weight: bold;">{{$council->council_group->name}}</span></header>
					<div class="tools">
						<div class="btn-group">
              <a class="btn btn-icon-toggle btn-primary" href="{{ route('council::listCouncilDetail',['council_id'=>$council_id]) }}"  data-toggle="tooltip" data-placement="top" data-original-title="Nhập điểm"><i class="fa fa-plus"></i></a>
							<a class="btn btn-icon-toggle btn-primary" href="{{ URL::previous() }}"  data-toggle="tooltip" data-placement="top" data-original-title="Trở lại"><i class="fa fa-undo"></i></a>
						</div>
					</div>
				</div>
    				<div class="card-body">
    					<div class="table-responsive">
    						<table id="datatable1" class="table no-margin">
    							<thead>
    								<tr>
  										<th>Mã sinh viên</th>
  										<th>Tên sinh viên</th>
  										<th>Đề tài</th>
  										<th>GVHD</th>
                      <th>Điểm GVHD</th>
                      <th>Điểm GVPB</th>
                      <th>Điểm hội đồng</th>
    								</tr>
    							</thead>
    							<tbody>
    								@foreach($students as $item)
    									<tr>
    										<td>
    											{{$item->intertime_students->student->student_id}}
    										</td>
    										<td>
    											{{$item->intertime_students->student->student_name}}
    										</td>
    										<td>
    											@if($item->intertime_students->topics){{$item->intertime_students->topics->topic_name}}@endif
    										</td>
    										<td>
    											@if($item->intertime_students->teacher){{$item->intertime_students->teacher->teacher_name}}@endif
    										</td>
                        <td><input type="text" name="gvhd[{{$item->id}}]" class="form-control" value="@if($item->point){{json_decode($item->point)->gvhd}}@endif"></input></td>
                        <td><input type="text" name="gvpb[{{$item->id}}]" class="form-control" value="@if($item->point){{json_decode($item->point)->gvpb}}@endif"></input></td>
                        <td><input type="text" name="tket[{{$item->id}}]" class="form-control" value="@if($item->point){{json_decode($item->point)->tket}}@endif"></input></td>
    									</tr>
    								@endforeach
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
    				</div><!--end .card-body -->
            <div class="card-actionbar">
              <div class="card-actionbar-row">
                <button class="btn ink-reaction btn-primary" id="add_to_list">Cập nhật danh sách</button>
              </div>
            </div>
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