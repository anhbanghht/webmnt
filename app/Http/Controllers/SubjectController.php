<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
class SubjectController extends Controller{
    // public function listsubject(){
    //     $subject = Model::all();
    //     return view('subject.list',['subject'=>$subject]);
    // }
    public function getadd(){
        return view('subject.add');
    }
    public function postadd(Requests $data){
      if (Input::file('file')->isValid()) { // kiểm tra tồn tại file
			$destinationPath = 'uploads'; // upload path
			$extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
			$fileName = 'work '.date('d m Y').' '.rand(111,999).'.'.$extension; // renameing image
			Input::file('file')->move($destinationPath, $fileName);
			$pathfile = 'uploads/'.$fileName;
			if(file_exists($pathfile)){
				$this->saveToSendFile($fileName,$data);
				$this->ImportData($pathfile);
				return redirect('/listfile')->with(['c' =>'success','message' => 'Gửi file Thành Công!']); 
			}else{
				return redirect('/sendfile')->with(['c' =>'error','message' => 'Quá trình di chuyển file gặp lỗi!']); 
			}
		}
    }
    public static function saveToSendFile($fileName,$data){
		$files = new Sendfile();
		$files->title 		= $data->title;
		$files->file_name	= $fileName;
		$files->datecreated = date('d-m-Y');
		$files->created_by	= $data->created_by;
		$files->state 		= $data->state;
		$result = $files->save();
	}
	
	public static function ImportData($file){
		
		$inputFileType = PHPExcel_IOFactory::identify($file);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($file);
		
		$sheet = $objPHPExcel->getActiveSheet();
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		
		for($row = 2; $row <= $highestRow; ++$row){
			$ar='';
			for($col = 0; $col <= $highestColumnIndex; ++$col){
				$ar[]=$sheet->getCellByColumnAndRow($col, $row)->getValue();
			}
			
			$semester = DB::table('semesters')->where('state', '=', 1)->whereIn('semester_name', [$ar[1],'orther'])->get();
			$type = DB::table('work_types')->where('state', '=', 1)->whereIn('type_name', [$ar[2],'orther'])->get();
			//'work_name, 'year', 'semesterid', 'typeid', 'description', 'notes', 'state'
			if($semester && $type){
				$works = new Works();
				$works->work_name 		= $ar[3];
				$works->year			= $ar[0];
				$works->semesterid 		= $semester[0]->id;
				$works->typeid			= $type[0]->id;
				$works->description 	= $ar[4];
				$works->notes			= $ar[5];
				$works->state 			= 1;
				$result = $works->save();
			}
		}
    
}