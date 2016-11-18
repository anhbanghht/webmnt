<script>
	$(".form-control.time-mask").inputmask('h:s', {placeholder: 'hh:mm'});
	$(".case").spinner({min: 1,max:15});
	$(".number").spinner({min: 1});
	$(":input").inputmask();
</script>
<input type="hidden" name="workid" value="<?php echo $work->id;?>">
<div class="card panel expanded">
	<div class="card-head" data-toggle="collapse" data-parent="#creat-work-task" data-target="#creat-work-task-1" aria-expanded="true">
		<header><?php echo $work->work_name;?></header>
		<div class="tools">
			<a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
		</div>
	</div>
	<div id="creat-work-task-1" class="collapse in" aria-expanded="true">
		<div class="card-body">
			<p>
				<div class="table-responsive">
					<table class="table table-hover assigns-table">
						<thead>
							<tr>
								<th>{{ trans('languages.add-task') }}</th>
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
								<th>{{ trans('languages.date') }}</th>
							</tr>
						</thead>
						<tbody class="add-task-all-site" >
							<tr class="creat-work-child task-1">
								<td><a href="javascript:void(0)" onclick="DoanListView.addNewTasks(this,<?php echo $work->id;?>,'1')" id="add-task"></a></td>
								<td>
									<div class="form-group floating-label">
										<input type="text" value="" name="task[]" class="form-control" style="width: 200px; height: 40px;" id="nametask<?php echo $work->id;?>">
										<label for="nametask<?php echo $work->id;?>">Tên nhiệm vụ</label>
									</div>
								</td>
								<td>
									<div class="form-group floating-label">
										<textarea rows="10" cols="50" name="description[]" class="form-control" style="width: 235px; height: 40px;" id="descriptiontask<?php echo $work->id;?>"></textarea>
										<label for="descriptiontask<?php echo $work->id;?>">Mô tả</label>
									</div>
								</td>
								<td>
									<div class="form-group floating-label">
										<input type="text" name="case[]" class="form-control case" style="width:50px;">
									</div>
								</td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<input type="checkbox" onclick="DoanListView.choosethis(this,'alltime')">
											<span></span>
										</label>
									</div>
									<input type="hidden" name="alltime[]" value="0" id="alltime">
								</td>
								<td>
									<div class="form-group floating-label">
										<input type="text" name="start[]" class="form-control time-mask" onkeyup="DoanListView.checkdate(this,'start_time')" style="width:80px;" id="start_time">
										<p class="help-block">Thời gian: 24h</p>
									</div>
								</td>
								<td>
									<div class="form-group floating-label">
										<input type="text" name="end[]" class="form-control time-mask" onchange="DoanListView.checkdate(this,'end_time')" style="width:80px;" id="end_time">
										<p class="help-block">Thời gian: 24h</p>
									</div>
								</td>
								<td>
									<div class="form-group floating-label">
										<input type="text" value="" name="location[]" class="form-control" style="width: 200px; height: 40px;" id="locationtask<?php echo $work->id;?>">
										<label for="locationtask<?php echo $work->id;?>">Địa điểm</label>
									</div>
								</td>
								
								<td>
									<div class="form-group floating-label">
										<textarea rows="10" cols="50" name="notes[]" class="form-control" style="width: 235px; height: 40px;" id="notetask<?php echo $work->id;?>"></textarea>
										<label for="notetask<?php echo $work->id;?>">Ghi chú</label>
									</div>
								</td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<input type="checkbox" onclick="DoanListView.choosethis(this,'important')">
											<span></span>
										</label>
									</div>
									<input type="hidden" name="important[]" value="0" id="important">
								</td>
								<td>
									<div class="checkbox checkbox-styled tile-text">
										<label>
											<input type="checkbox" onclick="DoanListView.choosethis(this,'expected')">
											<span></span>
										</label>
									</div>
									<input type="hidden" name="expected[]" value="0" id="expected">
								</td>
								<td>
									<input type="hidden" name="calendar[]" value="0" id="calendar">
								</td>
								<td>
									<div class="form-group floating-label">
										<input type="text" name="number[]" value="1" class="form-control number" style="width:70px;">
									</div>
								</td>
								<td>
									<div class="form-group">
										<input type="text" name="date[]" onkeyup="DoanListView.checkdate(this,'start_date')" class="form-control date" data-inputmask="'alias': 'date'" style="width:100px;">
										<p class="help-block">dd/mm/YY</p>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</p>
		</div>
	</div>
</div>
<a href="javascript:void(0)" onclick="DoanFormView.saveTask()" ><button type="button" class="btn btn-block save-task-this">Chấp Thuận</button></a>