@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Tiến độ thực hiện đề tài</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
        	    <form method="POST">
    			<div class="card">
    				<div class="card-body">
    				        {{ csrf_field() }}
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
    								<tr>
    									<th width="100px">Hoàn thành</th>
    									<th width="500px">Nội dung tiến độ</th>
    									<th width="200px">Mô tả</th>
    									<th width="200px">Kết quả</th>
    									<th width="200px">Ghi chú</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $process as $item )
    							    <tr>
    									<td width="100px" style="vertical-align:top" class="checkbox checkbox-styled">
    									    <label>
    									        <input type="checkbox" name="process[{{$item->id}}]" value="{{$item->id}}" @if($item->complete) checked @endif />
    									    </label>
    									</td>
    									<td width="500px" style="vertical-align:top">{{$item->content}}</td>
    									<td width="200px" style="vertical-align:top">{{$item->description}}</td>
    									<td width="200px" style="vertical-align:top">{{$item->result}}</td>
    									<td width="200px" style="vertical-align:top">
    									    <textarea name="note[{{$item->id}}]">{{$item->note}}</textarea>
    									</td>
    								</tr>
    							    @endforeach
    							</tbody>
    						</table>
    					</div><!--end .table-responsive -->
    				</div><!--end .card-body -->
    				<div class="card-actionbar">
    					<div class="card-actionbar-row">
    						<button type="submit" class="btn ink-reaction btn-primary">Cập nhật</button>
    						<a class="btn ink-reaction btn-primary" href="{{ URL::previous() }}">back</a>
    					</div>
    				</div>
    			</div><!--end .card -->
    			</form>
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