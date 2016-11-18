<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Year;
use Carbon\Carbon;
use Validator;

class SchoolYear extends Controller{
    public function listYear(){
        $year = Year::all();
        return view('year.list',['year'=>$year]);
    }
    public function add(){
        return view('year.add');
    }
    public function create(){
        global $request;
        $rules = array(
            'year' => 'required',
            'startdate' => 'required|date|date_format:d/m/Y',
        );
        $messages = array(
            'year.required' => 'Bạn phải nhập tên năm học',
            'startdate.required' => "Bạn cần phải chọn ngày bắt đầu năm học",
            'startdate.date' => "Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $year = new Year();
            $year->year = $request->get('year');
            $year->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $year->note = $request->get('note');
            $year->save();
        }
        return redirect()->route('year::');
    }
    public function edit($id){
        $year = Year::find($id);
        return view('year.edit',['year'=>$year]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'year' => 'required',
            'startdate' => 'required|date|date_format:d/m/Y',
        );
        $messages = array(
            'year.required' => 'Bạn phải nhập tên năm học',
            'startdate.required' => "Bạn cần phải chọn ngày bắt đầu năm học",
            'startdate.date' => "Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        } else {
            $year = Year::find($id);
            $year->year = $request->get('year');
            $year->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $year->note = $request->get('note');
            $year->save();
        }
        return redirect()->route('year::');
    }
    
    public function delete($id){
        Year::destroy($id);
        return redirect()->route('year::');
    }
    public function view($id){
        $year = Year::find($id);
        $year->save();
        return view('year.view' ,['year'=>$year]);
    }
}

?>