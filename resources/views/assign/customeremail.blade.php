<script>
	$('#optgrouptask').multiSelect();
	$('#optgroupteacher').multiSelect();
	
</script>
<div class="modal-content">
	<div class="modal-header">
  		<button type="button" class="close" data-dismiss="modal">&times;</button>
  		<h4 class="modal-title">Gửi mail</h4>
   	</div>
    <div class="modal-body">
    	<form method="post" class="customer-send-email">
    		<?php echo csrf_field(); ?>
			<label>Nội dung sẽ gửi</label>
			<select id="optgrouptask" name="listtask[]" multiple="multiple">
				<optgroup label="Danh sách công việc">
				<?php foreach($tasks as $t):?>
					<option value="<?php echo $t->id; ?>"><?php echo $t->task_name;?></option>
				<?php endforeach;?>
				</optgroup>
			</select>
			<br/>
			<label>Gửi tới</label>
			<select id="optgroupteacher" name="listteacher[]" multiple="multiple">
				<optgroup label="Danh sách giảng viên">
				<?php foreach($teachers as $t):?>
					<option value="<?php echo $t->id; ?>"><?php echo $t->teacher_name;?></option>
				<?php endforeach;?>
				</optgroup>
			</select>
		</form>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default task-save send-mail-customer-this" onclick="DoanListView.sendCustomerMail()">Gửi</button>
      	<button type="button" class="btn btn-default task-close" data-dismiss="modal">Hủy</button>
    </div>
</div>