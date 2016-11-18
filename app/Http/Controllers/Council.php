<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Council as Model;
use App\Council_group;
use App\Council_detail;
use App\Teacher;
use App\Year;
use App\Intertime_students;
use Carbon\Carbon;
use Validator;

class Council extends Controller{
    public function listcouncil($council_group_id = null){
        if($council_group_id)
            $council = Model::where('council_group_id',$council_group_id)->get();
        else
            $council = Model::all();
        $council_group = Council_group::all();
        return view('council.list',['council'=>$council,'council_group'=>$council_group,'council_group_id'=>$council_group_id]);
    }
    public function add($intertime_id = null){
        $teacher = Teacher::all();
        $council_group = Council_group::all();
        return view('council.add', ['teacher'=>$teacher,'council_group'=>$council_group]);
    }
    public function edit($id){
        $council = Model::find($id);
        $teacher = Teacher::all();
        $council_group = Council_group::all();
        return view('council.edit',['council'=>$council,'teacher'=>$teacher,'council_group'=>$council_group]);
    }
    
    public function update($id){
        global $request;
        $rules = array(
            'name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'place' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'time_start.date_format' => 'Bạn phải nhập đúng định dạng ngày: Giờ/phút',
            'time_end.date_format' => 'Bạn phải nhập đúng định dạng ngày: Giờ/phút'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $council = Model::find($id);
            $council->name = $request->get('name');
            $council->council_group_id = $request->council_group_id;
            $council->startdate = Carbon::createFromFormat('d/m/Y H:i:s', $request->get('startdate').' '.$request->get('time_start').':00' );
            $council->enddate = Carbon::createFromFormat('d/m/Y H:i:s', $request->get('startdate').' '.$request->get('time_end').':00' );
            $council->place = $request->get('place');
            $council->teacher = json_encode($request->teacher);
            $council->note = $request->get('note');
            $council->save();
        }
        return redirect()->route('council::');
    }
   
    public function create(){
        global $request;
        $rules = array(
            'name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i',
            'place' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'time_start.date_format' => 'Bạn phải nhập đúng định dạng ngày: Giờ/phút',
            'time_end.date_format' => 'Bạn phải nhập đúng định dạng ngày: Giờ/phút'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $council = new Model();
            $council->name = $request->get('name');
            $council->council_group_id = $request->council_group_id;
            $council->startdate = Carbon::createFromFormat('d/m/Y H:i:s', $request->get('startdate').' '.$request->get('time_start').':00' );
            $council->enddate = Carbon::createFromFormat('d/m/Y H:i:s', $request->get('startdate').' '.$request->get('time_end').':00' );
            $council->place = $request->get('place');
            $council->teacher = json_encode($request->teacher);
            $council->note = $request->get('note');
            $council->save();
        }
        return redirect()->route('council::');
    }
    
    public function add_council_detail($council_id = null){
        $council = Model::find($council_id);
        $students = Intertime_students::where('intertime_id',$council->council_group->intertime_id)->where('allow',1)->get();
        //Tat ca sinh vien da duoc them o cac hoi dong truoc
        $councilx = Model::where('council_group_id',$council->council_group->id)->get();
        $students_selected = array();
        foreach($councilx as $councily){
            foreach($councily->council_detail as $detail)
                $students_selected[] = $detail;
        }
        $students_selected = collect($students_selected);
        //Tat ca sinh vien da duoc add trong hoi dong
        $students_on_selected = $council->council_detail;
        return view('council_detail.addCouncilDetail' ,['students'=>$students, 'council'=>$council, 'council_id'=>$council_id, 'students_selected'=>$students_selected, 'students_on_selected'=>$students_on_selected]);
    }
    public function add_list_council_detail($id){
        global $request;
        $ids = $request->ids;
        if( $ids )
        foreach ( $ids as $the_id ){
            $st = new Council_detail();
            $st->council_id = $id;
            $st->list_student_by_intershiptime_id = $the_id;
            $st->save();
        }
        return redirect()->route('council::listCouncilDetail',['id'=>$id]);
    }
    public function list_council_detail($id){
        $council = Model::find($id); 
        $students = $council->council_detail;
        return view('council_detail.listCouncilDetail',['students'=>$students, 'council_id'=>$id, 'council'=>$council]);
    }

    public function add_student_point($id){
        $council = Model::find($id); 
        $students = $council->council_detail;
        return view('council_detail.addPoint',['students'=>$students, 'council_id'=>$id, 'council'=>$council]);
    }

    public function create_student_point($id){
        global $request;
        foreach( $request->gvhd as $key => $gvhd ){
            $gvhd = $request->gvhd[$key];
            $gvpb = $request->gvpb[$key];
            $tket = $request->tket[$key];
            $point = array(
                'gvhd' => $gvhd,
                'gvpb' => $gvpb,
                'tket' => $tket,
            );
            $detail = Council_detail::find($key);
            $detail->point = json_encode($point);
            $detail->save();
        }
        return redirect()->route('council::listCouncilDetail',['council_id'=>$id]);
    }

    public function delete($id){
        Model::destroy($id);
        return redirect()->route('council::');
    }
    public function view($id){
        $council = Model::find($id);
        return view('council.view' ,['council'=>$council]);
    }
}

?>