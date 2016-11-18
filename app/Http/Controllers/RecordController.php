<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Record as Model;
use DB,Input;
class RecordController extends Controller{
    public function listrecord(){
        $record = Model::all();
        $responsible= DB::table('responsible')->get();
        $teacher = DB::table('teachers')->get();
        $subject = DB::table('subject')->get();
        return view('record.list',['record'=>$record, 'teacher'=>$teacher, 'subject'=>$subject, 'responsible'=>$responsible]);
       
    }
     public function edit($id){
        $record = Model::find($id);
        $responsible= DB::table('responsible')->get();
        $teacher = DB::table('teachers')->get();
        $subject = DB::table('subject')->get();
        return view('record.edit',['record'=>$record, 'teacher'=>$teacher, 'subject'=>$subject, 'responsible'=>$responsible]);
    }
    public function update($id){
        global $request;
        $record = Model::find($id);
        $record->id_record=$record->id;
        $record->teacher=$request->get('id_teachers');
        $record->subject=$request->get('subject');
        $record->save();
        return redirect()->route('record::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('record::');
    }
     public function uploadFile(){
        global $request;
        $savefile="";
        if (Input::file('file')->isValid()) { // kiểm tra tồn tại file
			$destinationPath = 'uploads/record/'; // upload path
			$extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
			$fileName = 'record '.date('d m Y').' '.rand(111,999).'.'.$extension; // renameing image
			Input::file('file')->move($destinationPath, $fileName);
			$pathfile = 'uploads/record/'.$fileName;
			if(file_exists($pathfile)){
			    $savefile=$fileName;
			}
		}
		if($request->get('typefile')=='outline'){
            	Model::where('id',$request->get('id'))->update([
		    'outline'=>$savefile
		    ]);
        }
        if($request->get('typefile')=='lesson_document'){
            	Model::where('id',$request->get('id'))->update([
		    'lesson_document'=>$savefile
		    ]);
        }
        if($request->get('typefile')=='exercise_document'){
            	Model::where('id',$request->get('id'))->update([
		    'exercise_document'=>$savefile
		    ]);
        }
        return redirect('record');
    }
    
}

?>