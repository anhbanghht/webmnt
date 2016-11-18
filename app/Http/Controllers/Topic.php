<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Topic as Model;
use App\Topic_process;
use App\Intertime_students;
use Carbon\Carbon;
use Validator;
class Topic extends Controller{
    public function listTopic(){
        $topic = Model::all();
        return view('topic.list',['topic'=>$topic]);
    }
    public function add($id){
        $intertime_students = Intertime_students::find($id);
        return view('topic.add',['intertime_students'=>$intertime_students]);
    }
    public function edit($id){
        $intertime_students = Intertime_students::find($id);
        return view('topic.edit',['intertime_students'=>$intertime_students]);
    }
    
    public function update($id){
        $intertime_students = Intertime_students::find($id);
        global $request;
        $validator = \Validator::make($request->all(), [
            'topic_name' => 'required',
            'target' => 'required',
            'content' => 'required',
            'expect_result' => 'required'
        ],[
            'required' => "Trường :attribute là bắt buộc",
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $topic = Model::find($intertime_students->topics->id);
            $topic->topic_name = $request->get('topic_name');
            $topic->target = $request->get('target');
            $topic->content = $request->get('content');
            $topic->expect_result = $request->get('expect_result');
            $topic->save();
            
            $ids = $request->ids;
            $sub_startdate = $request->get('sub_startdate');
            $sub_enddate = $request->get('sub_enddate');
            $sub_description = $request->get('sub_description');
            $sub_content = $request->get('sub_content');
            $sub_result = $request->get('sub_result');
            $sub_note = $request->get('sub_note');
            if( count($ids) > 0 )
            foreach( $topic->topic_process as $item ){
                if( ! in_array( $item->id, $ids) ){
                    Topic_process::destroy($item->id);
                }
            }
            if($sub_startdate)
            foreach( $sub_startdate as $key => $row ){
                if($ids[$key] == '')
                $td = new Topic_process();
                else
                $td = Topic_process::find($ids[$key]);
                $td->startdate = Carbon::createFromFormat('d/m/Y', $sub_startdate[$key] );
                $td->enddate = Carbon::createFromFormat('d/m/Y', $sub_enddate[$key] );
                $td->description = $sub_description[$key];
                $td->topic_id = $topic->id;
                $td->content = $sub_content[$key];
                $td->result = $sub_result[$key];
                $td->note = $sub_note[$key];
                $td->save();
            }
            $intertime_students->topic_id = $topic->id;
            $intertime_students->save();
        }
        return redirect()->route('intership_time::listStudent',['intertime_id'=>$intertime_students->intertime_id]);
    }
    public function create($id){
        global $request;
        $validator = \Validator::make($request->all(), [
            'topic_name' => 'required',
            'target' => 'required',
            'content' => 'required',
            'expect_result' => 'required'
        ],[
            'required' => "Không được để trống"
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $topic = new Model();
            $topic->topic_name = $request->get('topic_name');
            $topic->target = $request->get('target');
            $topic->content = $request->get('content');
            $topic->expect_result = $request->get('expect_result');
            $topic->save();
            $sub_startdate = $request->get('sub_startdate');
            $sub_enddate = $request->get('sub_enddate');
            $sub_description = $request->get('sub_description');
            $sub_content = $request->get('sub_content');
            $sub_result = $request->get('sub_result');
            $sub_note = $request->get('sub_note');
            if($sub_startdate)
            foreach( $sub_startdate as $key => $row ){
                $td = new Topic_process();
                $td->startdate = Carbon::createFromFormat('d/m/Y', $sub_startdate[$key] );
                $td->enddate = Carbon::createFromFormat('d/m/Y', $sub_enddate[$key] );
                $td->topic_id = $topic->id;
                $td->description = $sub_description[$key];
                $td->content = $sub_content[$key];
                $td->result = $sub_result[$key];
                $td->note = $sub_note[$key];
                $td->save();
            }
            $intertime_students = Intertime_students::find($id);
            $intertime_students->topic_id = $topic->id;
            $intertime_students->save();
        }
        return redirect()->route('intership_time::listStudent',['intertime_id'=>$intertime_students->intertime_id]);
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('topic::');
    }
    public function listtopictime($time,$teacher){
        $topic = Model::where('teacher_id',$teacher)->where('intertime_id',$time)->get();
        return view('topic.listtime',['topic'=>$topic]);
    }
    
    public function process($id){
        $process = Topic_process::where('topic_id',$id)->get();
        return view('topic.process',['process'=>$process]);
    }
    
    public function updateprocess($id){
        global $request;
        $ids = $request->process;
        $note = $request->note;
        $topic = Model::find($id);
        $process = Topic_process::where('topic_id',$id)->get();
        foreach( $process as $item){
            if( isset($ids) && count($ids) > 0 && in_array( $item->id, $ids) ){
                $item->complete = 1;
            } else {
                $item->complete = 0;
            }
            if( isset( $note[$item->id] ) )
                $item->note = $note[$item->id];
            $item->save();
        }
        if( $process ){
            $complete = count($ids);
            $need = $process->count();
            $percent = ($complete/$need)*100;
            $topic = Model::find($id);
            $topic->process = $percent;
            $topic->save();
        }
        $intertime_students = Intertime_students::where('topic_id',$id)->get()->first();
        return redirect()->route('intership_time::listStudent',['intertime_id'=>$intertime_students->intertime_id]);
    }
    public function view($id){
        $topic = Model::find($id);
        return view('topic.view' ,['topic'=>$topic]);
    }
}

?>