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
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/huyen.css')}}" />
		
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
				<h1 class="text-primary">Import dữ liệu</h1>
			</div>
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body "> 
						<form method="post" action="{{ route('managerfile::savework') }}" class="form floating-label form-validation adminworkform" role="form" novalidate="novalidate" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
							 
							<div class="form-group">
								<select name="type_work" id="select-type-work" class="form-control" required="" aria-required="true">
									@foreach($program as $p)
                                                   <option value="{{$p->id}}">{{$p->name}}</option>  
                                           @endforeach
									<option value="11">Phân công Giảng dạy</option>
									<option value="12">Thời khóa biểu</option>
								</select>
								<label for="select-type-work">Select type data</label>
							</div>
							<div class="form-group">
								<input type="file" name="file" class="inputfile" id="file">								
								<label for="file">Đính Kèm *</label>
							</div>
							<div class="card-actionbar">
								<div class="card-actionbar-row">
									<button type="submit" class="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
								</div>
							</div>
							<input type="hidden" name="state" value="1">
						</form> 
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
		 
		<script>
			var message = {token: "<?php echo csrf_token();?>"}; 
		</script>
@stop
