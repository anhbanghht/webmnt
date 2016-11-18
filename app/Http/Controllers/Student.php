<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Student as Model;
use App\Courses;
use App\department;
use Carbon\Carbon;
use Validator;
use Maatwebsite\Excel\Facades\Excel;

class Student extends Controller{
    public function listStudent(){
        $student = Model::all();
        return view('student.list',['student'=>$student]);
    }
    public function add(){
        $courses = Courses::all();
        $department = department::all();
        return view('student.add',['courses'=>$courses, 'department'=>$department]);
    }
    
    public function create(){
        global $request;
        $rules = array(
            'student_id' => 'required|unique:students',
            'student_name' => 'required',
            'dateofbirth' => 'required',
            'class_name' => 'required'
        );
        $messages = array(
            'student_id.required' => "Trường mã sinh viên là bắt buộc",
            'student_id.unique' => "Trường mã sinh viên là bắt buộc",
            'student_name.required' => "Trường mã sinh viên là bắt buộc",
            'dateofbirth.required' => "Trường mã sinh viên là bắt buộc",
            'classname.required'  =>  "Trường mã sinh viên là bắt buộc",
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator);
        } else {
            $student = new Model();
            $student->student_id = $request->get('student_id');
            $student->student_name = $request->get('student_name');
            $student->dateofbirth = Carbon::createFromFormat('d/m/Y', $request->get('dateofbirth') );
            $student->class_name = $request->get('class_name');
            $student->course_id = $request->course_id;
            $student->id_department = $request->id_department;
            $student->email = $request->get('email');
            $student->phone = $request->get('phone');
            $student->description = $request->get('description');
            $student->note = $request->get('note');
            $student->save();
        }
            return redirect()->route('student::');
    }
    
    public function edit($id){
        $student = Model::find($id);
        $courses = Courses::all();
        $department = department::all();
        return view('student.edit',['student'=>$student, 'courses'=>$courses, 'department'=>$department]);
    }
    
    public function update($id){
        global $request;
         $rules = array(
            'student_id' => 'required|unique:students',
            'student_name' => 'required',
            'dateofbirth' => 'required',
            'class_name' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
            'unique' => "Mã sinh viên đã tồn tại!",
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $student = Model::find($id);
            $student->student_id = $request->get('student_id');
            $student->student_name = $request->get('student_name');
            $student->dateofbirth = Carbon::createFromFormat('d/m/Y', $request->get('dateofbirth') );
            $student->class_name = $request->get('class_name');
            $student->course_id = $request->course_id;
            $student->id_department = $request->id_department;
            $student->email = $request->get('email');
            $student->phone = $request->get('phone');
            $student->description = $request->get('description');
            $student->note = $request->get('note');
            $student->save();
        }
        return redirect()->route('student::');
    }
    
        
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('student::');
    }
    public function view($id){
        $student = Model::find($id);
        return view('student.view' ,['student'=>$student]);
    }
    // public function search(){
    //     global $request;
    //     $id = $request->q;
    //     $student = Model::whereRaw("student_id REGEXP '^".$id."'")->get();
    //     return response()->json(['data'=>$student]);
    // }
    public function import(){
        global $request;
        $file = $request->file('file');
        $opts = $request->all();
        //echo str_slug($opts['student_id'], '_');
        Excel::selectSheetsByIndex( intval($opts['sheet']-1) )->load($file->path(),function($reader) use($opts){
            $rows = $reader->toArray();
            foreach($rows as $row){
                $student = new Model();
                if(! $opts['student_id']=='' )
                    $student->student_id = $row[str_slug($opts['student_id'], '_')];
                if(! $opts['student_name']=='' ){
                    $a = explode(',',$opts['student_name']);
                    if( count($a) == 1 )
                        $student->student_name = $row[str_slug($opts['student_name'], '_')];
                    else{
                        $name = array();
                        foreach( $a as $key => $b ){
                            $name[$key] = $row[str_slug($b,'_')];
                        }
                        $student->student_name = implode(' ',$name);
                    }
                }
                if(! $opts['dateofbirth'] == '' || $row[str_slug($opts['dateofbirth'], '_')] )
                    $student->dateofbirth = $row[str_slug($opts['dateofbirth'], '_')];
                if(! $opts['class_name'] == '')
                    $student->class_name = $row[str_slug($opts['class_name'], '_')];
                if(! $opts['id_department'] == '' ){
                    $department = department::where('department_name',$row[str_slug($opts['id_department'], '_')])->get()->first();
                    $student->id_department = $department->id;
                }
                if(! $opts['course_id'] == '' ){
                    $course = Courses::where('course',$row[str_slug($opts['course_id'], '_')])->get()->first();
                    if(!$course){
                        $course = new Courses();
                        $course->course = $row[str_slug($opts['course_id'], '_')];
                        $course->save();
                    }
                    $student->course_id = $course->id;
                }
                if( ! $opts['email'] == '' )
                    $student->email = $row[str_slug($opts['email'], '_')];
                if( ! $opts['phone'] == '' )
                    $student->phone = $row[str_slug($opts['phone'], '_')];
                if( ! $opts['description'] == '' )
                    $student->description = $row[str_slug($opts['description'], '_')];
                if( ! $opts['note'] == '' )
                    $student->note = $row[str_slug($opts['note'], '_')];
                $student->save();
            }
        },'UTF-8');
        return response()->json(['status'=>true]);
    }
}

?>