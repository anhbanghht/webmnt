@extends('layouts.default')
@section('add_links')
<li>
	<p>Quản lý site. \\</p>
</li>
<li>
	<p>Quản lý thể loại. \\</p>
</li>
<li>
	<a href="{{ route('site::geteditcategory',$item->id)}}" style="color:blue;">Sửa thể loại</a>
</li>
@stop
@section('active_category')
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
<?php if(isset($message)): ?>
<script>
	alert('<?php echo $message;?>');
</script>
<?php endif;?>
<section>
	<!-- BEGIN ADVANCED VALIDATION -->
	<div class="row">
		<div class="col-lg-12">
			<h4>Cập nhật thể loại</h4>
		</div><!--end .col -->
		<div class="col-lg-offset-1 col-md-8">
			<form method="post" action="{{ route('site::posteditcategory',$item->id) }}" class="form form-validate floating-label adminform" novalidate="novalidate">
				<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
				<input type="hidden" name="state" value="<?php echo $item->state;?>">
				<input type="hidden" name="created_by" value="<?php echo $item->created_by;?>">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<input type="text" value="<?php echo $item->title;?>" class="form-control" id="title" name="title" data-rule-minlength="10" maxlength="255" required="" aria-required="true">
							<label for="title">Tên thể loại</label>
							<p class="help-block">Minimum length 10 / Maximum length 255</p>
						</div>
						<div class="form-group">
							<textarea name="description" id="description" class="form-control" rows="3"><?php echo $item->description;?></textarea>
							<label for="description">Mô tả</label>
						</div>
					</div><!--end .card-body -->
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<a href="{{route('site::listcategory')}}"  class="btn btn-flat btn-primary ink-reaction">Cancel<a>
							<button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
						</div>
					</div>
				</div><!--end .card -->
				<em class="text-caption">Quản lý thể loại</em>
			</form>
		</div><!--end .col -->
	</div><!--end .row -->
	<!-- END ADVANCED VALIDATION -->
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