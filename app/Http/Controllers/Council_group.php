<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Council_group as Model;
use App\Intership_time;
use Validator;

class Council_group extends Controller{
    public function listcouncil_group($intertime_id=null){
        if($intertime_id)
            $council_group = Model::where('intertime_id',$intertime_id)->get();
        else
            $council_group = Model::all();
        $intership_time= Intership_time::all();
        return view('council_group.list',['council_group'=>$council_group,'intership_time'=>$intership_time,'intertime_id'=>$intertime_id]);
    }
    public function add(){
        $intership_time = Intership_time::all();
        return view('council_group.add',['intership_time'=>$intership_time]);
    }
    public function edit($id){
        $council_group = Model::find($id);
        $intership_time = Intership_time::all();
        return view('council_group.edit',['council_group'=>$council_group,'intership_time'=>$intership_time]);
    }
    
    public function update($id){
        global $request;
        $rules = array(
            'name' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên nhóm hội đồng!',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $council_group = Model::find($id);
            $council_group->name = $request->get('name');
            $council_group->intertime_id = $request->intertime_id;
            $council_group->save();
        }
        return redirect()->route('council_group::');
    }
   
    public function create(){
        global $request;
        $rules = array(
            'name' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên nhóm hội đồng!',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $council_group = new Model();
            $council_group->name = $request->get('name');
            $council_group->intertime_id = $request->intertime_id;
            $council_group->save();
        }
        return redirect()->route('council_group::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('council_group::');
    }
    public function view($id){
        $council_group = Model::find($id);
        return view('council_group.view' ,['council_group'=>$council_group]);
    }
}

?>