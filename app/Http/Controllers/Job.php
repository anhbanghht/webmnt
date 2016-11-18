<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Job as Model;
use App\Intership_time;
use App\Teacher;
use Carbon\Carbon;
use Validator;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\GoogleCalendar as Calendar;

class Job extends Controller{
    public function listJob($intertime_id=null){
        if($intertime_id)
            $job = Model::where('intertime_id',$intertime_id)->get();
        else
            $job = Model::all();
        $intership_time= Intership_time::all();
        return view('job.list',['job'=>$job,'intership_time'=>$intership_time,'intertime_id'=>$intertime_id,]);
    }
    public function add($id=null){
        $intership_time = Intership_time::all();
        $teacher = Teacher::where('working',1)->get();
        return view('job.add' ,['intership_time'=>$intership_time,'teacher'=>$teacher,'intertime_id'=>$id]);
    }
    public function edit($id){
        $intership_time = Intership_time::all();
        $job = Model::find($id);
        $teacher = Teacher::all();
        return view('job.edit',['job'=>$job,'intership_time'=>$intership_time,'teacher'=>$teacher]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'job_name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'enddate' => 'required|date_format:d/m/Y',
            'content' => 'required',
            'teacher' => 'required',
            'location' => 'required',
            'description' => 'required'
        );
        $messages = array(
            'required' => "Bạn phải nhập trường này!",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $job = Model::find($id);
            $job->job_name = $request->get('job_name');
            $job->intertime_id = $request->intertime_id;
            $job->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $job->enddate = Carbon::createFromFormat('d/m/Y', $request->get('enddate') );
            $job->teacher = json_encode($request->teacher);
            $job->content = $request->get('content');
            $job->location = $request->get('location');
            $job->description = $request->get('description');
            $job->important = $request->get('important')?$request->get('important'):0;
            $job->allday = $request->get('allday')?$request->get('allday'):0;
            $job->note = $request->get('note');
            $job->save();
            }
            //Google Calendar
            $calendar = new Calendar;
            if($job->event && $calendar->getEvent($job->event)->status == 'confirmed')
                $calendar->deleteEvent($job->event);
            $email = array();
            foreach($request->teacher as $teacher_id){
                $teacher = Teacher::find($teacher_id);
                $email[] = array('email'=>$teacher->email);
            }
            $event_id = $calendar->createEvent(
                $request->job_name,
                $request->location,
                $request->content,
                $job->startdate->format('Y-m-d')."T00:00:00+07:00",
                $job->enddate->format('Y-m-d')."T23:59:59+07:00",
                $email
            );
            $job->event = $event_id;
            $job->save();
        return redirect()->route('job::',['id'=>$id]);
    }
    public function create($id=null){
        global $request;
        $rules = array(
            'job_name' => 'required',
            'startdate' => 'required|date_format:d/m/Y',
            'enddate' => 'required|date_format:d/m/Y',
            'content' => 'required',
            'teacher' => 'required',
            'location' => 'required',
            'description' => 'required'
        );
        $messages = array(
            'required' => "Bạn phải nhập trường này!",
            'startdate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
            'enddate.date_format' => 'Bạn phải nhập đúng định dạng ngày: ngày/tháng/năm',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $job = new Model();
            $job->job_name = $request->get('job_name');
            $job->intertime_id = $request->intertime_id;
            $job->startdate = Carbon::createFromFormat('d/m/Y', $request->get('startdate') );
            $job->enddate = Carbon::createFromFormat('d/m/Y', $request->get('enddate') );
            $job->teacher = json_encode($request->teacher);
            $job->content = $request->get('content');
            $job->location = $request->get('location');
            $job->description = $request->get('description');
            $job->important = $request->get('important')?$request->get('important'):0;
            $job->allday = $request->get('allday')?$request->get('allday'):0;
            $job->note = $request->get('note');
            $job->save();
            }
            //Google Calendar
            $calendar = new Calendar;
            $email = array();
            foreach($request->teacher as $teacher_id){
                $teacher = Teacher::find($teacher_id);
                $email[] = array('email'=>$teacher->email);
            }
            $event_id = $calendar->createEvent(
                $request->job_name,
                $request->location,
                $request->content,
                $job->startdate->format('Y-m-d')."T00:00:00+07:00",
                $job->enddate->format('Y-m-d')."T23:59:59+07:00",
                $email
            );
            $job->event = $event_id;
            $job->save();
        
        return redirect()->route('job::',['id'=>$id]);
    }
    public function delete($id){
        $job = Model::find($id);
        $calendar = new Calendar;
        $calendar->deleteEvent($job->event);
        $job->delete();
        return redirect()->route('job::');
    }
    
    public function view($id){
        $job = Model::find($id);
        return view('job.view' ,['job'=>$job]);
    }
    
   public function import(){
        global $request;
        $file = $request->file('file');
        $opts = $request->all();
        //echo str_slug($opts['job_id'], '_');
        Excel::selectSheetsByIndex( intval($opts['sheet']-1) )->load($file->path(),function($reader) use($opts){
            $rows = $reader->toArray();
            foreach($rows as $row){
                $job = new Model();
                if(! $opts['job_name']=='' && $row[str_slug($opts['job_name'], '_')]){
                    $a = explode(',',$opts['job_name']);
                    if( count($a) == 1 )
                        $job->job_name = $row[str_slug($opts['job_name'], '_')];
                    else{
                        $name = array();
                        foreach( $a as $key => $b ){
                            $name[$key] = $row[str_slug($b,'_')];
                        }
                    }
                }
                if( $job->name == null ) continue;
                if( ! $opts['startdate'] == '' && $row[str_slug($opts['startdate'], '_')] )
                    $job->startdate = $row[str_slug($opts['startdate'], '_')];
                if( ! $opts['enddate'] == '' && $row[str_slug($opts['enddate'], '_')] )
                    $job->enddate = $row[str_slug($opts['enddate'], '_')];
                if( ! $opts['location'] == '' && $row[str_slug($opts['location'], '_')])
                    $job->location = $row[str_slug($opts['location'], '_')];
                if( ! $opts['teacher'] == '' && $row[str_slug($opts['teacher'], '_')]){
                    $teachers = explode(',', $row[str_slug($opts['teacher'], '_')]);
                    foreach($teachers as $key => $teacher){
                        $teachera = Teacher::where('teacher_name',trim($teacher))->get();
                        if( ! $teachera->isEmpty() )
                            $teachers[$key] = $teachera->first()->id;
                        else
                        $teachers[$key] = null;
                    }
                    $job->teacher = json_encode($teachers);
                }
                if( ! $opts['description'] == '' && $row[str_slug($opts['description'], '_')])
                    $job->description = $row[str_slug($opts['description'], '_')];
                if( ! $opts['note'] == '' && $row[str_slug($opts['note'], '_')])
                    $job->note = $row[str_slug($opts['note'], '_')];
                $job->save();
                //Create event;
            }
        },'UTF-8');
        return response()->json(['status'=>true]);
    }
}

?>