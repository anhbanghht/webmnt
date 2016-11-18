<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Teacher as Model;
use App\department;
use Carbon\Carbon;
use Validator;
class Teacher extends Controller{
    public function listTeacher(){
        $teacher = Model::all();
        return view('teacher.list',['teacher'=>$teacher]);
    }
    public function add(){
        $department = department::all();
        return view('teacher.add',['department'=>$department]);
    }
    public function edit($id){
        $teacher = Model::find($id);
        $department = department::all();
        return view('teacher.edit',['teacher'=>$teacher,'department'=>$department]);
    }
    public function update($id){
        global $request;
            $rules = array(
            'teacher_name' => 'required',
            'dateofbirth' => 'required',
            'email' => 'required',
            'teacher_avatar' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator);
        } else {
            $teacher = Model::find($id);
            $teacher->teacher_name = $request->get('teacher_name');
            $teacher->dateofbirth = Carbon::createFromFormat('d/m/Y', $request->get('dateofbirth') );
            $teacher->email = $request->get('email');
            $teacher->degree = $request->get('degree');
            $teacher->working = $request->get('working');
            $teacher->faculty = $request->get('faculty');
            $teacher->phone = $request->get('phone');
            $teacher->subject = $request->get('subject');
            $teacher->description = $request->get('description');
            $teacher->note = $request->get('note');
            if ($request->hasFile('teacher_avatar')) {
                $image = $request->file('teacher_avatar');
                $name = 'IMG_'.time().'.'.$image->getClientOriginalExtension();
                $upload_dir = 'public/uploads/teacher_avatar';
                $image->move($upload_dir, $name);
                $teacher->avatar = $upload_dir.'/'.$name;
            }
            $teacher->save();
        }
        return redirect()->route('teacher::');
    }
    public function create(){
        global $request;
        $rules = array(
            'teacher_name' => 'required',
            'dateofbirth' => 'required',
            'email' => 'required',
            'teacher_avatar' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator);
        } else {
            $teacher = new Model();
            $teacher->teacher_name = $request->get('teacher_name');
            $teacher->dateofbirth = Carbon::createFromFormat('d/m/Y', $request->get('dateofbirth') );
            $teacher->email = $request->get('email');
            $teacher->degree = $request->get('degree');
            $teacher->working = $request->get('working');
            $teacher->faculty = $request->get('faculty');
            $teacher->phone = $request->get('phone');
            $teacher->subject = $request->get('subject');
            $teacher->description = $request->get('description');
            $teacher->note = $request->get('note');
            $image = $request->file('teacher_avatar');
            $name = 'IMG_'.time().'.'.$image->getClientOriginalExtension();
            $upload_dir = 'public/uploads/teacher_avatar';
            $image->move($upload_dir, $name);
            $teacher->avatar = $upload_dir.'/'.$name;
            $teacher->save();
        }
        return redirect()->route('teacher::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('teacher::');
    }
    
    public function listbytime($id){
        $intership_time = Intership_time::find($id);
        $temp = $intership_time->topics()->where('intertime_id',$id)->groupBy('teacher_id')->get();
        return view('teacher.listbytime',['teacher'=>$temp,'intership_time'=>$intership_time]);
    }
    public function view($id){
        $teacher = Model::find($id);
        return view('teacher.view' ,['teacher'=>$teacher]);
    }
}

?>