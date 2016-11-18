@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Chương trình đào tạo</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    				    <a href="{{route('program1::add')}}" class="btn ink-reaction btn-primary"><span class="fa fa-plus"></span></a>
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Tên chương trình</th>
    									<th>Chi tiết</th>
    									<th>Ghi chú</th>
    									<th>Thực hiện</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @if( $program1->isEmpty() )
    							    <tr>
    									<td rowspan="10">Không có bản ghi nào!</td>
    								</tr>
    							    @else
    							    @foreach( $program1 as $item )
    							    <tr>
    									<td>{{$item->id}}</td>
    									<td>{{$item->name}} </td>
    									<td> {{$item->chitiet}} </td>
    									<td> {{$item->note}} </td>
    									<td>
    									    @if( \Auth::user()->has_permission( 'program1::edit' ) )
    									    <a href="{{route('program1::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'program1::delete' ) )
    									    <a href="{{route('program1::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
    									    @endif
    									</td>
    								</tr>
    							    @endforeach
    								@endif
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
    })(jQuery);
</script>
@stop