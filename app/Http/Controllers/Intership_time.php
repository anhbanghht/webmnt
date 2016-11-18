<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Intership_time as Model;
use App\Intership_type;
use App\Year;
use App\Intertime_students;
use App\Teacher;
use App\Council;
use App\Company;
use Carbon\Carbon;
use Validator;
class Intership_time extends Controller{
    public function listIntership_time($year_id=null){
        if($year_id)
            $intership_time = Model::where('year_id',$year_id)->get();
        else
            $intership_time = Model::all();
        $year = Year::all();
        return view('intership_time.list',['intership_time'=>$intership_time, 'year'=>$year, 'year_id'=> $year_id]);
    }
    
    public function add($year_id=null){
        $year = Year::all();
        $council= Council::all();
        $intership_type = Intership_type::all();
        return view('intership_time.add',['year'=>$year, 'intership_type'=>$intership_type, 'year_id'=>$year_id,'council'=>$council]);
    }
    public function edit($id){
        $intership_time = Model::find($id);
        $year = Year::all();
        $council= Council::all();
        $intership_type = Intership_type::all();
        return view('intership_time.edit',['year'=>$year, 'intership_time'=>$intership_time,'intership_type'=>$intership_type,'council'=>$council]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'intertime_name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'enddate' => 'required|date_format:d/m/Y|after:startdate',
            'content' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.after' => 'Ngày kết thúc phải lớn hơn ngày bắt đầu!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $intership_time = Model::find($id);
            $intership_time->year_id = $request->year_id;
            $intership_time->intertime_name = $request->get('intertime_name');
            $intership_time->id_intertype = $request->id_intertype;
            $intership_time->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $intership_time->enddate = Carbon::createFromFormat('d/m/Y', $request->get('enddate') );
            $intership_time->content = $request->get('content');
            $intership_time->note = $request->get('note');
            $intership_time->save();
        }
        return redirect()->route('intership_time::');
    }
    public function create(){
        global $request;
        $rules = array(
            'intertime_name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'enddate' => 'required|date_format:d/m/Y|after:startdate',
            'content' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.after' => 'Ngày kết thúc phải lớn hơn ngày bắt đầu!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $intership_time = new Model();
            $intership_time->year_id = $request->year_id;
            $intership_time->intertime_name = $request->get('intertime_name');
            $intership_time->id_intertype = $request->id_intertype;
            $intership_time->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $intership_time->enddate = Carbon::createFromFormat('d/m/Y', $request->get('enddate') );
            $intership_time->content = $request->get('content');
            $intership_time->note = $request->get('note');
            $intership_time->save();
            }
            return redirect()->route('intership_time::');
        
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('intership_time::');
    }
    public function view($id){
        $intership_time = Model::find($id);
        return view('intership_time.view' ,['intership_time'=>$intership_time]);
    }
    public function create_list_students($intertime_id = null){
        $students = \App\Student::all();
        $students_selected = Intertime_students::where('intertime_id',$intertime_id)->get();
        $intership_time = Model::all();
        return view('intership_time.addListStudent' ,['students'=>$students, 'intership_time'=>$intership_time,'intertime_id'=>$intertime_id,'students_selected'=>$students_selected]);
    }
    
    
    public function add_list_students($id){
        global $request;
        $ids = $request->ids;
        if( $ids )
        foreach ( $ids as $the_id ){
            $st = new Intertime_students();
            $st->intertime_id = $id;
            $st->student_id = $the_id;
            $st->save();
        }
        return redirect()->route('intership_time::listStudent',['id'=>$id]);
    }
    
    public function list_students($id){
        if( \Auth::user()->usergroup->id != 3 )
            $students = Intertime_students::where('intertime_id',$id)->get();
        else
            $students = Intertime_students::where('intertime_id',$id)->where('teacher_id',\Auth::user()->teacher->id)->get();
        $teacher = Teacher::all();
        $intership_time = Model::find($id); 
        return view('intership_time.ListStudent',['students'=>$students,'intership_time'=>$intership_time, 'teacher'=>$teacher, 'intertime_id'=>$id]);
    }

    public function allow_students($intertime_id){
        if( \Auth::user()->usergroup->id != 3 )
            $students = Intertime_students::where('intertime_id',$intertime_id)->get();
        else
            $students = Intertime_students::where('intertime_id',$intertime_id)->where('teacher_id',\Auth::user()->teacher->id)->get();
        $teacher = Teacher::all();
        $intership_time = Model::find($intertime_id); 
        return view('intership_time.listAllow',['students'=>$students,'intership_time'=>$intership_time, 'teacher'=>$teacher, 'intertime_id'=>$intertime_id]);
    }

    public function do_allow_students($intertime_id){
        global $request;
        //dd($request);
        $allow = $request->allow;
        $note = $request->note;
        if( \Auth::user()->usergroup->id != 3 )
            $students = Intertime_students::where('intertime_id',$intertime_id)->get();
        else
            $students = Intertime_students::where('intertime_id',$intertime_id)->where('teacher_id',\Auth::user()->teacher->id)->get();
        foreach ($students as $student) {
            if(isset($allow[$student->id]))
                $student->allow = $request->allow[$student->id];
            else
                $student->allow = null;
            if(isset($note[$student->id]))
                $student->note = $request->note[$student->id];
            $student->save();
        }
        return redirect()->route('intership_time::allowStudent',['intertime_id'=>$intertime_id]);

    }
    
    public function add_list_teacher($intertime_id = null){
        $intership_time = Model::find($intertime_id);
        $teacher = Teacher::all();
        $students = Intertime_students::where('intertime_id',$intertime_id)->get();
        return view('intership_time.addListTeacher',['students'=>$students,'intership_time'=>$intership_time, 'teacher'=>$teacher]);
    }
    
    public function insert_list_teacher($intertime_id = null){
        global $request;
        $ids = $request->ids;
        $teachers = $request->teacher_id;
        $teacher_reviews = $request->teacher_reviewer;
        foreach($ids as $key => $id){
            $row = Intertime_students::find($id);
            $row->teacher_id = $teachers[$key];
            $row->teacher_reviewer = $teacher_reviews[$key];
            $row->save();
        }
        return redirect()->route('intership_time::listStudent',['intertime_id'=>$intertime_id]);
    }
    
    public function list_guide_teacher($intertime_id = null){
        $intership_time = Model::find($intertime_id);
        $teachers = Intertime_students::where('intertime_id',$intertime_id)->groupBy('teacher_id')->get();
        return view('intership_time.list_guide_teacher',['teachers'=>$teachers,'intership_time'=>$intership_time,'intertime_id'=>$intertime_id]);
    }
    
    public function listStudentOfGuideTeacher($intertime_id,$teacher_id){
        $intership_time = Model::find($intertime_id);
        $students = Intertime_students::where('teacher_id',$teacher_id)->where('intertime_id',$intertime_id)->get();
        $teacher = Teacher::find($teacher_id);
        return view('intership_time.listStudentOfGuideTeacher',['teacher'=>$teacher,'intership_time'=>$intership_time,'intertime_id'=>$intertime_id,'teacher_id'=>$teacher_id,'students'=>$students]);
    }

    public function view_topic(\App\Intertime_students $intership_student){
        return view('intership_time.viewtopic',['item'=>$intership_student]);
    }
    
}

?>