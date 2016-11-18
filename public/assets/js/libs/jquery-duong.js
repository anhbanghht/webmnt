//js listview
function DoanListView()
{
	this.parseDate = function(str) {
	  var mdy = str.split('/');
	  return new Date(mdy[2], mdy[1], mdy[0]);
	};
	
	this.DeleteItem = function(el,id){
		var r = confirm("Delete Item");
		var str = $('.adminform').serialize();
		if (r == true) {
			//
			jQuery.ajax({
			   type: "POST",
			   url: el+'/delete',
			   data: str+'&id='+id,
			   success: function(data)
			   {
				   var obj=jQuery.parseJSON(data);
				   if(!obj.error){
					   window.location.href= obj.link;
				   }else{
					   alert('Xóa Thất Bại');
				   }
			   }
			 });
		}else {
		}
	};
	
	this.addNewTasks = function(el,id,task){
		task++;
		var work_name=jQuery(el).parent().parent().find('td:nth-child(2) a').html();
		jQuery.ajax({
			type: "POST",
			url: 'addtask',
			data: 'thistask='+task+'&thisworkid='+id+'&thisworkname='+work_name+'&_token='+message.token,
			success: function(data)
			{
				jQuery(".add-task-all-site .task-"+(task-1)).after(data);
				jQuery(el).parent().parent().find('td:first-child').html('<a onclick="DoanListView.delThisTasks(this)" id="del-task" href="javascript:void(0)">del</a>');
				$(".form-control.time-mask").inputmask('h:s', {placeholder: 'hh:mm'});
				$(".case").spinner({min: 1,max:15});
				$(".number").spinner({min: 1});
				$(":input").inputmask();
			}
		 });
		
	};
	
	this.delThisTasks = function(el,id){
		jQuery(el).parent().parent().remove();
	};
	this.approveTasks = function(){
		var str=jQuery('.adminform').serialize();
		jQuery.ajax({
			   type: "POST",
			   url: '/approve',
			   data: str,
			   success: function(data)
			   {
				   
				   var obj=jQuery.parseJSON(data);
				   if(!obj.error){
						window.location.href= 'works';
				   }else{
					    alert(obj.message);
				   }
				   
			   }
			 });
	};
	
	this.checkdate = function(el,pec){
		var nowdate = new Date();
		if(pec=='start_date'){
			var start = this.parseDate(jQuery(el).val());
			if(nowdate > start){
				var date = nowdate.getDate()+'/0'+(nowdate.getMonth()+1)+'/'+nowdate.getFullYear();
				jQuery(el).val(date);
			}
		}
		
		if(pec=='end_date'){
			var start = jQuery(el).parent().parent().prev('td').find('#start_date').val();
			var end_date = this.parseDate(jQuery(el).val());
			var start_date = this.parseDate(start);
			
			if(end_date < start_date){
				if(start_date < nowdate){
					var date = nowdate.getDate()+'/0'+(nowdate.getMonth()+1)+'/'+nowdate.getFullYear();
					jQuery(el).val(date);
				}
			}
		}
		if(pec=='start_time'){
			jQuery(el).parent().parent().next('td').find('#end_time').val(jQuery(el).val());
		}
		if(pec=='end_time'){
			var start = jQuery(el).parent().parent().prev('td').find('#start_time').val();
			var time_start = start.split(':');
			var end = jQuery(el).val();
			var time_end = end.split(':');
			
			var allms_end 	=	time_end[0]*60+time_end[1];
			var allms_start =	time_start[0]*60+time_start[1];
			if(parseInt(allms_start) > parseInt(allms_end)){
				jQuery(el).val(start);
			}
			
		}
		
		if(pec=='start_date_edit' || pec=='date_edit'){
			var start = this.parseDate(jQuery(el).val());
			if(nowdate > start){
				var date = nowdate.getDate()+'/0'+(nowdate.getMonth()+1)+'/'+nowdate.getFullYear();
				jQuery(el).val(date);
			}
		}
		if(pec=='end_date_edit'){
			var start = jQuery(el).parent().parent().parent().find('#start_date_edit').val();
			var end_date = this.parseDate(jQuery(el).val());
			var start_date = this.parseDate(start);
			
			if(end_date < start_date){
				if(start_date < nowdate){
					var date = nowdate.getDate()+'/0'+(nowdate.getMonth()+1)+'/'+nowdate.getFullYear();
					jQuery(el).val(date);
				}
			}
		}
		if(pec=='start_time_edit'){
			jQuery(el).parent().parent().parent().find('#end_time_edit').val(jQuery(el).val());
		}
		if(pec=='end_time_edit'){
			var start = jQuery(el).parent().parent().parent().find('#start_time_edit').val();
			var time_start = start.split(':');
			var end = jQuery(el).val();
			var time_end = end.split(':');
			
			var allms_end 	=	time_end[0]*60+time_end[1];
			var allms_start =	time_start[0]*60+time_start[1];
			if(parseInt(allms_start) > parseInt(allms_end)){
				jQuery(el).val(start);
			}
			
		}
	};
	
	this.choosethis = function(el,val){
		var data = jQuery(el).is( ":checked" );
		jQuery('.modal-dialog').addClass('modal-sm');
		if(data){
			jQuery(el).parent().parent().parent().find('#'+val).val(1);
			if(val=='alltime'){
				var start_html = '<div class="form-group">'+
									'<input type="text" name="start[]" onkeyup="DoanListView.checkdate(this,\'start_date\')" class="form-control" data-inputmask="\'alias\': \'date\'" style="width:100px;" id="start_date">'+
									'<p class="help-block">dd/mm/YYYY</p>'+
								'</div>';
				var end_html = '<div class="form-group">'+
									'<input type="text" name="end[]" onchange="DoanListView.checkdate(this,\'end_date\')" class="form-control" data-inputmask="\'alias\': \'date\'" style="width:100px;" id="end_date">'+
									'<p class="help-block">dd/mm/YYYY</p>'+
								'</div>';
				jQuery(el).parent().parent().parent().next('td').html(start_html);
				jQuery(el).parent().parent().parent().next('td').next('td').html(end_html);
				$(":input").inputmask();
			}
		}else{
			jQuery(el).parent().parent().parent().find('#'+val).val(0);
			if(val=='alltime'){
				var start_html = '<div class="form-group">'+
										'<input type="text" name="start[]" class="form-control time-mask" onkeyup="DoanListView.checkdate(this,\'start_time\')" style="width:80px;" id="start_time">'+
										'<p class="help-block">Time: 24h</p>'+
									'</div>';
				var end_html = '<div class="form-group">'+
										'<input type="text" name="end[]" class="form-control time-mask" onchange="DoanListView.checkdate(this,\'end_time\')" style="width:80px;" id="end_time">'+
										'<p class="help-block">Time: 24h</p>'+
									'</div>';
				jQuery(el).parent().parent().parent().next('td').html(start_html);
				jQuery(el).parent().parent().parent().next('td').next('td').html(end_html);
				$(".form-control.time-mask").inputmask('h:s', {placeholder: 'hh:mm'});
			}
		}
		
	};
	
	this.choosevalue = function(el,val,task){
		var data = jQuery(el).is( ":checked" );
		if(data){
			if(val=='alltime'){
				jQuery(el).parent().parent().parent().next('td').find('span').addClass('this-starttime-task');
				jQuery(el).parent().parent().parent().next('td').next('td').find('span').addClass('this-endtime-task');
				jQuery(el).parent().parent().parent().parent().find('td:last-child').find('span').addClass('this-date-task');
				var start_html = '<div class="form-group">'+
									'<input type="text" name="start" onchange="DoanListView.checkdate(this,\'start_date_edit\')" class="form-control" data-inputmask="\'alias\': \'date\'"id="start_date_edit">'+
									'<p class="help-block">dd/mm/YYYY</p>'+
								'</div>';
				var end_html = '<div class="form-group">'+
									'<input type="text" name="end" onchange="DoanListView.checkdate(this,\'end_date_edit\')" class="form-control" data-inputmask="\'alias\': \'date\'" id="end_date_edit">'+
									'<p class="help-block">dd/mm/YYYY</p>'+
								'</div>';
				var html = 	'<div class="modal-content">'+
					        	'<div class="modal-header">'+
					          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
					          		'<h4 class="modal-title">Edit Time Task</h4>'+
					       		'</div>'+
						        '<div class="modal-body">'+
						        	'<form method="post" class="updatetaskform form-validate">'+
						        		'<input type="hidden" name="_token" value="'+message.token+'">'+
						        		start_html+
						        		end_html+
						         		'<input type="hidden" value="1" name="alltime">'+
									'</form>'+
						        '</div>'+
						        '<div class="modal-footer">'+
						        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+task+')">Save</button>'+
						          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
						        '</div>'+
					      	'</div>';
				jQuery('.view-modal-task-edit').html(html);
				$('#this_task_modal').modal('show');
				$(":input").inputmask();
			}
			if(val=='important'){
				jQuery.ajax({
					type: "POST",
					url: 'assign/update',
					data: 'important='+1+'&taskid='+task+'&_token='+$('input[name=_token]').val(),
					success: function(data){}
				});
			}
			if(val=='expected'){
				jQuery.ajax({
					type: "POST",
					url: 'assign/update',
					data: 'expected='+1+'&taskid='+task+'&_token='+$('input[name=_token]').val(),
					success: function(data){}
				});
			}
			if(val=='calendar'){
				jQuery.ajax({
					type: "POST",
					url: 'assign/update',
					data: 'calendar='+1+'&taskid='+task+'&_token='+$('input[name=_token]').val(),
					success: function(data){}
				});
			}
		}else{
			if(val=='alltime'){
				jQuery(el).parent().parent().parent().next('td').find('span').addClass('this-starttime-task');
				jQuery(el).parent().parent().parent().next('td').next('td').find('span').addClass('this-endtime-task');
				jQuery(el).parent().parent().parent().parent().find('td:last-child').find('span').addClass('this-date-task');
				var start_html = '<div class="form-group">'+
										'<input type="text" name="start" class="form-control time-mask" onchange="DoanListView.checkdate(this,\'start_time_edit\')" id="start_time_edit">'+
										'<p class="help-block">Time: 24h</p>'+
									'</div>';
				var end_html = '<div class="form-group">'+
										'<input type="text" name="end" class="form-control time-mask" onchange="DoanListView.checkdate(this,\'end_time_edit\')" id="end_time_edit">'+
										'<p class="help-block">Time: 24h</p>'+
									'</div>';
				var date_html = '<div class="form-group">'+
									'<input type="text" name="date" onchange="DoanListView.checkdate(this,\'date_edit\')" class="form-control" data-inputmask="\'alias\': \'date\'" id="date_edit">'+
									'<p class="help-block">dd/mm/YYYY</p>'+
								'</div>';
				var html = 	'<div class="modal-content">'+
					        	'<div class="modal-header">'+
					          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
					          		'<h4 class="modal-title">Edit Time Task</h4>'+
					       		'</div>'+
						        '<div class="modal-body">'+
						        	'<form method="post" class="updatetaskform form-validate">'+
						        		'<input type="hidden" name="_token" value="'+message.token+'">'+
						        		start_html+
						        		end_html+
						        		date_html+
						         		'<input type="hidden" value="0" name="alltime">'+
									'</form>'+
						        '</div>'+
						        '<div class="modal-footer">'+
						        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+task+')">Save</button>'+
						          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
						        '</div>'+
					      	'</div>';
				jQuery('.view-modal-task-edit').html(html);
				$('#this_task_modal').modal('show');
				$(".form-control.time-mask").inputmask('h:s', {placeholder: 'hh:mm'});
				$(":input").inputmask();
			}
			if(val=='important'){
				jQuery.ajax({
					type: "POST",
					url: 'assign/update',
					data: 'important='+0+'&taskid='+task+'&_token='+$('input[name=_token]').val(),
					success: function(data){}
				});
			}
			if(val=='expected'){
				jQuery.ajax({
					type: "POST",
					url: 'assign/update',
					data: 'expected='+0+'&taskid='+task+'&_token='+$('input[name=_token]').val(),
					success: function(data){}
				});
			}
			if(val=='calendar'){
				jQuery.ajax({
					type: "POST",
					url: 'assign/update',
					data: 'calendar='+0+'&taskid='+task+'&_token='+$('input[name=_token]').val(),
					success: function(data){}
				});
			}
		}
	};
	
	this.changevalue = function(el){
		var number = jQuery(el).parent().prev('td').find('input').val();
		var thisval = jQuery(el).val();
		jQuery(el).attr('max',number);
		if(thisval > number){
			jQuery(el).val(number);
		}
	};
	
	this.clickme = function(el,inp,taskid){
		if(inp=='tasknameval'){
			var html = '<div class="modal-content">'+
				        	'<div class="modal-header">'+
				          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				          		'<h4 class="modal-title">Edit Task Name</h4>'+
				       		'</div>'+
					        '<div class="modal-body">'+
					        	'<form method="post" class="updatetaskform form-validate">'+
									'<input type="hidden" name="_token" value="'+message.token+'">'+
					         		'<div class="form-group floating-label">'+
										'<input type="text" class="form-control" name="task_name" id="nametaskedit">'+
										'<label for="nametaskedit"></label>'+
										'<p class="help-block">New task name</p>'+
									'</div>'+
								'</form>'+
					        '</div>'+
					        '<div class="modal-footer">'+
					        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+taskid+')">Save</button>'+
					          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
					        '</div>'+
				      	'</div>';
			jQuery('.view-modal-task-edit').html(html);
			jQuery(el).parent().find('span').addClass('this-edit-task');
			jQuery('.modal-dialog').removeClass('modal-sm');
		}
		if(inp=='descriptionval'){
			var html = '<div class="modal-content">'+
				        	'<div class="modal-header">'+
				          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				          		'<h4 class="modal-title">Edit Description Task</h4>'+
				       		'</div>'+
					        '<div class="modal-body">'+
					        	'<form method="post" class="updatetaskform form-validate">'+
									'<input type="hidden" name="_token" value="'+message.token+'">'+
					         		'<div class="form-group floating-label">'+
										'<textarea name="description" class="form-control" id="descriptiontaskedit"></textarea>'+
										'<label for="descriptiontaskedit"></label>'+
										'<p class="help-block">New task description</p>'+
									'</div>'+
								'</form>'+
					        '</div>'+
					        '<div class="modal-footer">'+
					        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+taskid+')">Save</button>'+
					          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
					        '</div>'+
				      	'</div>';
			jQuery('.view-modal-task-edit').html(html);
			jQuery(el).parent().find('span').addClass('this-edit-task');
			jQuery('.modal-dialog').removeClass('modal-sm');
		}
		if(inp=='caseval'){
			var html = '<div class="modal-content">'+
				        	'<div class="modal-header">'+
				          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				          		'<h4 class="modal-title">Edit Case Task</h4>'+
				       		'</div>'+
					        '<div class="modal-body">'+
					        	'<form method="post" class="updatetaskform form-validate">'+
									'<input type="hidden" name="_token" value="'+message.token+'">'+
					         		'<div class="form-group floating-label">'+
										'<input type="text" name="cases" class="form-control case" style="width:50px;">'+
									'</div>'+
								'</form>'+
					        '</div>'+
					        '<div class="modal-footer">'+
					        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+taskid+')">Save</button>'+
					          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
					        '</div>'+
				      	'</div>';
			jQuery('.view-modal-task-edit').html(html);
			jQuery(el).parent().find('span').addClass('this-edit-task');
			$(".case").spinner({min: 1,max:15});
			jQuery('.modal-dialog').addClass('modal-sm');
		}
		if(inp=='locationval'){
			var html =  '<div class="modal-content">'+
				        	'<div class="modal-header">'+
				          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				          		'<h4 class="modal-title">Edit Task Location</h4>'+
				       		'</div>'+
					        '<div class="modal-body">'+
					        	'<form method="post" class="updatetaskform form-validate">'+
									'<input type="hidden" name="_token" value="'+message.token+'">'+
					         		'<div class="form-group floating-label">'+
										'<input type="text" class="form-control" name="location" id="locationtaskedit">'+
										'<label for="locationtaskedit"></label>'+
										'<p class="help-block">New task location</p>'+
									'</div>'+
								'</form>'+
					        '</div>'+
					        '<div class="modal-footer">'+
					        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+taskid+')">Save</button>'+
					          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
					        '</div>'+
				      	'</div>';
			jQuery('.view-modal-task-edit').html(html);
			jQuery(el).parent().find('span').addClass('this-edit-task');
			jQuery('.modal-dialog').addClass('modal-sm');
		}
		if(inp=='noteval'){
			var html =  '<div class="modal-content">'+
				        	'<div class="modal-header">'+
				          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				          		'<h4 class="modal-title">Edit Notes Task</h4>'+
				       		'</div>'+
					        '<div class="modal-body">'+
					        	'<form method="post" class="updatetaskform form-validate">'+
									'<input type="hidden" name="_token" value="'+message.token+'">'+
					         		'<div class="form-group floating-label">'+
										'<textarea name="notes" class="form-control" id="notestaskedit"></textarea>'+
										'<label for="notestaskedit"></label>'+
										'<p class="help-block">New task notes</p>'+
									'</div>'+
								'</form>'+
					        '</div>'+
					        '<div class="modal-footer">'+
					        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+taskid+')">Save</button>'+
					          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
					        '</div>'+
				      	'</div>';
			jQuery('.view-modal-task-edit').html(html);
			jQuery(el).parent().find('span').addClass('this-edit-task');
			jQuery('.modal-dialog').removeClass('modal-sm');
		}
		if(inp=='numberval'){
			var value=jQuery(el).parent().find('span').html();
			var html =  '<div class="modal-content">'+
				        	'<div class="modal-header">'+
				          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				          		'<h4 class="modal-title">Edit Number People Task</h4>'+
				       		'</div>'+
					        '<div class="modal-body">'+
					        	'<form method="post" class="updatetaskform">'+
									'<input type="hidden" name="_token" value="'+message.token+'">'+
					         		'<div class="form-group floating-label">'+
										'<input type="text" name="number" value="'+value+'" class="form-control number" style="width:50px;">'+
									'</div>'+
								'</form>'+
					        '</div>'+
					        '<div class="modal-footer">'+
					        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+taskid+')">Save</button>'+
					          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
					        '</div>'+
				      	'</div>';
			jQuery('.view-modal-task-edit').html(html);
			jQuery(el).parent().find('span').addClass('this-edit-task');
			$(".number").spinner({min: 1});
			jQuery('.modal-dialog').addClass('modal-sm');
		}
		if(inp=='assignval'){
			var max=jQuery(el).parent().prev('td').find('span').html();
			jQuery('.view-modal-task-edit').html('<span id="span-ajax-loader"></span>');
			jQuery.ajax({
				type: "POST",
				url: 'assignTeacher',
				data: 'maxassign='+max+'&taskid='+taskid+'&_token='+$('input[name=_token]').val(),
				success: function(data){
					jQuery('.view-modal-task-edit').html(data);
					jQuery(el).parent().find('span').addClass('this-edit-task');
					jQuery(el).parent().next('td').find('span').addClass('this-action-task-view');
					jQuery('.modal-dialog').removeClass('modal-sm');
				}
			});
			
		}
		if(inp=='dateval'){
			var d =new Date();
			var date = d.getDate()+'-0'+(d.getMonth()+1)+'-'+d.getFullYear();
			var html =  '<div class="modal-content">'+
				        	'<div class="modal-header">'+
				          		'<button type="button" class="close" data-dismiss="modal">&times;</button>'+
				          		'<h4 class="modal-title">Edit Assign People Task</h4>'+
				       		'</div>'+
					        '<div class="modal-body">'+
					        	'<form method="post" class="updatetaskform">'+
									'<input type="hidden" name="_token" value="'+message.token+'">'+
					         		'<div class="form-group">'+
										'<input type="text" name="date" onchange="DoanListView.checkdate(this,\'date_edit\')" class="form-control" data-inputmask="\'alias\': \'date\'" id="date_edit">'+
										'<p class="help-block">dd/mm/YYYY</p>'+
									'</div>'+
								'</form>'+
					        '</div>'+
					        '<div class="modal-footer">'+
					        	'<button type="button" class="btn btn-default task-save" onclick="DoanListView.savethis('+taskid+')">Save</button>'+
					          	'<button type="button" class="btn btn-default task-close" data-dismiss="modal">Close</button>'+
					        '</div>'+
				      	'</div>';
			jQuery('.view-modal-task-edit').html(html);
			jQuery(el).parent().find('span').addClass('this-edit-task');
			$(":input").inputmask();
			jQuery('.modal-dialog').addClass('modal-sm');
		}
		
	};
	
	this.savethis = function(id){
		var str=jQuery('.updatetaskform').serialize();
		jQuery.ajax({
		   type: "POST",
		   url: 'assign/update',
		   data: str+'&taskid='+id,
		   success: function(data)
		   {
				var obj=jQuery.parseJSON(data);
				if(obj.task_name != '' && obj.task_name != undefined){
				   jQuery('.this-edit-task').text(obj.task_name).removeClass('this-edit-task');
				}
				if(obj.description != '' && obj.description != undefined){
				   jQuery('.this-edit-task').text(obj.description).removeClass('this-edit-task');
				}
				if(obj.cases != '' && obj.cases != undefined){
				   jQuery('.this-edit-task').text(obj.cases).removeClass('this-edit-task');
				}
				if(obj.alltime != '' && obj.alltime != undefined){
				   jQuery('.this-starttime-task').text(obj.start).removeClass('this-starttime-task');
				   jQuery('.this-endtime-task').text(obj.end).removeClass('this-endtime-task');
				   if(obj.date==null) obj.date='00-00-0000';
				   jQuery('.this-date-task').text(obj.date).removeClass('this-date-task');
				}
				if(obj.locations != '' && obj.locations != undefined){
				   jQuery('.this-edit-task').text(obj.locations).removeClass('this-edit-task');
				}
				if(obj.notes != '' && obj.notes != undefined){
				   jQuery('.this-edit-task').text(obj.notes).removeClass('this-edit-task');
				}
				if(obj.number != '' && obj.number != undefined){
				   jQuery('.this-edit-task').text(obj.number).removeClass('this-edit-task');
				}
				if(obj.assigns != '' && obj.assigns != undefined){
				   jQuery('.this-edit-task').text(obj.assigns).removeClass('this-edit-task');
				   if(obj.actions != '' && obj.actions != undefined){
				   		var stra = obj.actions.split('_');
				   		var data_stra ='';
				   		for(var i = 0; i < stra.length; i++){
				   			data_stra+='<li class="dd-item" data-id="'+i+'">'+
											'<div class="dd-handle btn btn-default-light">'+stra[i]+'</div>'
										'</li>';
				   		}
				   		var html_stra = '<div class="dd nestable-list">'+
													'<ol class="dd-list">'+
														data_stra+
													'</ol>'+
												'</div>';
				   		jQuery('.this-action-task-view').html(html_stra).removeClass('this-action-task-view');
				   }
				   window.location.href = "works";
				}
				if(obj.date != '' && obj.date != undefined){
				   jQuery('.this-edit-task').text(obj.date).removeClass('this-edit-task');
				}
				jQuery("#this_task_modal").modal("hide");
		   }
		 });
	};
	
	
}


//js formview
function DoanFormView()
{
	this.changeTypeWork = function(el){
		var itemid = parseInt(jQuery(el).val());
		if(itemid==1){
		   jQuery.ajax({
			   type: "POST",
			   url: 'typework',
			   data:'yes='+1+'+&typeid='+itemid+'&_token='+message.token,
			   success: function(data)
			   {
			   		jQuery('.send-type-form').html(data);
					jQuery('#load-type-id').val(itemid);
			   }
		   });
		   
		}else{
			jQuery.ajax({
				type: "POST",
				url: 'typework',
				data:'yes='+0+'+&typeid='+itemid+'&_token='+message.token,
				success: function(data)
				{
					jQuery('.send-type-form').html(data);
					jQuery('#load-type-id').val(itemid);
				}
			});
		}
	};
	
	this.saveWork = function(){
		var str = jQuery('.adminworkform').serialize();
		jQuery('.save-process-this').html('Processing...');
		jQuery.ajax({
			type: "POST",
			url: 'savework',
			data: str,
			success: function(data)
			{
				var obj=jQuery.parseJSON(data);
				if(obj.error){
					alert(obj.message);
				}else{
					alert(obj.message);
					jQuery.ajax({
						type: "POST",
						url: 'worktasklayout',
						data:'id='+obj.idwork+'&_token='+message.token,
						success: function(data)
						{
							jQuery('.send-type-form').html(data);
						}
					});
				}
			}
		});
	};
	
	this.saveTask = function(){
		var str = jQuery('.adminworkform').serialize();
		jQuery('.save-task-this').html('Saving...');
		jQuery.ajax({
			type: "POST",
			url: 'savetask',
			data: str,
			success: function(data)
			{
				var obj=jQuery.parseJSON(data);
				if(obj.error){
					alert(obj.message);
				}else{
					alert(obj.message);
					window.location.href = "sendfile";
				}
			}
		});
	}
	
}


var DoanListView =new DoanListView();
var DoanFormView =new DoanFormView();