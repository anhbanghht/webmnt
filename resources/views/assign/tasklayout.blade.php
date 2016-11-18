<tr class="task-{{ $task }}">
	<td><a href="javascript:void(0)" onclick="DoanListView.addNewTasks(this,{{ $id }},{{ $task }})" id="add-task"></a></td>
	<td>
		<div class="form-group floating-label">
			<input type="text" value="" name="task[]" class="form-control" style="width: 200px; height: 40px;" id="nametask{{ $id }}">
			<label for="nametask{{ $id }}">Tên nhiệm vụ</label>
		</div>
	</td>
	<td>
		<div class="form-group floating-label">
			<textarea rows="10" cols="50" name="description[]" class="form-control" style="width: 235px; height: 40px;" id="descriptiontask{{ $id }}"></textarea>
			<label for="descriptiontask{{ $id }}">Mô tả</label>
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
			<input type="text" value="" name="location[]" class="form-control" style="width: 200px; height: 40px;" id="locationtask{{ $id }}">
			<label for="locationtask{{ $id }}">Địa điểm</label>
		</div>
	</td>
	
	<td>
		<div class="form-group floating-label">
			<textarea rows="10" cols="50" name="notes[]" class="form-control" style="width: 235px; height: 40px;" id="notetask{{ $id }}"></textarea>
			<label for="notetask{{ $id }}">Ghi chú</label>
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