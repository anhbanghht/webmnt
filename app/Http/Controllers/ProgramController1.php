<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Program as Model;
class ProgramController1 extends Controller{
    public function listprogram1(){
        $program1 = Model::all();
        return view('program1.list',['program1'=>$program1]);
    }
    public function add(){
        return view('program1.add');
    }
    public function edit($id){
        $program1 = Model::find($id);
        return view('program1.edit',['program1'=>$program1]);
    }
    public function update($id){
        global $request;
        $program1s = Model::find($id);
        $program1s->name = $request->get('name');
        $program1s->chitiet = $request->get('chitiet');
        $program1s->note = $request->get('note');
        $program1s->save();
        return redirect()->route('program1::');
    }
    public function create(){
        global $request;
        $program1s = new Model();
        $program1s->name = $request->get('name');
        $program1s->chitiet = $request->get('chitiet');
        $program1s->note = $request->get('note');
        $program1s->save();
        return redirect()->route('program1::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('program1::');
    }
    public function view($id){
        $program1 = Model::find($id);
        return view('program1.view' ,['program1'=>$program1]);
    }
}

?>