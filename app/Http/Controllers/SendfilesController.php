<?php namespace App\Http\Controllers;

use DB;
use stdClass;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use Illuminate\Http\Request;
use Input;

use App\Sendfile;
use App\Works;
use App\Tasks;
use App\Http\Requests\SendfilesRequest;

class SendfilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$type_works = DB::table('work_types')->where('state', '=', 1)->get();
		return view('assign.send',['types' => $type_works]);
	}
	
	public function typework(Request $data)
	{
		$type_works = DB::table('work_types')->where('state', '=', 1)->get();
		$semesters = DB::table('semesters')->where('state', '=', 1)->get();
		return view('assign.typework',['typeid'=>$data->typeid,'yes'=>$data->yes,'semesters'=>$semesters,'types' => $type_works]);
	}
	
	public function savework(Request $data)
	{
		$val = new stdClass(); 
		if($data->work_name!=''):
			$checkwork = DB::table('works')
						->where('state', '=', 1)
						->where('work_name', '=', $data->work_name)
						->where('year', '=', $data->year)
						->where('semesterid', '=', $data->semesterid)
						->where('typeid', '=', $data->typeid)
						->first();
			if(count($checkwork) == 0):
				$works = new Works();
				$works->work_name 		= $data->work_name;
				$works->year			= $data->year;
				$works->semesterid 		= $data->semesterid;
				$works->typeid			= $data->typeid;
				$works->description 	= $data->description;
				$works->notes			= $data->notes;
				$works->state 			= $data->state;
				$result = $works->save();
				$val->idwork = $works->id;
				$val->error = false;
				$val->message = "Successful! Now you need add the Tasks for this works.";
			else:
				$val->error = true;
				$val->message = "Error! this works is exists.";
			endif;
		else:
			$val->error = true;
			$val->message = "Error! this name works not null.";
		endif;
		echo json_encode($val);
	}
	
	public function savetask(Request $data)
	{
		$val = new stdClass();
		$count_insert=0;
		for($i=0; $i< count($data->task);$i++):
			if($data->task[$i] != ''):
				if($data->alltime[$i]=='1'): 
					$start = str_replace('/','-',$data->start[$i] ); 
					$end   = str_replace('/','-',$data->end[$i] ); 
					$date  = '';
				else:
					$start = $data->start[$i];
					$end   = $data->end[$i];
					$date  = str_replace('/','-',$data->date[$i] ); 
				endif;
				$checktask = DB::table('tasks')
								->where('state', '=', 1)
								->where('task_name', '=', $data->task[$i])
								->where('start', '=', $start)
								->where('end', '=', $end)
								->where('location', '=', $data->location[$i])
								->where('date', '=', $date)
								->first();
				if(count($checktask) == 0):
					$tasks = new Tasks();
					$tasks->workid 				= $data->workid;
					$tasks->task_name 			= $data->task[$i];
					$tasks->description			= $data->description[$i];
					$tasks->case				= $data->case[$i];
					$tasks->alltime				= $data->alltime[$i];
					$tasks->start				= $start;
					$tasks->end					= $end;
					$tasks->location			= $data->location[$i];
					$tasks->notes				= $data->notes[$i];
					$tasks->important			= $data->important[$i];
					$tasks->expected			= $data->expected[$i];
					$tasks->calendar			= $data->calendar[$i];
					$tasks->number				= $data->number[$i];
					$tasks->assign				= 0;
					$tasks->state				= 1;
					$tasks->date				= $date;
					$result_task = $tasks->save();
					$inserttaskid=$tasks->id;
					$count_insert++;
					$val->error = false;
				else:
					if(isset($val->error) && $val->error == true):
						$val->error = true;
						$val->message .= "Warning! Có Thể bạn đã nhập bị trùng lặp hay đã tồn tại! các dữ liệu không trùng lặp vẫn được lưu lại!";
					else:
						$val->error = true;
						$val->message = "Warning! Có Thể bạn đã nhập bị trùng lặp hay đã tồn tại! các dữ liệu không trùng lặp vẫn được lưu lại!";
					endif;
				endif;
			else:
				$val->error = true;
				$val->message = "Warning! Bạn đã thêm một bản ghi để nhập nhưng nó đã bị bỏ trống! việc ghi dữ liệu sẽ bỏ qua giá trị này!";
			endif;
		endfor;
		if($count_insert > 0):
			$val->message = "Có ".$count_insert." được lưu.";
		endif;
		
		echo json_encode($val);
		
	}
	
	public function worktasklayout(Request $data)
	{
		$this_works = DB::table('works')->where('id', '=', $data->id)->first();
		return view('assign.worktask',['work'=>$this_works]);
	}
	
	public function savefilework(Request $data)
	{
		if (Input::file('file')->isValid()) { // kiểm tra tồn tại file
			$destinationPath = 'uploads'; // upload path
			$extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
			$fileName = 'work '.date('d m Y').' '.rand(111,999).'.'.$extension; // renameing image
			Input::file('file')->move($destinationPath, $fileName);
			$pathfile = 'uploads/'.$fileName;
			if(file_exists($pathfile)){
				$typeid=$data->typeid;
				$idinsertfile=$this->saveToSendFile($fileName,$data);
				$check_import = $this->ImportData($pathfile,$typeid,$idinsertfile);
				if($check_import && $check_import!=''){
					$message= $check_import;
				}
			}else{
				$message="Error! lỗi trong quá trình upload file.";
			}
		}else{
			$message="Error! file không tồn tại.";
		}
		$type_works = DB::table('work_types')->where('state', '=', 1)->get();
		return view('assign.send',['types' => $type_works,'message'=>$message]);
	}
	
	public static function saveToSendFile($fileName,$data){
		$files = new Sendfile();
		$files->typeid 		= $data->typeid;
		$files->file_name	= $fileName;
		$files->datecreated = date('d-m-Y');
		$files->created_by	= 1;
		$files->state 		= $data->state;
		$result = $files->save();
		return $files->id;
	}
	
	public static function ImportData($file,$typeid,$idinsertfile){
		
		$inputFileType = PHPExcel_IOFactory::identify($file);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setReadDataOnly(true);
		$objReader->setLoadAllSheets();
		$objPHPExcel = $objReader->load($file);
		$total_sheets = $objPHPExcel->getSheetCount();
		$sheet = $objPHPExcel->getActiveSheet();
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		$dategroup=''; $count_data=0;
		for($row = 0; $row <= $highestRow; ++$row){
			$ar=''; 
			for($col = 0; $col <= $highestColumnIndex; ++$col){
				$ar[]=$sheet->getCellByColumnAndRow($col, $row)->getValue();
			}
			if($ar[1]=='') $ar[1] = $dategroup;
			$dategroup = $ar[1];
			//$semester = DB::table('semesters')->where('state', '=', 1)->whereIn('semester_name', [$ar[1],'orther'])->get();
			$type = DB::table('work_types')->where('state', '=', 1)->whereIn('type_name', [$ar[2],'orther'])->get();
			//'work_name, 'year', 'semesterid', 'typeid', 'description', 'notes', 'state'
			$checkwork = DB::table('works')->where('state', '=', 1)->where('work_name', '=', $ar[8])->first();
			if($ar[9]=='MMT'){
				$return_id='';
				if(count($checkwork) == 0){
					$year=explode('/',trim($ar[1]))[2]; $year=((int)$year-1).'-'.(int)$year;
					$works = new Works();
					$works->work_name 		= $ar[8];
					$works->year			= $year;
					$works->semesterid 		= '';
					$works->typeid			= $typeid;
					$works->description 	= '';
					$works->notes			= '';
					$works->state 			= 1;
					$result = $works->save();
					$return_id=$works->id;
				}else{
					$return_id=$checkwork->id;
				}
				
				$time=explode('-',(explode(')',explode('(',trim($ar[2]))[1])[0]));
				if(strpos($ar[1], '/') == false): $day=$ar[1]; else: $day = str_replace('/','-',$ar[1]); endif;
				$checktask = DB::table('tasks')
								->where('state', '=', 1)
								->where('task_name', '=', $ar[3])
								->where('start', '=', $time[0])
								->where('end', '=', $time[1])
								->where('location', '=', $ar[7])
								->where('date', '=', $day)
								->first();
				if(count($checktask) == 0){
					$tasks = new Tasks();
					$tasks->workid 				= $return_id;
					$tasks->task_name 			= $ar[3];
					$tasks->description			= '';
					$tasks->case				= '';
					$tasks->alltime				= 0;
					$tasks->start				= $time[0];
					$tasks->end					= $time[1];
					$tasks->location			= $ar[7];
					$tasks->notes				= '';
					$tasks->important			= 0;
					$tasks->expected			= 0;
					$tasks->calendar			= 0;
					$tasks->number				= ((int)$ar[6] * 2);
					$tasks->assign				= 0;
					$tasks->state				= 1;
					$tasks->date				= $day;
					$result_task = $tasks->save();
					$inserttaskid=$tasks->id;
					if($inserttaskid != 0){
						$count_data++;
					}
				}else{
					Sendfile::where('id', $idinsertfile)->update(array('state' 	=> '-2'));
					return "Error! File chứa dữ liệu đã tồn tại. Xin vui lòng kiểm tra lại.";
				}
				
			}
		}
		
		if($count_data > 0){
			return "Successful! Dữ liệu được cập nhật thành công.";
		}else{
			Sendfile::where('id', $idinsertfile)->update(array('state' 	=> '-2'));
			return "Null! Chúng tôi không tìm được dữ liệu trong file của bạn.";
		}
	
	}
	
	
	
	public function listfile()
	{
		$items = DB::table('sendfiles')->where('state', '=', 1)->get();
		$type_works = DB::table('work_types')->where('state', '=', 1)->get();
		return View('assign.listfile', ['items' => $items,'types'=>$type_works]);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete(Request $data)
	{
		$val = new stdClass();
		$id = $data->id;
		$result=Sendfile::where('id', $id)->update(array('state' 	=> '-2'));
		$val->id=$id;
		if($result){
			$val->error=false;
			$val->link='listfile';
		}else{
			$val->error=true;
		}
		echo json_encode($val);
	}

}
