@extends('layouts.default')
@section('add_links')
<li>
	<p>Quản lý phản hồi. \\</p>
</li>
<li>
	<a href="{{ route('site::inbox')}}" style="color:blue;">Danh sách phản hồi</a>
</li>
@stop
@section('active_Inbox')
class="active"
@stop
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
		
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/style-duong.css')}}" />
		
@stop
@section('content')
<section class="style-default-bright">
	<div class="section-header">
		<h2 class="text-primary">Quản Lý Phản Hồi</h2>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<h4>Danh Sách Phản Hồi</h4>
			</div><!--end .col -->
			<div class="col-lg-12">
				<div class="table-responsive">
					<form enctype="multipart/form-data" class="form form-validate floating-label adminform" accept-charset="UTF-8" action="javascript:void(0)" method="POST">
						<?php echo csrf_field(); ?>
						<table id="inbox-box" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>{{ trans('languages.id') }}</th>
									<th>{{ trans('languages.email') }}</th>
									<th>{{ trans('languages.subject') }}</th>
									<th>{{ trans('languages.message') }}</th>
									<th>{{ trans('languages.reply') }}</th>
									<th>{{ trans('languages.state') }}</th>
									<th>{{ trans('languages.datecreate') }}</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($items as $item): ?>
								<tr>
									<td><?php echo $item->id;?></td>
									<td>
										<a href="javascript:void(0)" <?php if($item->state==0):?> onclick="DoanListView.replyFeedBack(<?php echo $item->id;?>)" <?php endif;?>>
											<?php echo $item->email;?>
										</a>
									</td>
									<td><?php echo $item->subject;?></td>
									<td><?php echo $item->message;?></td>
									<td><?php echo $item->reply;?></td>
									<td>
										<div class="checkbox checkbox-styled">
											<label>
												<input type="checkbox" disabled <?php if($item->state==1): echo "checked"; endif;?>>
											</label>
										</div>
									</td>
									<td><?php echo $item->created_at; ?></td>
								</tr>    
								<?php endforeach; ?>
							</tbody>
						</table>
					</form>
				</div><!--end .table-responsive -->
			</div><!--end .col -->
		</div><!--end .row -->
		<!-- END DATATABLE 1 -->
		<hr class="ruler-xxl"/>
		
	</div><!--end .section-body -->
	<!-- Modal -->
  	<div class="modal fade" id="feedback_modal" role="dialog">
    	<div class="modal-dialog view-modal-feedback">
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
		<script src="{{asset('public/assets/js/core/demo/Demo.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery-duong.js')}}"></script>
		<script>
			var message = {token: "<?php echo csrf_token();?>"}; 
		</script>
		<script>
			$('#inbox-box').DataTable({
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