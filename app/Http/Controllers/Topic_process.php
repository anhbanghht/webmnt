<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Topic_process as Model;
use App\Topic;
use Carbon\Carbon;
use Validator;

class Topic_process extends Controller{
    public function listTopic_process(){
        $topic_process = Model::all();
        return view('topic_process.list',['topic_process'=>$topic_process]);
    }
    public function add(){
        return view('topic_process.add');
    }
    public function edit($id){
        $topic_process = Model::find($id);
        return view('topic_process.edit',['topic_process'=>$topic_process]);
    }
    public function update($id){
        global $request;
        $topic_process = Model::find($id);
        $topic_process->startdate = Carbon::createFromFormat('Y/m/d', $request->get('startdate') );
        $topic_process->enddate = Carbon::createFromFormat('Y/m/d', $request->get('enddate') );
        $topic_process->content = $request->get('content');
        $topic_process->description = $request->get('description');
        $topic_process->note = $request->get('note');
        $topic_process->result = $request->get('result');
        $topic_process->complete = $request->get('complete');
        $topic_process->save();
        return redirect()->route('topic_process::');
    }
    public function create(){
        global $request;
        $topic_process = new Model();
        $topic_process->startdate = Carbon::createFromFormat('Y/m/d', $request->get('startdate') );
        $topic_process->enddate = Carbon::createFromFormat('Y/m/d', $request->get('enddate') );
        $topic_process->content = $request->get('content');
        $topic_process->description = $request->get('description');
        $topic_process->note = $request->get('note');
        $topic_process->result = $request->get('result');
        $topic_process->complete = $request->get('complete');
        $topic_process->save();
        return redirect()->route('topic_process::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('topic_process::');
    }
}

?>