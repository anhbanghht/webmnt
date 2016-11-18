<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Messages as Model;

class Chat extends Controller{

    public function get(){
    	$messages = Model::orderBy('created_at','DESC')->paginate(50);
    	return response()->json($messages);
    }

    public function send(){
    	global $request;
    	$messages = new Model();
    	$messages->content = $request->text;
    	$messages->created_at = $request->time;
    	$messages->group_id = \Auth::user()->group;
    	$messages->save();
    	return $messages;
    }

    public function check(){
    	global $request;
    	$messages = Model::where('status',1)->where('created_at','>',$request->time)->where('group_id','<>',$request->group)->orderBy('created_at','DESC')->get();
    	return response()->json($messages);
    }

    public function viewed(){}
}