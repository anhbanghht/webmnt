@extends('layouts.default')
@section('add_links')
<li>
	<p>Quản lý site. \\</p>
</li>
<li>
	<p>Quản lý thể loại. \\</p>
</li>
<li>
	<a href="{{ route('site::listcategory')}}" style="color:blue;">Danh sách thể loại</a>
</li>
@stop
@section('active_category_list')
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
		<h2 class="text-primary">Quản Lý Thể Loại</h2>
	</div>
	<div class="section-body">
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
									<th>{{ trans('languages.categoryname') }}</th>
									<th>{{ trans('languages.description') }}</th>
									<th>{{ trans('languages.categorydate') }}</th>
									<th>{{ trans('languages.edit') }}</td>
									<th>{{ trans('languages.delete') }}</td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($items as $item): ?>
								<tr>
									<td><?php echo $item->id;?></td>
									<td>
										<a href="javascript:void(0)">
											<?php echo $item->title;?>
										</a>
									</td>
									<td><?php echo $item->description;?></td>
									<td><?php echo $item->created_at; ?></td>
									<td>
										<a href="{{route('site::geteditcategory',$item->id)}}" >
											<i class="fa fa-pencil"></i>
										</a>
									</td>
									<td>
										<a href="javascript:void(0)" onclick="DoanListView.DeleteItem('category',<?php echo $item->id;?>)">
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
			<a class="btn ink-reaction btn-primary" href="{{route('site::getaddcategory')}}"><span class="fa fa-plus"></span></a>
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