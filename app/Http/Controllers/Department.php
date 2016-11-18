<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Department as Model;
use Validator;
class Department extends Controller{
    public function listDepartment(){
        $department = Model::all();
        return view('department.list',['department'=>$department]);
    }
    public function add(){
        return view('department.add');
    }
    public function edit($id){
        $department = Model::find($id);
        return view('department.edit',['department'=>$department]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'name' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên bộ môn!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $departments = Model::find($id);
            $departments->department_name = $request->get('name');
            $departments->note = $request->get('note');
            $departments->save();
        }
        return redirect()->route('department::');
    }
    public function create(){
        global $request;
        $rules = array(
            'name' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên bộ môn!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $departments = new Model();
            $departments->department_name = $request->get('name');
            $departments->note = $request->get('note');
            $departments->save();
        }
        return redirect()->route('department::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('department::');
    }
    public function view($id){
        $department = Model::find($id);
        return view('department.view' ,['department'=>$department]);
    }
}

?>