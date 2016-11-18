<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/summernote/summernote.css')}">
<div class="modal-content">
	<div class="modal-header">
  		<button type="button" class="close" data-dismiss="modal">&times;</button>
  		<h4 class="modal-title">Trả lời phản hồi</h4>
   	</div>
    <div class="modal-body">
    	<form method="post" class="feedbackform">
    		<?php echo csrf_field(); ?>
     		<input type="hidden" name="feedbackid" value="<?php echo $id;?>">
			<div class="form-group">
				<input type="text" id="email" readonly name="email" class="form-control control-12-rows" value="<?php echo $feedback->email?>">
				<p class="help-block">Tới</p>
			</div>
			<div class="form-group">
				<input type="text" id="subject" readonly name="subject" class="form-control control-12-rows" value="<?php echo $feedback->subject?>">
				<p class="help-block">Tiêu đề</p>
			</div>
			<div class="form-group">
				<textarea id="ckeditor" name="message" class="form-control control-12-rows" placeholder="Enter text ...">
					<p>Thân gửi <?php echo $feedback->name;?></p>
					<br/>
					<p>Xin chân thành cảm ơn!</p>
				</textarea>
				<p class="help-block">Nội dung</p>
			</div>
		</form>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default feedback-send" onclick="DoanListView.thisReply(<?php echo $id;?>)">Save</button>
      	<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>
    </div>
</div>
<script src="{{asset('public/assets/js/libs/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/assets/js/libs/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('public/assets/js/libs/summernote/summernote.min.js')}}"></script>
<script src="{{asset('public/assets/js/core/demo/DemoFormEditors.js')}}"></script>