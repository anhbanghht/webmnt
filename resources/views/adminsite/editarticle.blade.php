@extends('layouts.default')
@section('add_links')
<li>
	<p>Quản lý site. \\</p>
</li>
<li>
	<p>Quản lý bài viết. \\</p>
</li>
<li>
	<a href="{{ route('site::geteditarticle',$item->id)}}" style="color:blue;">Sửa bài viết</a>
</li>
@stop
@section('active_article')
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
			<h4>Thêm bài viết</h4>
		</div><!--end .col -->
		<div class="col-lg-offset-1 col-md-8">
			<form method="post" action="{{ route('site::posteditarticle',$item->id) }}" enctype="multipart/form-data" class="form adminform">
				<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
				<input type="hidden" name="state" value="1">
				<input type="hidden" name="created_by" value="1">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
							<input type="text" class="form-control" id="title" name="title" value="<?php echo $item->title;?>">
							<label for="title">Tên bài viết</label>
						</div>
						<div class="form-group">
							<select id="categoryid" name="categoryid" class="form-control">
								<?php foreach($categorys as $cat): ?>
									<option value="<?php echo $cat->id; ?>" <?php if($cat->id==$item->categoryid): echo "selected"; endif;?>><?php echo $cat->title;?></option>
								<?php endforeach;?>
							</select>
							<label for="categoryid">Thể loại</label>
						</div>
						<div class="form-group">
							<textarea name="description" id="description" class="form-control" rows="3"><?php echo $item->description;?></textarea>
							<label for="description">Mô tả</label>
						</div>
						<div class="form-group">
							<textarea id="ckeditor" name="content" class="form-control control-12-rows" placeholder="Enter text ..."><?php echo $item->content;?></textarea>
							<label for="ckeditor">Nội dung</label>
						</div>
						<div class="form-group">
							<input type="file" name="image" id="image">
							<label for="image">Ảnh</label>
							<?php if($item->image!=''):?><img src="{{ url('uploads/images/'.$item->image) }}" style="width:100px;"><?php endif;?>
						</div>
						<div class="form-group">
							<input type="file" name="attach" id="attach">
							<label for="attach">Đính kèm</label>
							<?php if($item->attached!=''):?><a href="{{ url('uploads/images/'.$item->attached) }}"><?php echo $item->attached;?></a><?php endif;?>
						</div>
					</div><!--end .card-body -->
					<div class="card-actionbar">
						<div class="card-actionbar-row">
							<a href="{{route('site::listarticle')}}"  class="btn btn-flat btn-primary ink-reaction">Cancel<a>
							<button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
						</div>
					</div>
				</div><!--end .card -->
				<em class="text-caption">Quản lý bài viết</em>
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