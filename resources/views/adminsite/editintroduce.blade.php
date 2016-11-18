@extends('layouts.default')
@section('add_links')
<li>
	<p>Quản lý site. \\</p>
</li>
<li>
	<a href="{{ route('site::geteditintroduce',$item->id)}}" style="color:blue;">Quản lý giới thiệu</a>
</li>
@stop
@section('active_introduce')
class="active"
@stop
@section('addtional-css')

		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/summernote/summernote.css')}}" />

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
			<h4>Quản lý Giới Thiệu</h4>
		</div><!--end .col -->
		<div class="col-lg-offset-1 col-md-8">
			<form method="post" action="{{ route('site::posteditintroduce',$item->id) }}" enctype="multipart/form-data" class="form adminform">
				<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
				<input type="hidden" name="state" value="1">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<textarea id="ckeditor" name="content" class="form-control control-12-rows" placeholder="Enter text ..."><?php echo $item->content;?></textarea>
							<label for="ckeditor">Nội dung</label>
						</div>
					</div><!--end .card-body -->
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<a href="{{route('site::listarticle')}}"  class="btn btn-flat btn-primary ink-reaction">Hủy<a>
							<button type="submit" class="btn btn-flat btn-primary ink-reaction">Lưu</button>
						</div>
					</div>
				</div><!--end .card -->
				<em class="text-caption">Quản lý Giới Thiệu</em>
			</form>
		</div><!--end .col -->
	</div><!--end .row -->
	<!-- END ADVANCED VALIDATION -->
</section>
@stop
@section('addtional-js-lib')
		<script src="{{asset('public/assets/js/libs/ckeditor/ckeditor.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/ckeditor/adapters/jquery.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/summernote/summernote.min.js')}}"></script>

@stop

@section('addtional-js')
		<script src="{{asset('public/assets/js/core/demo/Demo1.js')}}"></script>
		<script src="{{asset('public/assets/js/core/demo/DemoFormEditors.js')}}"></script>

		<script src="{{asset('public/assets/js/jquery-duong.js')}}"></script>
		<script>
			var message = {token: "<?php echo csrf_token();?>"}; 
		</script>
@stop