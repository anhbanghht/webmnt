<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Intership_type as Model;
use Validator;
class Intership_type extends Controller{
    public function listIntership_type(){
        $intership_type = Model::all();
        return view('intership_type.list',['intership_type'=>$intership_type]);
    }
    public function add(){
        return view('intership_type.add');
    }
    public function edit($id){
        $intership_type = Model::find($id);
        return view('intership_type.edit',['intership_type'=>$intership_type]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'intertype_name' => 'required',
            'intertype_fullname' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc"
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $intership_type = Model::find($id);
            $intership_type->intertype_name = $request->get('intertype_name');
            $intership_type->intertype_fullname = $request->get('intertype_fullname');
            $intership_type->allow = $request->get('allow')?$request->get('allow'):0;
            $intership_type->description = $request->get('description');
            $intership_type->note = $request->get('note');
            $intership_type->save();
        }
        return redirect()->route('intership_type::');
    }
    public function create(){
        global $request;
        $rules = array(
            'intertype_name' => 'required',
            'intertype_fullname' => 'required'
        );
        $messages = array(
            'required' => "Trường :attribute là bắt buộc"
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $intership_type = new Model();
            $intership_type->intertype_name = $request->get('intertype_name');
            $intership_type->intertype_fullname = $request->get('intertype_fullname');
            $intership_type->allow = $request->get('allow')?$request->get('allow'):0;
            $intership_type->description = $request->get('description');
            $intership_type->note = $request->get('note');
            $intership_type->save();
        }
        return redirect()->route('intership_type::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('intership_type::');
    }
    public function view($id){
        $intership_type = Model::find($id);
        return view('intership_type.view' ,['intership_type'=>$intership_type]);
    }
}
?>