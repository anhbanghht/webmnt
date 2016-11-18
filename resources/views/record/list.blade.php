@extends('layouts.default')



@section('content')
<section>
    <div class="section-body contain-lg">
        <!-- BEGIN INTRO -->
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="text-primary">Hồ sơ giảng dạy</h1>
    			</div><!--end .col -->
    		</div><!--end .row -->
    	<!-- END INTRO -->
    	<div class="row">
        	<div class="col-lg-12">
    			<div class="card">
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table no-margin" id="record" class="record">
    							<thead>
    								<tr>
    									<th>STT</th>
    									<th>Giáo viên</th>
    									<th>Môn học</th>
    									<th>Đề cương</th>
    									<th>Bài giảng</th>
    									<th>Bài tập thảo luận</th>
    									<th>Giáo án</th>
    									<th>Tài liệu tham khảo</th>
    									<th>Ghi chú</th>
    									<th>Thực hiện</th>
    								</tr>
    							</thead>
    							<tbody>
    							    @foreach( $record as $item )
	    							    <tr>
	    									<td>{{$item->id}}</td>		
	    									<td>{{ $item->teachers->teacher_name }} </td>
	    									<td>{{ $item->subjects->subject_name }} </td>
	    									<td><div class="checkbox checkbox-inline checkbox-styled">
	    											<label>
	    													<input type="checkbox" name="outline" <?php if($item->outline!=""): echo "checked"; else: ?> onClick="DoanListView.uploadfile(<?php echo $item->id;?>,'outline')" <?php endif; ?>><span></span>
	    											</label>
	    										</div>
										    </td>
									    	<td><div class="checkbox checkbox-inline checkbox-styled">
	    											<label>
	    												<input type="checkbox" name="lesson_document" <?php if($item->lesson_document!=""): echo "checked"; else: ?> onClick="DoanListView.uploadfile(<?php echo $item->id;?>,'lesson_document')" <?php endif; ?>><span></span>
	    											</label>
	    										</div>
										    </td>
										    <td><div class="checkbox checkbox-inline checkbox-styled">
	    											<label>
	    											    	<input type="checkbox" name="exercise_document" <?php if($item->exercise_document!=""): echo "checked"; else: ?> onClick="DoanListView.uploadfile(<?php echo $item->id;?>,'exercise_document')" <?php endif; ?>><span></span>
	    											</label>
	    										</div>
										    </td>
										    
										    <td><div class="checkbox checkbox-inline checkbox-styled">
	    											<label>
	    											    	<input type="checkbox" name="lesson_plan" <?php if($item->lesson_plan==1): echo "checked";  endif; ?>><span></span>
	    										    </label>
	    										</div>
										    </td>
										    <td>{{$item->document}}</td>
	    									<td>{{$item->note}}</td>
	    									<td>
	    										@if( \Auth::user()->has_permission( 'record::edit' ) )
	    									 	<a href="{{route('record::edit',['id'=>$item->id])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
	    										@endif
	    										@if( \Auth::user()->has_permission( 'record::delete' ) )
	    										<a href="{{route('record::delete',['id'=>$item->id])}}" class="btn ink-reaction btn-primary remove-btn"><span class="glyphicon glyphicon-remove"></span></a>
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
	<!-- Modal -->
  	<div class="modal fade" id="this_upload_file" role="dialog">
  	    <form method="post" class="uploadfileform" action="{{route('record::uploadfile')}}" enctype="multipart/form-data">
    	<div class="modal-dialog view-modal-upload-file">
	     	<!-- Modal content-->
	      	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h4 class="modal-title">Modal Header</h4>
	       		</div>
		        <div class="modal-body">
		         	<p>Some text in the modal.</p>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn btn-default task-save">Save</button>
		          	<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>
		        </div>
	      	</div>
   		</div>
   		</form>
  </div>
</section>
@stop
@section('addtional-css')
	<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/DataTables/jquery.dataTables.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css')}}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css')}}" />
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
		$('#record').DataTable({
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



