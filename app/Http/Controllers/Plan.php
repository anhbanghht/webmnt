<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Plan as Model;
use App\Year;
use Carbon\Carbon;
use App\Intership_type;
use Validator;
class Plan extends Controller{
    public function listPlan($year_id=null){
        if($year_id)
            $plan = Model::where('year_id',$year_id)->paginate(10);
        else
            $plan = Model::paginate(10);
        $year = Year::all();
        return view('plan.list',['plan'=>$plan, 'year'=>$year, 'year_id'=> $year_id]);
    }
    public function add($year_id = null){
        if( ! $year_id )
            $year = Year::all();
        else
            $year = Year::find($year_id);
        $intership_type = Intership_type::all();
        return view('plan.add',[ 'year'=>$year, 'year_id'=> $year_id, 'intership_type'=>$intership_type]);
    }
    public function edit($id){
        $plan = Model::find($id);
        $year = Year::all();
        $intership_type = Intership_type::all();
        return view('plan.edit',['plan'=>$plan, 'year'=>$year , 'intership_type'=>$intership_type]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'plan_name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'enddate' => 'required|date_format:d/m/Y',
            'content' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $plan = Model::find($id);
            $plan->plan_name = $request->get('plan_name');
            $plan->year_id = $request->year_id;
            $plan->intertype_id = $request->intertype_id;
            $plan->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $plan->enddate = Carbon::createFromFormat('d/m/Y', $request->get('enddate') );
            $plan->content = $request->get('content');
            $plan->description = $request->get('description');
            $plan->note = $request->get('note');
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = 'FILE_'.time().'.'.$file->getClientOriginalExtension();
                $upload_dir = 'public/uploads/plan_file';
                $file->move($upload_dir, $name);
                $plan->file = $upload_dir.'/'.$name;
            }
            $plan->viewed = 0;
            $plan->save();
        }
        return redirect()->route('plan::');
    }
    public function create(){
        global $request;
        $rules = array(
            'plan_name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'enddate' => 'required|date_format:d/m/Y',
            'content' => 'required',
            'file' => 'required'
        );
        $messages = array(
            'required' => "Bạn cần phải nhập dữ liệu cho trường này",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $plan = new Model();
            $plan->plan_name = $request->get('plan_name');
            $plan->year_id = $request->year_id;
            $plan->intertype_id = $request->intertype_id;
            $plan->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $plan->enddate = Carbon::createFromFormat('d/m/Y', $request->get('enddate') );
            $plan->content = $request->get('content');
            $plan->description = $request->get('description');
            $plan->note = $request->get('note');
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $name = 'FILE_'.time().'.'.$file->getClientOriginalExtension();
                $upload_dir = 'public/uploads/plan_file';
                $file->move($upload_dir, $name);
                $plan->file = $upload_dir.'/'.$name;
            }
            $plan->viewed = 0;
            $plan->save();
        }
        return redirect()->route('plan::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('plan::');
    }
    public function view($id){
        $plan = Model::find($id);
        $plan->viewed = 1;
        $plan->save();
        return view('plan.view' ,['plan'=>$plan]);
    }
}

?>