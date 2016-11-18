@extends('layouts.default')
@section('addtional-css')

		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/wizard/wizard.css?1425466601')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/multi-select/multi-select.css?1424887857')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864')}}" />
		
		<link type="text/css" rel="stylesheet" href="{{asset('public/assets/css/style-duong.css')}}" />
		
@stop
@section('add_links')
<li>
	<p>Quản lý nhiệm vụ. \\</p>
</li>
<li>
	<a href="{{ route('assign::listwork')}}" style="color:blue;">Quản lý công việc</a>
</li>
@stop
@section('active_work')
class="active"
@stop
@section('content')
<section class="style-default-bright">
	<div class="section-header">
		<h2 class="text-primary">Quản lý công việc</h2>
		<div class="col-lg-12">
			<article class="margin-bottom-xxl">
				<p>Bảng các công việc của bộ môn.</p>
			</article>
		</div>
	</div>
	<div class="section-body">

		<!-- BEGIN DATATABLE 1 -->
		<div class="row">
			<div class="col-md-8">
				<div class="checkbox checkbox-styled tile-text">
					<label>
						<input id="checkallfilter" type="checkbox"  checked="checked" onclick="DoanListView.choseAll(this)" >Tất Cả 
					</label>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<select id="thistypefilter" onchange="DoanListView.filterwork(this)" style="height:30px;">
						<option value="null">--SelectAll--</option>
						<?php foreach($type as $t):?>
							<option value="<?php echo $t->id;?>"><?php echo $t->type_name;?></option>
						<?php endforeach;?>
					</select>
					<label>Phân Loại</label>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<select id="thisyearfilter" onchange="DoanListView.filterwork(this)" style="height:30px;">
						<option value="null">--SelectAll--</option>
						<?php for($i=2014;$i<=9999;$i++):?>
							<option value="<?php echo $i.'-'.($i+1);?>"><?php echo $i.'-'.($i+1);?></option>
						<?php endfor;?>
					</select>
					<label>Năm Học</label>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<select id="thissemesterfilter" onchange="DoanListView.filterwork(this)" style="height:30px;">
						<option value="null">--SelectAll--</option>
						<?php for($i=1;$i<=10;$i++):?>
							<option value="<?php echo $i;?>"><?php echo 'Học kỳ '.$i;?></option>
						<?php endfor;?>
					</select>
					<label>Kỳ Học</label>
				</div>
				<br/>
			</div><!--end .col -->
		</div><!--end .row -->
		<div class="row">
			<div class="col-md-12 send-mail-this">
				<a class="tile-content ink-reaction" href="javascript:void(0)" onclick="DoanListView.settingsend()" style="float:right;" id="send-mail-setting"></a>
				<a class="tile-content ink-reaction" href="{{route('assign::sendmailall')}}" style="float:right;" id="send-mail"></a>
			</div><!--end .col-->
			<div class="col-lg-12">
				<div class="table-responsive filter-work-this">
					<table id="assigntable" class="table table-striped table-hover assigns-table display" cellspacing="0">
						<thead>
							<tr>
								<th>{{ trans('languages.id') }}</th>
								<th>{{ trans('languages.work') }}</th>
								<th>{{ trans('languages.year') }}</th>
								<th>{{ trans('languages.semester') }}</th>
								<th>{{ trans('languages.type') }}</th>
								<th>{{ trans('languages.description') }}</th>
								<th>{{ trans('languages.note') }}</th>
							</tr>
						</thead>
						<tbody>
							
							<?php foreach($items as $item):?>
								<tr class="list-work">	
									<td><span><?php echo $item->id; ?></span></td>
									<td><a href="{{route('assign::listassign',$item->id)}}"><?php echo $item->work_name; ?></a></td>
									<td><?php echo $item->year; ?></td>
									<td><?php $semester=Helps::getCustomerTableOnly($item->semesterid,'semesters'); echo ($semester) ? $semester->semester_name :''; ?></td>
									<td><?php $work_type=Helps::getCustomerTableOnly($item->typeid,'work_types'); echo ($work_type) ? $work_type->type_name :''; ?></td>
									<td><?php echo $item->description; ?></td>
									<td><?php echo $item->notes; ?></td>
								</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div><!--end .table-responsive -->
			</div><!--end .col -->
		</div><!--end .row -->
		<!-- END DATATABLE  -->
	</div><!--end .section-body -->
	
	<!-- Modal -->
  	<div class="modal fade" id="this_task_modal" role="dialog">
    	<div class="modal-dialog view-modal-task-edit">
	     	<!-- Modal content-->
	      	<div class="modal-content">
	        	<div class="modal-header">
	          		<button type="button" class="close" data-dismiss="modal">&times;</button>
	          		<h4 class="modal-title">Modal Header</h4>
	       		</div>
		        <div class="modal-body">
		         	<p>Some text in the modal.</p>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn btn-default task-save">Save</button>
		          	<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>
		        </div>
	      	</div>
   		</div>
  </div>
	
</section>
@stop

@section('addtional-js-lib')
		<script src="{{asset('public/assets/js/libs/DataTables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>

		<script src="{{asset('public/assets/js/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/jquery-validation/dist/additional-methods.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/wizard/jquery.bootstrap.wizard.min.js')}}"></script>
		
		<script src="{{asset('public/assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/multi-select/jquery.multi-select.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/inputmask/jquery.inputmask.bundle.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
		<script src="{{asset('public/assets/js/libs/dropzone/dropzone.min.js')}}"></script>

@stop

@section('addtional-js')
		<script src="{{asset('public/assets/js/core/demo/Demo.js')}}"></script>
		<script src="{{asset('public/assets/js/jquery-duong.js')}}"></script>
		<script>
			var message = {token: "<?php echo csrf_token();?>"}; 
		</script>
@stop