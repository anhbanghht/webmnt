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
		
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/style-duong.css')}}" />
		
@stop
@section('add_links')
<li>
	<p>Quản lý nhiệm vụ. \\</p>
</li>
<li>
	<a href="{{ route('assign::listfile')}}" style="color:blue;">Danh sách file</a>
</li>
@stop
@section('active_insert_file')
class="active"
@stop
@section('content')
<section class="style-default-bright">
	<div class="section-header">
		
		<h2 class="text-primary">Quản Lý File</h2>
		<div class="col-lg-12">
			<article class="margin-bottom-xxl">
				<p>Danh sách file công việc có định dạng được đưa lên.</p>
			</article>
		</div>
	</div>
	<div class="section-body">

		<!-- BEGIN DATATABLE 1 -->
		<!--div class="row">
			<div class="col-md-8">
				<article class="margin-bottom-xxl">
					<p class="lead">
						DataTables is a plug-in for the jQuery Javascript library.
						It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.
					</p>
				</article>
			</div><!--end .col -->
		<!--/div><!--end .row -->
		<div class="row">
			<div class="col-md-12">
				<h4>Danh Sách File</h4>
			</div><!--end .col -->
			<div class="col-lg-12">
				<div class="table-responsive">
					<form enctype="multipart/form-data" class="form form-validate floating-label adminform" accept-charset="UTF-8" action="javascript:void(0)" method="POST">
						<?php echo csrf_field(); ?>
						<table id="datatable1" class="table table-striped table-hover">
							<thead>
								<tr>
									<th>{{ trans('languages.id') }}</th>
									<th>{{ trans('languages.work') }}</th>
									<th>{{ trans('languages.file') }}</th>
									<th>{{ trans('languages.datecreated') }}</th>
									<th>{{ trans('languages.delete') }}</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($items as $item): ?>
								<tr>
									<td><?php echo $item->id;?></td>
									<td>
										<a href="javascript:void(0)">
											<?php foreach($types as $t):?>
												<?php if($item->typeid == $t->id): echo $t->type_name; endif;?>
											<?php endforeach;?>
										</a>
									</td>
									<td><a href="{{ url('uploads/'.$item->file_name)}}"><?php echo $item->file_name; ?></a></td>
									<td><?php echo $item->created_at; ?></td>
									<td>
										<a href="javascript:void(0)" onclick="DoanListView.DeleteItem('sendfiles',{{ $item->id }})">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>    
								<?php endforeach; ?>
							</tbody>
						</table>
					</form>
				</div><!--end .table-responsive -->
			</div><!--end .col -->
		</div><!--end .row -->
		<!-- END DATATABLE 1 -->
		<div class="add-table">
			<a href="{{route('assign::sendfile')}}" id="add"></a>
		</div>
		<hr class="ruler-xxl"/>
		
	</div><!--end .section-body -->
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
@stop