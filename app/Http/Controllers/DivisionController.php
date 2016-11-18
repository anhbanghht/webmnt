<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use App\Divisions as Model;

use Illuminate\Http\Request;

class DivisionController extends Controller{
    public function listdivision(){
        $division = Model::all();
        $subject= DB::table('subject')->get();
        $teacher = DB::table('teachers')->get();
        $department=DB::table('departments')->get();
        return view('division.list',['division'=>$division, 'subject'=>$subject, 'department'=>$department, 'teacher'=>$teacher]);
    }
    public function add(){
        $subject= DB::table('subject')->get();
        $department = DB::table('departments')->get();
        $teacher = DB::table('teachers')->get();
        return view('division.add',[ 'course'=>$course, 'subject'=>$subjectt, 'teacher'=>$teacher]);
    }
    public function edit($id){
        $division = Model::find($id);
        $subject= DB::table('subject')->get();
        $department = DB::table('departments')->get();
        $teacher = DB::table('teachers')->get();
        return view('division.edit',['division'=>$division, 'subject'=>$subject, 'department'=>$department, 'teacher'=>$teacher]);
    }
   
     public function update($id){
        global $request;
        $division = Model::find($id);
        $division->course_name = $request->get('course_name');
        $division->number = $request->get('number');
        $division->number_practice = $request->get('number_practice');
        $division->type_learn = $request->get('type_learn');
        $division->semester = $request->get('semester');
        $division->type_exam = $request->get('type_exam');
        $division->name_class= $request->get('name_class');
        $division->num_student= $request->get('num_student');
        $division->id_teacher = $request->get('teacher');
        $division->note = $request->get('note');
        $division->save();
        return redirect()->route('division::');
    }
        
    public function create(){
        
        global $request;
        $division = new Model();
        $division->course_name = $request->get('course_name');
        $division->number = $request->get('number');
        $division->number_practice = $request->get('number_practice');
        $division->type_learn = $request->get('type_learn');
        $division->semester = $request->get('semester');
        $division->type_exam = $request->get('type_exam');
        $division->name_class= $request->get('name_class');
        $division->num_student= $request->get('num_student');
        $division->id_teacher = $request->get('teacher');
        $division->note = $request->get('note');
        $division->save();
        return redirect()->route('division::');
    } 
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('division::');
    }
}

?>