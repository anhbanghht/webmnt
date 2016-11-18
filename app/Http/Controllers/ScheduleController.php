<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use App\Schedule as Model;

use Illuminate\Http\Request;

class ScheduleController extends Controller{
    public function listschedule(){
        $schedule = Model::all();
        $teacher = DB::table('teachers')->get();
        return view('schedule.list',['schedule'=>$schedule, 'teacher'=>$teacher]);
    } 
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('schedule::');
    }
}

?>