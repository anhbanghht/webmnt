<h2 style="font-weight: bold;">
	Công việc cần thực hiện trong thời gian tới.
</h2>
<?php 
if($setting==0):
	foreach($assigned as $a):
		if($a->teacherid==$teacherid):
		$part_teacher=Helps::getAssignTeacher($a->id);
		$list_teacher_name=array();
		foreach($part_teacher as $p):
			$list_teacher_name[]=Helps::getTeacher($p->teacherid)->teacher_name;
		endforeach;
		$teacher_name=implode(', ',$list_teacher_name);
		$type_exam=Helps::getSubjectType($a->task_name);
		?>
		<div style="width:99%;padding:5px;display:table;width:100%;margin:5px;display:block;border:1px solid #ccc">
			<b><?php echo $a->task_name;?></b>&nbsp;Ca (<?php if($a->alltime == 0): echo $a->start." - ".$a->end; endif;?>) 
			<?php if($type_exam!=null): echo $type_exam->type_exam; endif;?>
			<br>
			Thời gian:
			<?php 
				if($a->alltime == 0): 
					echo " ".date('d.m.Y',strtotime($a->date))." ".$a->start." - ".$a->end;
				else:
					echo " ".date('d.m.Y',strtotime($a->start))." - ".date('d.m.Y',strtotime($a->end));
				endif;
			?>
			<br>
			Địa điểm: <?php echo $a->location;?><br>
			Thực hiện: <?php echo $teacher_name;?> <br>
		</div>
		<?php
		endif;
	endforeach;
else:
	foreach($taskid as $id):
		$task=Helps::getCustomerTableOnly($id,'tasks');
		$part_teacher=Helps::getAssignTeacher($id);
		$list_teacher_name=array();
		foreach($part_teacher as $p):
			$list_teacher_name[]=Helps::getTeacher($p->teacherid)->teacher_name;
		endforeach;
		$teacher_name=implode(', ',$list_teacher_name);
		$type_exam=Helps::getSubjectType($task->task_name);
		?>
		<div style="width:99%;padding:5px;display:table;width:100%;margin:5px;display:block;border:1px solid #ccc">
			<b><?php echo $task->task_name;?></b>&nbsp;Ca (<?php if($task->alltime == 0): echo $task->start." - ".$task->end; endif;?>)
			<?php if($type_exam!=null): echo $type_exam->type_exam; endif;?>	
			<br>
			Thời gian:
			<?php 
				if($task->alltime == 0): 
					echo " ".date('d.m.Y',strtotime($task->date))." ".$task->start." - ".$task->end;
				else:
					echo " ".date('d.m.Y',strtotime($task->start))." - ".date('d.m.Y',strtotime($task->end));
				endif;
			?>
			<br>
			Địa điểm: <?php echo $task->location;?><br>
			Thực hiện: <?php echo $teacher_name;?> <br>
		</div>
		<?php
	endforeach;
endif;
 ?>
<p><span style="font-weight: bold;">Tb:</span> Em xin chân thành gửi lời xin lỗi tới quý Thầy Cô vì sự bất cập này.</p>
<p>Em đang thực hiện công đoạn test cuối cùng về gửi mail nhiệm vụ mới tới các Thầy Cô.</p>
<p>Để đồng bộ với code em không thể ngăn cản việc gửi tin nhắn này tới Quý Thầy Cô.</p>
<p>Em Mong Thầy Cô Thông Cảm và bỏ qua Email này.</p>
<p>Em chân thành cảm ơn!</p>
