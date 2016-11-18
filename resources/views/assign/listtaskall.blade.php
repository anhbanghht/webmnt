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
	<a href="{{ route('assign::listassignall')}}" style="color:blue;">Danh sách nhiệm vụ</a>
</li>
@stop
@section('active_task_all')
class="active"
@stop
@section('content')
<section class="style-default-bright">
	<div class="section-header">
		<h2 class="text-primary">Phân Công Nhiệm Vụ</h2>
		<div class="col-lg-12">
			<article class="margin-bottom-xxl">
				<p>Bảng phân công nhiệm vụ, thực hiện phân công nhiệm vụ và gửi cho từng giảng viên.</p>
			</article>
		</div>
	</div>
	<div class="section-body">

		<!-- BEGIN DATATABLE 1 -->
		<div class="row">
			<div class="col-md-8">
				<!--button type="button" class="btn btn-flat btn-primary" onclick="DoanListView.assignReset()">Reset</button-->
				<button type="button" class="btn btn-flat btn-primary" onclick="DoanListView.assignToday('null')">Hôm nay</button>
				<button type="button" class="btn btn-flat btn-primary" onclick="DoanListView.assignToweek('null')">7 Ngày tiếp theo</button>
				<button type="button" class="btn btn-flat btn-primary" onclick="DoanListView.assignTomonth('null')">Tháng hiện tại</button>
				<div class="form-group">
					<div class="input-daterange input-group" id="demo-date-range">
						<div class="input-group-content">
							<input type="text" class="form-control" id="filter-this-form">
							<label>Từ</label>
						</div>
						<span class="input-group-addon">Đến</span>
						<div class="input-group-content">
							<input type="text" class="form-control" id="filter-this-to">
							<div class="form-control-line"></div>
						</div>
						<button type="button" class="btn btn-flat btn-primary" onclick="DoanListView.filterdate(this,'null')">Lọc</button>
					</div>
				</div>
			</div><!--end .col -->
		</div><!--end .row -->
		<div class="row">
			<div class="col-md-12 send-mail-this">
				<a class="tile-content ink-reaction" href="javascript:void(0)" onclick="DoanListView.settingsend()" style="float:right;" id="send-mail-setting"></a>
				<a class="tile-content ink-reaction" href="{{route('assign::sendmailall')}}" style="float:right;" id="send-mail"></a>
			</div><!--end .col-->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-head">
						<ul class="nav nav-tabs" data-toggle="tabs">
							<li class="active"><a href="#assignyes">Danh sách phân công</a></li>
							<li class=""><a href="#assignno">Danh sách chưa phân công</a></li>
						</ul>
					</div><!--end .card-head -->
					<div class="card-body tab-content filter-customer-this">
						<div class="tab-pane active" id="assignyes" data-value="assignyes">
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
						<div class="tab-pane" id="assignno" data-value="assignno">
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
				</div><!--end .card -->
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