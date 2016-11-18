<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;
use App\Subject as Model;
use App\Program;
use Illuminate\Http\Request;


class ProgramController extends Controller{
         public function listprogram($id_programs=null){
            $department = DB::table('departments')->get();
             $teacher = DB::table('teachers')->get();
            if($id_programs)
                $program = Model::where('id_programs',$id_programs)->get();
            else
                $program = Model::all();
                $program1 = Program::all();
            return view('program.list',['program'=>$program, 'department'=>$department, 'id_programs'=> $id_programs, 'teacher'=>$teacher, 'program1'=>$program1]);
    
    }
    public function add(){
        $department = DB::table('departments')->get();
        $teacher = DB::table('teachers')->get();
         $program1 = Program::all();
        return view('program.add',['department'=>$department, 'teacher'=>$teacher,  'program1'=>$program1]);
    }
     public function create(){
        global $request;
        $department = DB::table('departments')->get();
        $program = new Model();
        $program->subject_name = $request->get('subject');
        $program->id_programs = $request->get('program1');
        $program->number = $request->get('number');
        $program->number_practice = $request->get('number_practice');
        $program->semester = $request->get('semester');
        $program->id_department = $request->get('department');
        $program->note = $request->get('note');
        $program->save();
        return redirect()->route('program::');
    }
     public function edit($id){
        $program = Model::find($id);
        $subject = DB::table('subject')->get();
        $department = DB::table('departments')->get();
        $teacher = DB::table('teachers')->get();
        return view('program.edit',['program'=>$program,'department'=>$department, 'subject'=>$subject, 'teacher'=>$teacher]);
         
     }
     public function update($id){
        global $request;
        $program = Model::find($id);
        $program->subject_name = $request->get('subject');
        $program->number = $request->get('number');
        $program->id_programs = $request->get('program1');
        $program->number_practice = $request->get('number_practice');
        $program->semester = $request->get('semester');
        $program->id_department = $request->get('department');
        $program->note = $request->get('note');
        $program->save();
        return redirect()->route('program::');
     }
   
     public function delete($id){
         Model::destroy($id);
         return redirect()->route('program::');
     }
     
     
}

?>