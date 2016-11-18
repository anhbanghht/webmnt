<script>
$('#assigntable').DataTable({
	"dom": 'CT<"clear">lfrtip',
	"tableTools": {
		"sSwfPath": "../public/assets/js/libs/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
	},
	"order": [],
	"colVis": {
		"buttonText": "Columns",
		"overlayFade": 0,
		"align": "right"
	},
	"language": {
		"lengthMenu": '_MENU_ entries per page',
		"search": '<i class="fa fa-search"></i>',
		"paginate": {
			"previous": '<i class="fa fa-angle-left"></i>',
			"next": '<i class="fa fa-angle-right"></i>'
		}
	}
});
$('#datatable1').DataTable({
			"dom": 'lCfrtip',
			"order": [],
			"colVis": {
				"buttonText": "Columns",
				"overlayFade": 0,
				"align": "right"
			},
			"language": {
				"lengthMenu": '_MENU_ entries per page',
				"search": '<i class="fa fa-search"></i>',
				"paginate": {
					"previous": '<i class="fa fa-angle-left"></i>',
					"next": '<i class="fa fa-angle-right"></i>'
				}
			}
		});
</script>

<div class="card-body tab-content">
	<div class="tab-pane <?php if($tab=="assignyes"): echo "active"; endif;?>" id="assignyes" data-value="assignyes">
		<div class="table-responsive">
			<table id="assigntable" class="table table-striped table-hover assigns-table display" cellspacing="0">
				<thead>
					<tr>
						<th>{{ trans('languages.id') }}</th>
						<th style="display:none;">{{ trans('languages.work') }}</th>
						<th style="display:none;"></th>
						<th>{{ trans('languages.task') }}</th>
						<th>{{ trans('languages.description') }}</th>
						<th>{{ trans('languages.case') }}</th>
						<th>{{ trans('languages.alltime') }}</th>
						<th>{{ trans('languages.start') }}</th>
						<th>{{ trans('languages.end') }}</th>
						<th>{{ trans('languages.location') }}</th>
						<th>{{ trans('languages.note') }}</th>
						<th>{{ trans('languages.important') }}</th>
						<th>{{ trans('languages.expected') }}</th>
						<th>{{ trans('languages.calendar') }}</th>
						<th>{{ trans('languages.number') }}</th>
						<th>{{ trans('languages.assign') }}</th>
						<th>{{ trans('languages.action') }}</th>
						<th>{{ trans('languages.date') }}</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($items as $item):?>
						<?php $count=0;?>
						<?php 
							foreach($assignyes as $task):
								if($task->workid == $item->id): $count++; endif;
							endforeach;
						?>
						<?php $num=0; ?>
						<?php foreach($assignyes as $task): 
							if($task->workid == $item->id): $num++;
						?>	
							<tr class="list-work-task">	
							<?php //if($num==1):?>
								<!--td rowspan="<?php echo $count;?>"><span><?php echo $item->id; ?></span></td>
								<td rowspan="<?php echo $count;?>"><a href="javascript:void(0)"><?php echo $item->work_name; ?></a></td-->
							<?php //else: ?>
								<td><span><?php echo $task->id; ?></span></td>
								<td style="display:none;" ><a href="javascript:void(0)"><?php echo $item->work_name; ?></a></td>
							<?php //endif;?>
								<td rowspan="<?php echo $count;?>" style="display:none"><span><?php echo Helps::getTypeWork($item->typeid)->type_name; ?></span></td>
								<td><span><?php echo $task->task_name; ?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'tasknameval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td><span><?php echo $task->description; ?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'descriptionval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td><span><?php if($task->case != 0 ): echo $task->case; endif; ?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'caseval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->alltime != 0 ): ?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'alltime',<?php echo $task->id;?>)" <?php if($item->typeid == 1): echo "disabled"; endif;?>>
											<?php else: ?>
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'alltime',<?php echo $task->id;?>)" <?php if($item->typeid == 1): echo "disabled"; endif;?>>
											<?php endif; ?>
											<span></span>
										</label>
									</div>
								</td>
								<td><span><?php echo $task->start;?></span></td>
								<td><span><?php echo $task->end;?></span></td>
								<td><span><?php echo $task->location;?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'locationval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td><span><?php echo $task->notes;?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'noteval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->important != 0 ): ?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'important',<?php echo $task->id;?>)">
											<?php else: ?>
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'important',<?php echo $task->id;?>)">
											<?php endif;?>
											<span></span>
										</label>
									</div>
								</td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->expected != 0 ):?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'expected',<?php echo $task->id;?>)">
											<?php else:?> 
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'expected',<?php echo $task->id;?>)">
											<?php endif; ?>
											<span></span>
										</label>
									</div>	
								</td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->calendar != 0 ):?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'calendar',<?php echo $task->id;?>)">
											<?php else: ?>
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'calendar',<?php echo $task->id;?>)">
											<?php endif;?>
											<span></span>
										</label>
									</div>
								</td>
								<td>
									<span><?php echo $task->number;?></span>
									<a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'numberval',<?php echo $task->id;?>)">
										<i class="fa fa-pencil"></i>
									</a>
								</td>
								<td>
									<span><?php echo $task->assign;?></span>
									<a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'assignval',<?php echo $task->id;?>)">
										<i class="fa fa-pencil"></i>
									</a>
								</td>
								<td>
									<span>
										<div class="dd nestable-list">
											<ol class="dd-list">
												<?php $i=0;?>
												<?php foreach($action as $a) : 
														if($a->taskid == $task->id): $i++;?>
													<li data-id="<?php echo $i; ?>" class="dd-item ms-hover">
														<div class="dd-handle btn btn-default-light" <?php if(Helps::checkSendEmail($task->id,$a->teacherid)):?> style="color:green;" <?php endif;?>>
															<?php echo Helps::getTeacher($a->teacherid)->teacher_name;?>
														</div>
													</li>
												<?php 	endif;
													endforeach;?>
											</ol>
										</div>
									</span>
								</td>
								<td>
									<span><?php if($task->date != ''): $date=str_replace('/','-',$task->date); echo date('d-m-Y',strtotime($date)); else: echo '00-00-0000'; endif;?></span>
									<!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'dateval',<?php echo $task->id;?>)">
										<i class="fa fa-pencil"></i>
									</a-->
								</td>
							</tr>
						<?php endif;
						endforeach;?> 
					<?php endforeach;?>
				</tbody>
			</table>
		</div><!--end .table-responsive -->
	</div>
	<div class="tab-pane <?php if($tab=="assignno"): echo "active"; endif;?>" id="assignno" data-value="assignno">
		<div class="table-responsive">
		<form enctype="multipart/form-data" novalidate="novalidate" class="form floating-label adminform" accept-charset="UTF-8" action="javascript:void(0)" method="POST">
			<?php echo csrf_field(); ?>
			<table id="datatable1" class="table table-striped table-hover assigns-table display" cellspacing="0">
				<thead>
					<tr>
						<th>{{ trans('languages.id') }}</th>
						<th style="display:none;">{{ trans('languages.work') }}</th>
						<th style="display:none;"></th>
						<th>{{ trans('languages.task') }}</th>
						<th>{{ trans('languages.description') }}</th>
						<th>{{ trans('languages.case') }}</th>
						<th>{{ trans('languages.alltime') }}</th>
						<th>{{ trans('languages.start') }}</th>
						<th>{{ trans('languages.end') }}</th>
						<th>{{ trans('languages.location') }}</th>
						<th>{{ trans('languages.note') }}</th>
						<th>{{ trans('languages.important') }}</th>
						<th>{{ trans('languages.expected') }}</th>
						<th>{{ trans('languages.calendar') }}</th>
						<th>{{ trans('languages.number') }}</th>
						<th>{{ trans('languages.assign') }}</th>
						<th>{{ trans('languages.action') }}</th>
						<th>{{ trans('languages.date') }}</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($items as $item):?>
						<?php $count=0;?>
						<?php 
							foreach($assignno as $task):
								if($task->workid == $item->id): $count++; endif;
							endforeach;
						?>
						<?php $num=0; ?>
						<?php foreach($assignno as $task): 
							if($task->workid == $item->id): $num++;
						?>	
							<tr class="list-work-task">	
							<?php //if($num==1):?>
								<!--td rowspan="<?php echo $count;?>"><span><?php echo $item->id; ?></span></td>
								<td rowspan="<?php echo $count;?>"><a href="javascript:void(0)"><?php echo $item->work_name; ?></a></td-->
							<?php// else: ?>
								<td><span><?php echo $task->id; ?></span></td>
								<td style="display:none;"><a href="javascript:void(0)"><?php echo $item->work_name; ?></a></td>
							<?php //endif;?>
								<td rowspan="<?php echo $count;?>" style="display:none"><span><?php echo Helps::getTypeWork($item->typeid)->type_name; ?></span></td>
								<td><span><?php echo $task->task_name; ?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'tasknameval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td><span><?php echo $task->description; ?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'descriptionval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td><span><?php if($task->case != 0 ): echo $task->case; endif; ?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'caseval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->alltime != 0 ): ?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'alltime',<?php echo $task->id;?>)" <?php if($item->typeid == 1): echo "disabled"; endif;?>>
											<?php else: ?>
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'alltime',<?php echo $task->id;?>)" <?php if($item->typeid == 1): echo "disabled"; endif;?>>
											<?php endif; ?>
											<span></span>
										</label>
									</div>
								</td>
								<td><span><?php echo $task->start;?></span></td>
								<td><span><?php echo $task->end;?></span></td>
								<td><span><?php echo $task->location;?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'locationval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td><span><?php echo $task->notes;?></span><!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'noteval',<?php echo $task->id;?>)"><i class="fa fa-pencil"></i></a--></td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->important != 0 ): ?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'important',<?php echo $task->id;?>)">
											<?php else: ?>
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'important',<?php echo $task->id;?>)">
											<?php endif;?>
											<span></span>
										</label>
									</div>
								</td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->expected != 0 ):?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'expected',<?php echo $task->id;?>)">
											<?php else:?> 
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'expected',<?php echo $task->id;?>)">
											<?php endif; ?>
											<span></span>
										</label>
									</div>	
								</td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<?php if($task->calendar != 0 ):?>
												<input type="checkbox" value="1" checked="checked" onclick="DoanListView.choosevalue(this,'calendar',<?php echo $task->id;?>)" <?php if($task->assign == 0): echo "disabled"; endif;?>>
											<?php else: ?>
												<input type="checkbox" value="1" onclick="DoanListView.choosevalue(this,'calendar',<?php echo $task->id;?>)" <?php if($task->assign == 0): echo "disabled"; endif;?>>
											<?php endif;?>
											<span></span>
										</label>
									</div>
								</td>
								<td>
									<span><?php echo $task->number;?></span>
									<a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'numberval',<?php echo $task->id;?>)">
										<i class="fa fa-pencil"></i>
									</a>
								</td>
								<td>
									<span><?php echo $task->assign;?></span>
									<a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'assignval',<?php echo $task->id;?>)">
										<i class="fa fa-pencil"></i>
									</a>
								</td>
								<td>
									<span>
										<div class="dd nestable-list">
											<ol class="dd-list">
												<?php $i=0;?>
												<?php foreach($action as $a) : 
														if($a->taskid == $task->id): $i++;?>
													<li data-id="<?php echo $i; ?>" class="dd-item ms-hover">
														<div class="dd-handle btn btn-default-light" <?php if(Helps::checkSendEmail($task->id,$a->teacherid)):?> style="color:green;" <?php endif;?>>
															<?php echo Helps::getTeacher($a->teacherid)->teacher_name;?>
														</div>
													</li>
												<?php 	endif;
													endforeach;?>
											</ol>
										</div>
									</span>
								</td>
								<td>
									<span><?php if($task->date != ''): $date=str_replace('/','-',$task->date); echo date('d-m-Y',strtotime($date)); else: echo '00-00-0000'; endif;?></span>
									<!--a href="javascript:void(0)" id="edit_this_task" data-toggle="modal"  data-target="#this_task_modal" onclick="DoanListView.clickme(this,'dateval',<?php echo $task->id;?>)">
										<i class="fa fa-pencil"></i>
									</a-->
								</td>
							</tr>
						<?php endif;
						endforeach;?> 
					<?php endforeach;?>
				</tbody>
			</table>
		</form>
		</div><!--end .table-responsive -->
	</div>
</div><!--end .card-body -->