<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use App\Responsible as Model;
use App\Record;


class ResponsibleController extends Controller{
    public function listresponsible(){
        $responsible = Model::paginate(10);
        $department = DB::table('departments')->get();
        $subject = DB::table('subject')->get();
         $teacher = DB::table('teachers')->get();
        return view('responsible.list',['responsible'=>$responsible,'department'=>$department, 'subject'=>$subject, 'teacher'=>$teacher]);
    }
    public function add(){
        $responsible = Model::all();
        $department = DB::table('departments')->get();
        $subject = DB::table('subject')->get();
        $teacher = DB::table('teachers')->get();
        return view('responsible.add',['responsible'=>$responsible, 'department'=>$department, 'subject'=>$subject, 'teacher'=>$teacher, ]);
    }
    public function edit($id){
        $responsible = Model::find($id);
         $department = DB::table('departments')->get();
         $subject = DB::table('subject')->get();
         $teacher = DB::table('teachers')->get();
        return view('responsible.edit',['responsible'=>$responsible, 'department'=>$department, 'subject'=>$subject, 'teacher'=>$teacher ]);
    }
    public function update($id){
        global $request;
        $responsible = Model::find($id);
        $responsible->id_subject = $request->get('subject');
        $responsible->id_department = $request->get('department');
        $responsible->obligatory = $request->get('obligatory')?$request->get('obligatory'):0;
        $responsible->bank_responsible= $request->get('bank_responsible');
        $responsible->start = $request->get('start');
        $responsible->bank = $request->get('bank');
        $responsible->id_teachers = $request->get('id_teachers');
        $responsible->weighted_scores = $request->get('weighted_scores');
        $responsible->id_teacher = json_encode($request->get('responsible_person'));
        $responsible->status = $request->get('status');
        $responsible->deadline_outline = $request->get('deadline_outline');
        $responsible->deadline_lesson = $request->get('deadline_lesson');
        $responsible->outline = $request->get('outline')?$request->get('outline'):0;
        $responsible->lesson = $request->get('lesson')?$request->get('lesson'):0;
        $responsible->exercise = $request->get('exercise')?$request->get('exercise'):0;
        $responsible->save();
        
          $record = new Record();
        $record->id_responsible=$responsible->id;
        $record->teacher=$request->get('id_teachers');
        $record->subject=$request->get('subject');
        $record->save();
        
        return redirect()->route('responsible::');
    }
    public function create(){
        global $request;
        $responsible = new Model();
        
        $responsible->id_subject = $request->get('subject');
        $responsible->id_department = $request->get('department');
        $responsible->obligatory = $request->get('obligatory')?$request->get('obligatory'):0;
        $responsible->bank_responsible= $request->get('bank_responsible');
        $responsible->start = $request->get('start');
        $responsible->bank = $request->get('bank');
        $responsible->id_teachers = $request->get('id_teachers');
        $responsible->weighted_scores = $request->get('weighted_scores');
        $responsible->id_teacher = json_encode($request->get('responsible_person'));
        $responsible->status = $request->get('status');
        $responsible->deadline_outline = $request->get('deadline_outline');
        $responsible->deadline_lesson = $request->get('deadline_lesson');
        $responsible->outline = $request->get('outline')?$request->get('outline'):0;
        $responsible->lesson = $request->get('lesson')?$request('lesson'):0;
        $responsible->exercise = $request->get('exercise')?$request('exercise'):0;
        $responsible->save();
        
        $record = new Record();
        $record->id_responsible=$responsible->id;
        $record->teacher=$request->get('id_teachers');
        $record->subject=$request->get('subject');
        $record->save();
        
        
        return redirect()->route('responsible::');
        
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('responsible::');
    }
}

?>