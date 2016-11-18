<?php 
	$ar_id=array();
	foreach($assigned as $a):
		$ar_id[]=$a->teacherid;
	endforeach;
	if($ar_id!=null): $count_action = count($ar_id); else: $count_action = 0; endif;
?>
<script>
	var maxval = <?php echo $maxassign ?>;
	$('#optgroup').multiSelect();
	$("#slider-range").slider({ value: <?php echo $count_action;?>, min: 0, max: maxval });
	$('#slider-range').slider( 'disable');
	var this_val_assign = parseInt($("#this-value-range").val());
	var count_assign = <?php echo $count_action;?>;
	if(this_val_assign == maxval){
		$(".ms-elem-selectable").addClass("disabled");
	}
		
	$('#optgroup').bind('change', function() {
		var foo = []; 
		$('#optgroup :selected').each(function(i, selected){ 
		  foo[i] = $(selected).text();
		});
		if(count_assign < foo.length){
			this_val_assign ++;
			if(this_val_assign <= maxval){
				$( "#slider-range" ).slider( "value", this_val_assign );
			}else{
				this_val_assign --;
			}
			$("#this-value-range").val(this_val_assign);
		}else{
			this_val_assign --;
			if(this_val_assign >= 0){
				$( "#slider-range" ).slider( "value", this_val_assign );
			}else{
				this_val_assign++;
			}
			$("#this-value-range").val(this_val_assign);
		}
		count_assign = foo.length;
		if(this_val_assign >= maxval){
			$(".ms-elem-selectable").addClass("disabled");
		}else{
			$(".ms-elem-selectable").removeClass("disabled");
		}
	});
	
</script>
<?php 
	$list_teacher_busy=array(); $list_teacher_notbusy=array();
	foreach($teachers as $t):
		if(in_array($t->id,$teacher_busy)):
			$list_teacher_busy[]=$t;
		else:
			$list_teacher_notbusy[]=$t;
		endif;
	endforeach;
?>
<div class="modal-content">
	<div class="modal-header">
  		<button type="button" class="close" data-dismiss="modal">&times;</button>
  		<h4 class="modal-title">Thay đổi phân công</h4>
   	</div>
    <div class="modal-body">
    	<form method="post" class="updatetaskform">
    		<?php echo csrf_field(); ?>
     		<div class="form-group">
				<div class="input-group">
					<input type="hidden" name="assign" id="this-value-range" value="<?php echo $count_action;?>">
					<div class="input-group-addon">0</div>
					<div class="input-group-content">
						<div id="slider-range"></div>
					</div>
					<div class="input-group-addon"><?php echo $maxassign; ?></div>
				</div>
			</div>
			<select id="optgroup" name="assignteacher[]" multiple="multiple">
				<optgroup label="Giảng Viên Đang Bận trong thời gian này">
				<?php foreach($list_teacher_busy as $t):?>
					<option value="<?php echo $t->id; ?>" <?php if(in_array($t->id,$ar_id)): echo "selected='selected'"; endif;?>><?php echo $t->teacher_name;?></option>
				<?php endforeach;?>	
				</optgroup>
				<optgroup label="Giảng Viên Rảnh trong thời gian này">
				<?php foreach($list_teacher_notbusy as $t):?>	
					<option value="<?php echo $t->id; ?>" <?php if(in_array($t->id,$ar_id)): echo "selected='selected'"; endif;?>><?php echo $t->teacher_name;?></option>
				<?php endforeach;?>
				</optgroup>
			</select>
		</form>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis(<?php echo $taskid;?>)">Lưu</button>
      	<button type="button" class="btn btn-default task-close" data-dismiss="modal">Hủy</button>
    </div>
</div>