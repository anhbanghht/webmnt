@extends('layouts.default')

@section('addtional-css')

		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/wizard/wizard.css?1425466601')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/multi-select/multi-select.css?1424887857')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/huyen.css')}}" />
		
@stop

@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Phân công phụ trách môn</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    					@if( \Auth::user()->has_permission( 'responsible::add' ) )
    				   	 <a href="{{route('responsible::add')}}" class="btn ink-reaction btn-primary"><span class="fa fa-plus"></span></a>
    					 @endif
    					<div class="table-responsive">
    						<table class="table no-margin" id="responsive" class="responsible">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Tên môn học</th>
    									<th>Số tín chỉ</th>
    									<th>TCTH</th>
    									<th>Kỳ</th>
    									<th>Môn bắt buộc</th>
    									<th>Ngành</th>
    									<th>Bắt đầu sử dụng</th>
    									<th>Học kỳ</th>
    									<th>Ngân hàng đề</th>
    									<th>Phụ trách NHD</th>
    									<th>Trọng số điểm thi</th>
    									<th>Dề cương</th>
    									<th>Bài giảng</th>
    									<th>Bài tập/thảo luận</th>
    									<th>Chịu trách nhiệm</th>
    									<th>Trạng thái</th>
    									<th>Thời hạn nộp đề cương</th>
    									<th>Thời hạn nộp bài giảng/bài tập</th>
    									<th>Nhóm giáo viên</th>
    									<th>Ghi chú</th>
    									<th>Thực hiện</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @if( $responsible->isEmpty() )
    							    <tr>
    									<td rowspan="5">Không có bản ghi nào!</td>
    								</tr>
    							    @else
    							    @foreach( $responsible as $item )
    							    <?php foreach($subject as $b):
    									  if( $item->id_subject == $b->id & $b->id_department==1):?>	
    							    <tr>
    									<td>{{$item->id}}</td>
    								    
        									    <td>
        									    	<ol class="subject">
        									         	<?php echo $b->subject_name; ?>
    								            	</ol>
        									     </td>
            									<td>
            									     <?php echo $b->number; ?>
            									</td>
            									<td>
            									     <?php  echo $b->number_practice; ?>
            									</td>
            									<td>
            									    <?php  echo $b->semester; ?>
            									</td>
            									
										<td><div class="checkbox checkbox-inline checkbox-styled">
    											<label>
    												<input type="checkbox" name="obligatory" <?php if($item->obligatory==1): echo "checked"; endif; ?>><span></span>
    											</label>
    										</div>
    									</td>
										<td>
    									    <?php foreach($department as $d):?>
    									        <?php if($item->id_department == $d->id): echo $d->department_name; endif;?>
    							            <?php endforeach;?>
								        </td>
    									<td><ol class="date">{{$item->start}}</ol></td>
    									<td>{{$item->semester}}</td>
    									<td><div class="checkbox checkbox-inline checkbox-styled">
    											<label>
    												<input type="checkbox" name="bank" <?php if($item->bank==1): echo "checked"; endif; ?>><span></span>
    											</label>
    										</div>
    									</td>
    									<td>
											<ol class="dd-list">
	    									    <?php foreach($teacher as $c):?>
	    									        <?php if($item->bank_responsible == $c->id):echo $c->teacher_name; endif;?>
									            <?php endforeach;?>
									         </ol>
									    </td>
    									<td>{{$item->weighted_scores}}</td>
    									<td><div class="checkbox checkbox-inline checkbox-styled">
    											<label>
    												<input type="checkbox" name="outline" <?php if($item->outline==1): echo "checked";  endif; ?>><span></span>
    											</label>
    										</div></td>
    									<td><div class="checkbox checkbox-inline checkbox-styled">
    											<label>
    												<input type="checkbox" name="lesson" <?php if($item->lesson==1): echo "checked"; endif; ?>><span></span>
    											</label>
    										</div></td>
    									<td><div class="checkbox checkbox-inline checkbox-styled">
    											<label>
    												<input type="checkbox" name="exercise" <?php if($item->exercise==1): echo "checked"; endif; ?>><span></span>
    											</label>
    										</div>
    									</td>
    									<td>
											<ol class="dd-list">
	    									    <?php foreach($teacher as $c):?>
	    									        <?php if($item->id_teachers == $c->id):echo $c->teacher_name; endif;?>
									            <?php endforeach;?>
									         </ol>
									    </td>
    									<td><ol class="status">{{$item->status}}</ol></td>
    									<td><ol class="date">{{$item->deadline_outline}}</ol></td>
    									<td><ol class="date">{{$item->deadline_lesson}}</ol></td>
    									<td>
										    <span>
												<div class="dd nestable-list" >
													<ol class="dd-list">
														<?php foreach(json_decode($item->id_teacher) as $idt ): ?>
			    									    <?php echo App\Teacher::find($idt)->teacher_name; ?>
			    									    <?php endforeach;?>
													</ol>
												</div>
											</span>
									   </td>
    									<td>{{$item->group}}</td>
    									<td>
    										@if( \Auth::user()->has_permission( 'responsible::edit' ) )
    									    <a href="{{route('responsible::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
    									    @endif
    									    @if( \Auth::user()->has_permission( 'responsible::delete' ) )
    									    <a href="{{route('responsible::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
    										@endif
    									</td>
    								</tr>
    									<?php endif;?>
    									<?php endforeach;?>
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
@section('addtional-js-lib')
		<script src="{{asset('public/assets/js/libs/DataTables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>

		<script src="{{asset('public/assets/js/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/jquery-validation/dist/additional-methods.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
		
		<script src="{{asset('public/assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/multi-select/jquery.multi-select.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/inputmask/jquery.inputmask.bundle.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/dropzone/dropzone.min.js')}}"></script>

@stop
@section('addtional-js')

<script>
   var message = {token: "<?php echo csrf_token();?>"}; 
</script>
<script src="{{asset('public/assets/js/jquery-duong.js')}}"></script>
<script>
    (function($){
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
<script>
		$('#responsive').DataTable({
			"dom": 'CT<"clear">lfrtip',
			"tableTools": {
	            "sSwfPath": "../public/assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
	        },
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

</script>
@stop