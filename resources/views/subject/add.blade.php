@extends('layouts.default')
@section('content')
<section>
	<div class="section-header">
		<ol class="breadcrumb">
			<li class="active">Gửi Dữ Liệu</li>
		</ol>
	</div>
	<div class="section-body contain-lg">

		<!-- BEGIN ADVANCED VALIDATION -->
		<div class="row">
			<div class="card">
				<div class="card-body ">
						<form  action="{{ route('subject::postadd') }}" class="form floating-label form-validation adminworkform" role="form" novalidate="novalidate" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo csrf_token();?>">
							<input type="file" name="file">
							<input type="hidden" name="state" value="1">
							<input type="submit" name="ok">
						</form>
				</div><!--end .card-body -->
			</div>		
		</div><!--end .row -->
		<!-- END ADVANCED VALIDATION -->

	</div><!--end .section-body -->
</section>
@stop