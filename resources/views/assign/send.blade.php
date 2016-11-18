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
	<a href="{{ route('assign::sendfile')}}" style="color:blue;">Gửi dữ liệu</a>
</li>
@stop
@section('active_insert_file')
class="active"
@stop
@section('content')
<?php if(isset($message)):?>
	<script>
		alert('<?php echo $message;?>');
		window.location.href = "sendfile";
	</script>
<?php endif;?>
<section>
	<div class="section-body contain-lg">

		<!-- BEGIN ADVANCED VALIDATION -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="text-primary">Gửi dữ liệu</h1>
			</div>
			<div class="col-lg-8">
				<article class="margin-bottom-xxl">
					<p class="lead">Giao diện nhập dữ liệu lên hệ thống trong quản lý nhiệm vụ.</p>
				</article>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body ">
						<div id="rootwizard2" class="form-wizard form-wizard-horizontal">
							<form method="post" action="{{ route('assign::savefilework') }}" class="form floating-label form-validation adminworkform" role="form" novalidate="novalidate" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
								<div class="form-wizard-nav">
									<div class="progress" style="width: 75%;"><div class="progress-bar progress-bar-primary" style="width: 0%;"></div></div>
									<ul class="nav nav-justified nav-pills">
										<li class="active"><a href="#step1" data-toggle="tab" aria-expanded="true"><span class="step">1</span> <span class="title">Loại Công việc</span></a></li>
										<li class=""><a href="#step2" data-toggle="tab" aria-expanded="false"><span class="step">2</span> <span class="title">Dữ liệu công việc</span></a></li>
									</ul>
								</div><!--end .form-wizard-nav -->
								<div class="tab-content clearfix">
									<div class="tab-pane active" id="step1">
										<div class="form-group">
											<select onchange="DoanFormView.changeTypeWork(this)" id="select-type-work" class="form-control" required="" aria-required="true">
												<?php foreach($types as $item):?> 
												<option value="<?php echo $item->id; ?>"><?php echo $item->type_name; ?></option>
												<?php endforeach; ?>
											</select>
											<label for="select-type-work">Chọn loại công việc</label>
										</div>
									</div><!--end #step1 -->
									<div class="tab-pane" id="step2">
										<input type="hidden" name="typeid" id="load-type-id" value="1">
										<div class="send-type-form">
											<div class="form-group">
												<input type="file" name="file" class="inputfile" id="file">								
												<label for="file">Đính Kèm *</label>
												<p class="help-block">Lựa chọn file dữ liệu</p>
											</div>
											<div class="card-actionbar">
												<div class="card-actionbar-row">
													<button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
												</div>
											</div>
										</div>
									</div><!--end #step2 -->
								</div><!--end .tab-content -->
								<ul class="pager wizard">
									<li class="next"><a class="btn-raised" href="javascript:void(0);">Tiếp Theo</a></li>
								</ul>
								<input type="hidden" name="state" value="1">
							</form>
						</div>
					</div><!--end .card-body -->
				</div>
			</div>
		</div><!--end .row -->
		<!-- END ADVANCED VALIDATION -->

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
