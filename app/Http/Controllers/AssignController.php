<?php namespace App\Http\Controllers;

use DB;
use Mail;
use App\User;

use App\Libraries\Helps;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Tasks;
use Illuminate\Http\Request;
use stdClass;
use App\Http\Controllers\GoogleCalendar;

class AssignController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $email,$name,$ccemail=array(); 
	
	public function index()
	{
		$assigns = DB::table('works')->where('state', '=', 1)->get();
		$types = DB::table('work_types')->where('state', '=', 1)->get();
		return view('assign.listwork', ['items' => $assigns,'type'=>$types]);
		
	}
	
	public function filterwork(Request $data)
	{
		if($data->type=="null" && $data->year=="null" && $data->semester=="null"):
			$assigns = DB::table('works')->where('state', '=', 1)->get();
		endif;
		if($data->type=="null" && $data->year=="null" && $data->semester!="null"):
			$assigns = DB::table('works')->where('semesterid', '=', $data->semester)->where('state', '=', 1)->get();
		endif;
		if($data->type=="null" && $data->year!="null" && $data->semester=="null"):
			$assigns = DB::table('works')->where('year', '=', $data->year)->where('state', '=', 1)->get();
		endif;
		if($data->type!="null" && $data->year=="null" && $data->semester=="null"):
			$assigns = DB::table('works')->where('typeid', '=', $data->type)->where('state', '=', 1)->get();
		endif;
		if($data->type!="null" && $data->year!="null" && $data->semester=="null"):
			$assigns = DB::table('works')->where('typeid', '=', $data->type)->where('year', '=', $data->year)->where('state', '=', 1)->get();
		endif;
		if($data->type!="null" && $data->year=="null" && $data->semester!="null"):
			$assigns = DB::table('works')->where('typeid', '=', $data->type)->where('semesterid', '=', $data->semester)->where('state', '=', 1)->get();
		endif;
		if($data->type=="null" && $data->year!="null" && $data->semester!="null"):
			$assigns = DB::table('works')->where('year', '=', $data->year)->where('semesterid', '=', $data->semester)->where('state', '=', 1)->get();
		endif;
		if($data->type!="null" && $data->year!="null" && $data->semester!="null"):
			$assigns = DB::table('works')->where('typeid', '=', $data->type)->where('year', '=', $data->year)->where('semesterid', '=', $data->semester)->where('state', '=', 1)->get();
		endif;
		
		$types = DB::table('work_types')->where('state', '=', 1)->get();
		return view('assign.filterwork', ['items' => $assigns,'type'=>$types]);
		
	}
	
	public function listassign($id)
	{
		$assigns = DB::table('works')->where('id', '=', $id)->where('state', '=', 1)->first();
		$tasks = DB::table('tasks')->where('state', '=', 1)->get();
		$tasks_yes = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->get();
		$tasks_no = DB::table('tasks')->where('state', '=', 1)->whereRaw('number > assign')->get();
		$action = DB::table('assigns')->get();
		$task_yes_ok=array();
		foreach($tasks_yes as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$task_yes_ok[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$task_yes_ok[]=$t;
				endif;
			endif;
		}
		$task_no_ok=array();
		foreach($tasks_no as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$task_no_ok[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$task_no_ok[]=$t;
				endif;
			endif;
		}
		
		return view('assign.listtask', ['items' => $assigns, 'tasks' => $tasks,'assignyes'=>$task_yes_ok,'assignno'=>$task_no_ok,'action'=>$action],compact('Helps'));
		
	}
	
	public function listassignall()
	{
		$assigns = DB::table('works')->where('state', '=', 1)->get();
		$tasks = DB::table('tasks')->where('state', '=', 1)->get();
		$tasks_yes = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->get();
		$tasks_no = DB::table('tasks')->where('state', '=', 1)->whereRaw('number > assign')->get();
		$action = DB::table('assigns')->get();
		$task_yes_ok=array();
		foreach($tasks_yes as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$task_yes_ok[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$task_yes_ok[]=$t;
				endif;
			endif;
		}
		$task_no_ok=array();
		foreach($tasks_no as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$task_no_ok[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$task_no_ok[]=$t;
				endif;
			endif;
		}
		
		return view('assign.listtaskall', ['items' => $assigns, 'tasks' => $tasks,'assignyes'=>$task_yes_ok,'assignno'=>$task_no_ok,'action'=>$action],compact('Helps'));
		
	}
	
	public function assigntoday(Request $data)
	{
		$assigns = DB::table('works')->where('id', '=', $data->id)->where('state', '=', 1)->get();
		$tasks = DB::table('tasks')->where('state', '=', 1)->get();
		$tasks_yes = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->get();
		$tasks_no = DB::table('tasks')->where('state', '=', 1)->whereRaw('number > assign')->get();
		$action = DB::table('assigns')->get();
		$task_yes_ok=array();
		foreach($tasks_yes as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) == strtotime(date('Y-m-d'))):
					$task_yes_ok[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) <= strtotime(date('Y-m-d')) && strtotime(date('Y-m-d',strtotime($t->start))) >= strtotime(date('Y-m-d'))):
					$task_yes_ok[]=$t;
				endif;
			endif;
		}
		$task_no_ok=array();
		foreach($tasks_no as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) == strtotime(date('Y-m-d'))):
					$task_no_ok[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) <= strtotime(date('Y-m-d')) && strtotime(date('Y-m-d',strtotime($t->start))) >= strtotime(date('Y-m-d'))):
					$task_no_ok[]=$t;
				endif;
			endif;
		}
		
		return view('assign.filterassign', ['items' => $assigns, 'tasks' => $tasks,'assignyes'=>$task_yes_ok,'assignno'=>$task_no_ok,'action'=>$action,'tab'=>$data->tab],compact('Helps'));
	}
	public function assigntoweek(Request $data)
	{
		$thisdate=strtotime(date('Y-m-d'));
		$thisweek = strtotime(date("Y-m-d", $thisdate) . " +1 week");
		if($data->id!="null"):
			$assigns = DB::table('works')->where('id', '=', $data->id)->where('state', '=', 1)->get();
		else:
			$assigns = DB::table('works')->where('state', '=', 1)->get();
		endif;
		$tasks = DB::table('tasks')->where('state', '=', 1)->get();
		$tasks_yes = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->get();
		$tasks_no = DB::table('tasks')->where('state', '=', 1)->whereRaw('number > assign')->get();
		$action = DB::table('assigns')->get();
		$task_yes_ok=array();
		foreach($tasks_yes as $t){
			if($t->alltime==0):
				$taskdate=strtotime(date('Y-m-d',strtotime($t->date)));
				if($taskdate >= $thisdate && $taskdate <= $thisweek):
					$task_yes_ok[]=$t;
				endif;
			else:
				$taskstart=strtotime(date('Y-m-d',strtotime($t->start)));
				$taskend=strtotime(date('Y-m-d',strtotime($t->end)));
				if( ($taskstart >= $thisdate && $taskstart <= $thisweek) || ($taskend >= $thisdate && $taskend <= $thisweek)):
					$task_yes_ok[]=$t;
				endif;
			endif;
		}
		$task_no_ok=array();
		foreach($tasks_no as $t){
			if($t->alltime==0):
				$taskdate=strtotime(date('Y-m-d',strtotime($t->date)));
				if($taskdate >= $thisdate && $taskdate <= $thisweek):
					$task_no_ok[]=$t;
				endif;
			else:
				$taskstart=strtotime(date('Y-m-d',strtotime($t->start)));
				$taskend=strtotime(date('Y-m-d',strtotime($t->end)));
				if( ($taskstart >= $thisdate && $taskstart <= $thisweek) || ($taskend >= $thisdate && $taskend <= $thisweek)):
					$task_no_ok[]=$t;
				endif;
			endif;
		}
		
		return view('assign.filterassign', ['items' => $assigns, 'tasks' => $tasks,'assignyes'=>$task_yes_ok,'assignno'=>$task_no_ok,'action'=>$action,'tab'=>$data->tab],compact('Helps'));
	}
	
	public function assigntomonth(Request $data)
	{
		$thismonth=date('m');
		if($data->id!="null"):
			$assigns = DB::table('works')->where('id', '=', $data->id)->where('state', '=', 1)->get();
		else:
			$assigns = DB::table('works')->where('state', '=', 1)->get();
		endif;
		$tasks = DB::table('tasks')->where('state', '=', 1)->get();
		$tasks_yes = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->get();
		$tasks_no = DB::table('tasks')->where('state', '=', 1)->whereRaw('number > assign')->get();
		$action = DB::table('assigns')->get();
		$task_yes_ok=array();
		foreach($tasks_yes as $t){
			if($t->alltime==0):
				$taskdate=date('m',strtotime($t->date));
				if($taskdate == $thismonth):
					$task_yes_ok[]=$t;
				endif;
			else:
				$taskstart=date('m',strtotime($t->start));
				$taskend=date('m',strtotime($t->end));
				if( $taskstart==$thismonth || $taskend==$thismonth):
					$task_yes_ok[]=$t;
				endif;
			endif;
		}
		$task_no_ok=array();
		foreach($tasks_no as $t){
			if($t->alltime==0):
				$taskdate=date('m',strtotime($t->date));
				if($taskdate == $thismonth):
					$task_no_ok[]=$t;
				endif;
			else:
				$taskstart=date('m',strtotime($t->start));
				$taskend=date('m',strtotime($t->end));
				if( $taskstart==$thismonth || $taskend==$thismonth):
					$task_no_ok[]=$t;
				endif;
			endif;
		}
		
		return view('assign.filterassign', ['items' => $assigns, 'tasks' => $tasks,'assignyes'=>$task_yes_ok,'assignno'=>$task_no_ok,'action'=>$action,'tab'=>$data->tab],compact('Helps'));
	}
	
	public function assignfilterdate(Request $data)
	{
		$dateform=strtotime(date('Y-m-d',strtotime($data->dateform)));
		$dateto=strtotime(date('Y-m-d',strtotime($data->dateto)));
		if($dateform <= $dateto):
			if($data->id!="null"):
				$assigns = DB::table('works')->where('id', '=', $data->id)->where('state', '=', 1)->get();
			else:
				$assigns = DB::table('works')->where('state', '=', 1)->get();
			endif;
			$tasks = DB::table('tasks')->where('state', '=', 1)->get();
			$tasks_yes = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->get();
			$tasks_no = DB::table('tasks')->where('state', '=', 1)->whereRaw('number > assign')->get();
			$action = DB::table('assigns')->get();
			$task_yes_ok=array();
			foreach($tasks_yes as $t){
				if($t->alltime==0):
					$taskdate=strtotime(date('Y-m-d',strtotime($t->date)));
					if($taskdate >= $dateform && $taskdate <= $dateto):
						$task_yes_ok[]=$t;
					endif;
				else:
					$taskstart=strtotime(date('Y-m-d',strtotime($t->start)));
					$taskend=strtotime(date('Y-m-d',strtotime($t->end)));
					if( ($taskstart >= $dateform && $taskstart <= $dateto) || ($taskend >= $dateform && $taskend <= $dateto) ):
						$task_yes_ok[]=$t;
					endif;
				endif;
			}
			$task_no_ok=array();
			foreach($tasks_no as $t){
				if($t->alltime==0):
					$taskdate=strtotime(date('Y-m-d',strtotime($t->date)));
					if($taskdate >= $dateform && $taskdate <= $dateto):
						$task_no_ok[]=$t;
					endif;
				else:
					$taskstart=strtotime(date('Y-m-d',strtotime($t->start)));
					$taskend=strtotime(date('Y-m-d',strtotime($t->end)));
					if( ($taskstart >= $dateform && $taskstart <= $dateto) || ($taskend >= $dateform && $taskend <= $dateto) ):
						$task_no_ok[]=$t;
					endif;
				endif;
			}
			return view('assign.filterassign', ['items' => $assigns, 'tasks' => $tasks,'assignyes'=>$task_yes_ok,'assignno'=>$task_no_ok,'action'=>$action,'tab'=>$data->tab],compact('Helps'));
		else:
			return "Cảnh báo! Ngày bắt đầu cần nhỏ hơn hoặc bằng ngày kết thúc";
		endif;
	}
	
	public function addtask(Request $data){
		return view('assign.tasklayout', ['id' => $data->thisworkid, 'task' => $data->thistask, 'workname' => $data->thisworkname]);
	}

	public function approve(Request $data)
	{
		$val = new stdClass();
		for($i=0;$i<count($data->task);$i++){
			if($data->task[$i] != '' && $data->start[$i] != '' && $data->end[$i] != '' && $data->location[$i] != ''){
				$date = date('Y-m-d'); 
				$dateval = str_replace('/', '-', $data->date[$i]);
				if(strtotime(date('Y-m-d',strtotime($dateval))) > strtotime($date)) $date = date('Y-m-d',strtotime($dateval));
				if($data->alltime[$i]==1) $date='';
				$task = new Tasks();
				$task->workid 			= $data->workid[$i];
				$task->task_name	 	= $data->task[$i];
				$task->description 		= $data->description[$i];
				$task->case 			= $data->case[$i];
				$task->alltime 			= $data->alltime[$i];
				$task->start			= $data->start[$i];
				$task->end				= $data->end[$i];
				$task->location			= $data->location[$i];
				$task->notes			= $data->notes[$i];
				$task->important		= $data->important[$i];
				$task->expected			= $data->expected[$i];
				$task->calendar			= $data->calendar[$i];
				$task->number			= $data->number[$i];
				$task->assign			= 0;
				$task->action			= '';
				$task->date				= $date;
				$task->state 			= 1;
				$checktask = Helps::checkTask($task->date,$task->start,$task->location);
				if($checktask){
					$val->error = true;
					$val->message="Thời gian và địa điểm hiện tại đã dùng để thực thi nhiệm vụ khác";
				}else{
					$val->error = true;
					$result 				= $task->save();
					if($result){
						$val->error=false;
					}else{
						$val->error = true;
						$val->message="Có ít nhất một nhiệm vụ gặp lỗi trong quá trình lưu";
					}
				}
			}
		}
		
		echo json_encode($val);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $data)
	{
		$val = new stdClass(); 
		
		$task_name		=	$data->task_name;
		$description	=	$data->description;
		$cases			=	$data->cases;
		$alltime		=	$data->alltime;
		$start 			=	$data->start;
		$end			= 	$data->end;
		$location		= 	$data->location;
		$notes			= 	$data->notes;
		$important		= 	$data->important;
		$expected		= 	$data->expected;
		$calendar		= 	$data->calendar;
		$number			= 	$data->number;
		$assign			= 	$data->assign;
		$date			= 	$data->date;
		$action 		= 	$data->assignteacher;
		
		if(!empty($task_name)){
			Tasks::where('id', $data->taskid)->update(['task_name' => $task_name]);
			$val->task_name = $task_name;
		}
		if(!empty($description)){
			Tasks::where('id', $data->taskid)->update(['description' => $description]);
			$val->description = $description;
		}
		if(!empty($cases)){
			Tasks::where('id', $data->taskid)->update(['case' => $cases]);
			$val->cases = $cases;
		}
		if($alltime!=""){
			if($alltime==1): 
				$date='';
				$start = str_replace('/','-', $start);
				$end = str_replace('/', '-', $end);
			else: 
				$thisdate 			= date('Y-m-d'); 
				$date = str_replace('/', '-', $date);
				if(strtotime(date('Y-m-d',strtotime($date))) > strtotime($thisdate) ) $thisdate = date('d-m-Y',strtotime($date));
				$date	= $thisdate;
			endif;
			
			Tasks::where('id', $data->taskid)->update(['alltime' => $alltime, 'start'=>$start,'end'=>$end,'date'=>$date]);
			$val->alltime 	= $alltime;
			$val->start		= $start;
			$val->end		= $end;
			$val->date		= $date;
		}
		if(!empty($location)){
			Tasks::where('id', $data->taskid)->update(['location' => $location]);
			$val->locations = $location;
		}
		if(!empty($notes)){
			Tasks::where('id', $data->taskid)->update(['notes' => $notes]);
			$val->notes = $notes;
		}
		if($important!=""){
			Tasks::where('id', $data->taskid)->update(['important' => $important]);
			$val->important	= $important;
		}
		if($expected!=""){
			Tasks::where('id', $data->taskid)->update(['expected' => $expected]);
			$val->expected	= $expected;
		}
		if($calendar!=""){
			$calendars = new GoogleCalendar;
			$this_task = DB::table('tasks')->where('state', '=', 1)->where('id','=',$data->taskid)->first();
			if($calendar==1):
				$passteacher = DB::table('assigns')->where('taskid','=',$data->taskid)->get();
				$email_teacher=array();
				$email_teacher[0]=array('email' => 'chienbinhbattuyeudoidentoi1992@gmail.com');
				if($passteacher[0] !=''):
					foreach($passteacher as $t):
						$teacher = DB::table('teachers')->where('state', '=', 1)->where('id','=',$t->teacherid)->first();
						$email_teacher[]=array('email' => $teacher->email);
					endforeach;
				endif;
				if($this_task->alltime == 0 ):
					$event_id = $calendars->createEvent($this_task->task_name,$this_task->location,$this_task->description,date("Y-m-d",strtotime($this_task->date))."T".$this_task->start.":00+07:00",date("Y-m-d",strtotime($this_task->date))."T".$this_task->end.":00+07:00",$email_teacher);
				else:
					$event_id = $calendars->createEvent($this_task->task_name,$this_task->location,$this_task->description,date("Y-m-d",strtotime($this_task->start))."T00:00:00+07:00",date("Y-m-d",strtotime($this_task->end))."T23:59:59+07:00",$email_teacher);
				endif;
				Tasks::where('id', $data->taskid)->update(['eventid' => $event_id]);
			else:
				if($this_task->eventid !=''): $calendars->deleteEvent($this_task->eventid); endif;
				Tasks::where('id', $data->taskid)->update(['eventid' => '']);
			endif;
			Tasks::where('id', $data->taskid)->update(['calendar' => $calendar]);
			$val->calendar	= $calendar;
		}
		if($number!=""){
			Tasks::where('id', $data->taskid)->update(['number' => $number]);
			$val->number	= $number;
		}
		if($assign!=""){
			$teacher_id='';$teacher_name ='';
			DB::table('assigns')->where('taskid', '=', $data->taskid)->delete();
			if($action != null){
				$teacher_id = implode('_',$action);
				$ar='';
				foreach($action as $a){
					DB::table('assigns')->insert(['taskid' => $data->taskid, 'teacherid' => $a]);
					$ar[] = Helps::getTeacher($a)->teacher_name;
				}
				$teacher_name = implode('_',$ar);
			}
			Tasks::where('id', $data->taskid)->update(['assign' => $assign]);
			$val->assigns	= $assign;
			$val->actions	= $teacher_name;
		}
		
		echo json_encode($val);
		
	}
	
	public function assignlayout(Request $data){
		$teachers = DB::table('teachers')->where('state', '=', 1)->get();
		$task = DB::table('tasks')->where('id', '=', $data->taskid)->where('state', '=', 1)->first();
		$teachers_in_task = DB::table('teachers as te')
            ->leftJoin('assigns as a', 'te.id', '=', 'a.teacherid')
            ->leftJoin('tasks as ta', 'ta.id', '=', 'a.taskid')
            ->select('te.*')
			->where('ta.id', '<>', $data->taskid)
			->where('ta.start', '=', $task->start)
			->where('ta.end', '=', $task->end)
			->where('ta.date', '=', $task->date)
			->where('te.state', '=', 1)
			->where('ta.state', '=', 1)
            ->get();
		$teacher_busy=array();
		foreach($teachers_in_task as $t):
			$teacher_busy[]=$t->id;
		endforeach;
		$action = DB::table('assigns')->where('taskid', '=', $data->taskid)->get();
		return view('assign.assignlayout', ['taskid' => $data->taskid, 'maxassign' => $data->maxassign,'teachers' => $teachers,'teacher_busy'=>$teacher_busy,'assigned'=>$action]);
	}
	
	//code mail
	public function sendmailall(){
		$assigned = DB::table('assigns')->where('send', '=', 0)->get();
		$this_task_ok=array();
		$ar_teacher=array();
		foreach($assigned as $a):
			$task = DB::table('tasks')->where('state', '=', 1)->where('id', '=', $a->taskid)->first();
			$thisdate 			= date('Y-m-d'); 
			if($task->alltime == 0):
				if(strtotime(date('Y-m-d',strtotime($task->date))) > strtotime($thisdate) ):
					$teacher = DB::table('teachers')->where('state', '=', 1)->where('id', '=', $a->teacherid)->first();
					$task->teacherid = $teacher->id;
					$task->teacher_name = $teacher->teacher_name;
					$task->email = $teacher->email;
					$this_task_ok[]= $task;
					$ar_teacher[]=$teacher->id;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($task->start))) > strtotime($thisdate) ):
					$teacher = DB::table('teachers')->where('state', '=', 1)->where('id', '=', $a->teacherid)->first();
					$task->teacherid = $teacher->id;
					$task->teacher_name = $teacher->teacher_name;
					$task->email = $teacher->email;
					$this_task_ok[]= $task;
					$ar_teacher[]=$teacher->id;
				endif;
			endif;
		endforeach;
		$teachers = DB::table('teachers')->where('state', '=', 1)->get();
		foreach($teachers as $t):
			if(in_array($t->id,$ar_teacher)):
				$this->email=$t->email;
				$this->name=$t->teacher_name;
				DB::table('assigns')->where('teacherid', '=',$t->id)->update(['send' => 1]);
				Mail::send('assign.sendmail', ['teacherid' => $t->id,'assigned'=>$this_task_ok,'setting'=>0], function($message){
					$message->to($this->email,$this->name)->subject('Công việc mới Demo đồ án tốt nghiệp Sinh viên Nguyễn Đức Dương');
				});
			endif;
		endforeach;
		return redirect('/assign/works');
	}
	
	public function customersend(Request $data){
		$teachers = DB::table('teachers')->where('state', '=', 1)->get();
		$task = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->get();
		$tasks=array();
		foreach($task as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$tasks[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$tasks[]=$t;
				endif;
			endif;
		}
		return view('assign.customeremail', ['teachers' => $teachers,'tasks'=>$tasks]);
	}
	
	public function sendmailcustomer(Request $data){
		if($data->listtask != null && $data->listteacher != null):
			$this->ccemail=$data->listteacher;
			Mail::send('assign.sendmail', ['taskid'=>$data->listtask,'setting'=>1], function($message){
				$message->to('chienbinhbattuyeudoidentoi1992@gmail', 'Dương Nguyễn');
				foreach($this->ccemail as $teacherid):
					$address=Helps::getTeacher($teacherid)->email;
					$message->cc($address);
				endforeach;
				$message->subject('Công việc mới Demo đồ án tốt nghiệp Sinh viên Nguyễn Đức Dương');
			});
		else:
		
		endif;
	}
	
	public function showcalendar(){
		return view('assign.showcalendar');
	}
}