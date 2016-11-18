<?php if($yes == 1):?>
<div class="form-group">
	<input type="file" name="file" class="inputfile" id="file">								
	<label for="file">Đính Kèm *</label>
	<p class="help-block">Lựa chọn file dữ liệu</p>
</div>
<div class="card-actionbar">
	<div class="card-actionbar-row">
		<button type="submit" class="btn btn-flat btn-primary ink-reaction">Lưu</button>
	</div>
</div>
<?php else:?>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<textarea name="description" id="description" class="form-control" rows="3"></textarea>
			<p class="help-block">Mô tả</p>
		</div>
		<div class="form-group">
			<textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
			<p class="help-block">Chú thích</p>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<input type="text" name="work_name" id="workname" class="form-control">
			<p class="help-block">Tên công việc</p>
		</div>
		<div class="form-group">
			<select id="select-year" name="year" class="form-control" required="" aria-required="true">
				<?php for($i=2014; $i<=2999;$i++):?> 
				<option value="<?php echo $i.'-'.($i+1); ?>" <?php if(($i+1) == date('Y')):?> selected <?php endif;?>><?php echo $i.'-'.($i+1); ?></option>
				<?php endfor; ?>
			</select>
			<p class="help-block">Chọn năm</p>
		</div>
		<div class="form-group">
			<select id="select-semester" name="semesterid" class="form-control" required="" aria-required="true">
				<?php foreach($semesters as $item):?> 
					<option value="<?php echo $item->id; ?>"><?php echo $item->semester_name; ?></option>
				<?php endforeach; ?>
			</select>
			<p class="help-block">Chọn kỳ</p>
		</div>
	</div>
</div>
<div class="card-actionbar">
	<div class="card-actionbar-row">
		<a href="javascript:void(0)" onclick="DoanFormView.saveWork()"><button type="button" class="btn btn-block save-process-this">Lưu</button></a>
	</div>
</div>
<?php endif;?>