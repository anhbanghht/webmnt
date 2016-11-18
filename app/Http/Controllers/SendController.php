<?php namespace App\Http\Controllers;

use DB;
use stdClass;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use Illuminate\Http\Request;
use Input;
 
use App\Http\Requests\SendfilesRequest;
use App\Divisions;
use App\Subject;
use App\Schedule;

class SendController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {	$program= DB::table('programs')->get();
        return view('managerfile.sendfile', ['program'=>$program]);
    }
   
    
	public function savework(Request $data)
	{ 
		$message="";
		if (Input::file('file')->isValid()) { // kiểm tra tồn tại file
			$destinationPath = 'uploads/divisions/'; // upload path
			$extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
			$fileName = 'work1 '.date('d m Y').' '.rand(111,999).'.'.$extension; // renameing image
			Input::file('file')->move($destinationPath, $fileName);
			$pathfile = 'uploads/divisions/'.$fileName;
			if(file_exists($pathfile)){
				$typeid=$data->type_work; 
				$check_import = $this->ImportData($pathfile,$typeid);
				if($check_import && $check_import!=''){
					$message= $check_import;
				}
			}else{
				$message="Error! lỗi trong quá trình upload file.";
			}
		}else{
			$message="Error! file không tồn tại.";
		} 
		echo $message;
	//	return view('managerfile.sendfile',[ 'message'=>$message]);
	}
	 
	public static function ImportData($file,$typeid){
		
		$inputFileType = PHPExcel_IOFactory::identify($file);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setReadDataOnly(true);
		$objReader->setLoadAllSheets();
		$objPHPExcel = $objReader->load($file);
		
		$total_sheets = $objPHPExcel->getSheetCount();
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		$dategroup=''; $count_data=0;
		
		for($row = 2; $row <= $highestRow; ++$row){
			$ar=''; 
			for($col = 0; $col <= $highestColumnIndex; ++$col){
				$ar[]=$sheet->getCellByColumnAndRow($col, $row)->getValue();
			}
			
			if($typeid==11)
			{
				 $subject_name=explode('(',$ar[1]);
				 $subject = DB::table('subject')->where('subject_name',trim($subject_name[0]))->first();
				
				
				$name_department=$ar[5];
				$department = DB::table('departments')->where('department_name',trim($name_department))->first();
				if($department->id!=''):
					$divisions =new Divisions();
					$divisions->id_subject = $subject->id;
					$divisions->id_department = $department->id;
	        		$divisions->course_name = $ar[1];
	        		$divisions->number = $ar[2];
	        		$divisions->number_practice = $ar[3];
	        		$divisions->type_learn = $ar[4];
	        		$divisions->semester = $ar[6];
	        		$divisions->type_exam = $ar[7];
	        		$divisions->name_class = $ar[8];
	        		$divisions->num_student = $ar[9];
	        		$divisions->giolt = $ar[10];
	        		$divisions->giotl = $ar[11];
	        		$divisions->gioth = $ar[12];
	        		$divisions->thigk = $ar[13];
	        		$divisions->tonggio = $ar[14];
	        		$divisions->id_teacher = 0;
	        		$divisions->note = '';
	        		$divisions->save();
        		endif;
			}
		}
		
		for($row = 7; $row <= $highestRow; ++$row){
			$ar=''; 
			for($col = 0; $col <= $highestColumnIndex; ++$col){
				$ar[]=$sheet->getCellByColumnAndRow($col, $row)->getValue();
			}
			if($typeid==1)
			{
				if($ar[0]!=''):
					$department_name=$ar[15];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs = 1;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==2)
			{
				if($ar[0]!=''):
					$department_name=$ar[15];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=2;
		        		
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==3)
			{
				if($ar[0]!=''):
					$department_name=$ar[15];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=3;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==4)
			{
				if($ar[0]!=''):
					$department_name=$ar[15];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=4;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==5)
			{
				if($ar[0]!=''):
					$department_name=$ar[15];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=5;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==6)
			{
				if($ar[0]!=''):
					$department_name=$ar[11];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=6;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==7)
			{
				if($ar[0]!=''):
					$department_name=$ar[12];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=7;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==8)
			{
				if($ar[0]!=''):
					$department_name=$ar[10];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=8;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==9)
			{
				if($ar[0]!=''):
					$department_name=$ar[10];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=9;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
			if($typeid==10)
			{
				if($ar[0]!=''):
					$department_name=$ar[13];
					$department = DB::table('departments')->where('department_name',trim($department_name))->first();
					
					if($department->id!=''):
						$subject =new Subject();
						if($subject->subject_name==''):
		        			$subject->subject_name = $ar[2];
		        		endif;
		        		$subject->id_programs=10;
		        		$subject->id_department = $department->id;
		        		$subject->number = $ar[3];
		        		$subject->number_practice = ($ar[4]) ? $ar[4] : 0;
		        		$subject->semester = $ar[5];
		        		$subject->note=($ar[16]) ? $ar[16] : '';
		        		$subject->save();
		        	endif;
	        	endif;
			}
		}
			//schedule
			for($row = 11; $row <= $highestRow; ++$row){
			$ar=''; 
			for($col = 0; $col <= $highestColumnIndex; ++$col){
				$ar[]=$sheet->getCellByColumnAndRow($col, $row)->getValue();
			}
				if($typeid==12)
				{
					if($ar[3]!=''):
						$schedule =new Schedule();
						if($schedule->name_course==''):
		        			$schedule->name_course = $ar[1];
		        		endif;
		        		
		        		$schedule->number = $ar[2];
		        		$schedule->thu = $ar[3];
		        		$schedule->study_time = $ar[4];
		        		$schedule->lecture_hall=$ar[5];
		        		$schedule->save();
		        	endif;
				}
			}
	
	}
	
	
	
	public function listfile()
	{
		$items = DB::table('sendfiles')->where('state', '=', 1)->get();
		$type_works = DB::table('work_types')->where('state', '=', 1)->get();
		return View('managerfile.listfile', ['items' => $items,'types'=>$type_works]);
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
