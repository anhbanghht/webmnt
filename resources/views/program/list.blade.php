@extends('layouts.default')

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Danh sách môn học</h1>
    				
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    				    @if( \Auth::user()->has_permission( 'program::add' ) )
    				    <a href="{{route('program::add')}}" class="btn ink-reaction btn-primary"><span class="fa fa-plus"></span></a>
    					@endif
    					 <select class="select1" name="program" id="program" onchange="window.location.href=this.value">
    				        <option value="{{route('program::')}}" @if(!$id_programs) selected @endif >-- Tất cả --</option>
    				        @foreach( $program1 as $pro )
    				        <option value="{{route('program::',['id_programs'=>$pro->id])}}" @if($pro->id == $id_programs) selected @endif >{{$pro->name}}</option>
    				        @endforeach
    				    </select>
    					<div class="table-responsive">
    						<table class="table no-margin" id="datatable1">
    							<thead>
        							<tr>
        								<th>STT</th>
                						<th>Tên môn học</th>
                						<th>Số tín chỉ</th>
                						<th>TCTH</th>
                						<th>Học kỳ</th>
                						<th>Chương trình đào tạo</th>
                						<th>Bộ môn</th>
                						<th>Đơn vị</th>
                						<th>Ghi chú</th>
                						<th>Thực hiện</th>
        							</tr>
    							</thead>
    							<tbody>
    				    @foreach( $program as $item )
    				    <tr>
    						<td>{{$item->id}}</td>
    						 
    								<td>{{$item->subject_name}} </td>
    								<td> {{$item->number}} </td>
    								<td> {{$item->number_practice}} </td>
    								<td> {{$item->semester}} </td>
    								<td><?php foreach($program1 as $p):
    									    if($item->id_programs==$p->id):
    									        echo $p->name;?>
    									 <?php endif;
    									 endforeach; ?></td>
    								<td><div class="checkbox checkbox-inline checkbox-styled">
    										<label>
    											<input type="checkbox" name="id_department" <?php if($item->id_department==1): echo "checked"; endif; ?>><span></span>
    										</label>
    							        </div>
    						        </td>
    								<td><?php foreach($department as $d):
    									    if($item->id_department==$d->id):
    									        echo $d->department_name;?>
    									 <?php endif;
    									 endforeach; ?>
    								 </td>
    						
    						<td>{{$item->note}}</td>
    						<td>
    						    @if( \Auth::user()->has_permission( 'program::edit' ) )
    						    <a href="{{route('program::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    						    @endif
    						    @if( \Auth::user()->has_permission( 'program::delete' ) )
    						    <a href="{{route('program::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
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
<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/huyen.css')}}" />
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
