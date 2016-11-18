<?php namespace App\Http\Controllers;

use DB,stdClass;
use Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class SiteController extends Controller {

	public function index()
	{
		$category_slide=DB::table('site_category')->where('state',1)->where('title','like','%Slide%')->first();
		$slide=DB::table('site_article')->where('state',1)->take(3)->where('id',$category_slide->id)->get();
		$article_popular=DB::table('site_article')->where('state',1)->take(10)->orderBy('number_view', 'desc')->get();
		$notes_new=DB::table('site_notes')->where('state',1)->take(3)->orderBy('id', 'desc')->get();
		$article_new=DB::table('site_article')->where('state',1)->take(3)->orderBy('id', 'desc')->get();
		$teachers = DB::table('teachers')->where('state', '=', 1)->orderBy('id', 'asc')->get();
		$tasks = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->orderBy('task_name', 'asc')->get();
		$task=array();
		foreach($tasks as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$task[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$task[]=$t;
				endif;
			endif;
		}
		return view('site.homepage',['slide'=>$slide,'popular'=>$article_popular,'new'=>$article_new,'task'=>$task,'notes'=>$notes_new,'teachers'=>$teachers]);
	}
	
	public function contact()
	{
		return view('site.contactpage');
	}
	
	public function feedback(Request $data)
	{
		$error='';
		if($data->name!=''):
			if($data->email!=''):
				if($data->subject!=''):
					if($data->message!=''):
						$id=DB::table('site_feedback')->insertGetId([
							'name'		=> $data->name,
							'email' 	=> $data->email, 
							'subject' 	=> $data->subject,
							'message' 	=> $data->message,
							'state' 	=> 0,
						]);
						$error="Cảm ơn bạn đã gửi phản hồi!";
					else:
						$error="Nội dung phản hồi không được để trống!";
					endif;
				else:
					$error="Chủ đề không được để trống!";
				endif;
			else:
				$error="Email không được để trống!";
			endif;
		else:
			$error="Tên không được để trống!";
		endif;
		return view('site.contactpage',['error'=>$error]);
	}
	
	public function detail($id)
	{
		$article=DB::table('site_article')->where('state',1)->where('id',$id)->first();
		$article_new=DB::table('site_article')->where('state',1)->take(5)->orderBy('id', 'desc')->get();
		$tasks = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->orderBy('task_name', 'asc')->get();
		$task=array();
		foreach($tasks as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$task[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$task[]=$t;
				endif;
			endif;
		}
		return view('site.detailpage',['item'=>$article,'new'=>$article_new,'task'=>$task]);
	}
	public function allarticle()
	{
		$articles=DB::table('site_article')->where('state',1)->paginate(4);
		$article_new=DB::table('site_article')->where('state',1)->take(5)->orderBy('id', 'desc')->get();
		$tasks = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->orderBy('task_name', 'asc')->get();
		$task=array();
		foreach($tasks as $t){
			if($t->alltime==0):
				if(strtotime(date('Y-m-d',strtotime($t->date))) >= strtotime(date('Y-m-d'))):
					$task[]=$t;
				endif;
			else:
				if(strtotime(date('Y-m-d',strtotime($t->end))) >= strtotime(date('Y-m-d'))):
					$task[]=$t;
				endif;
			endif;
		}
		return view('site.allpage',['items'=>$articles,'new'=>$article_new,'task'=>$task]);
	}
	
	public function allnotes()
	{
		$notes=DB::table('site_notes')->where('state',1)->orderBy('id', 'desc')->paginate(10);
		return view('site.allnote',['items'=>$notes]);
	}
	public function detailnotes($id)
	{
		$notes=DB::table('site_notes')->where('state',1)->where('id', $id)->first();
		return view('site.detailnote',['p'=>$notes]);
	}
	
	public function allevent()
	{
		$tasks = DB::table('tasks')->where('state', '=', 1)->whereRaw('number = assign')->orderBy('id', 'desc')->paginate(10);
		return view('site.allevent',['items'=>$tasks]);
	}
	
	public function detailevent($id)
	{
		$tasks = DB::table('tasks')->where('id', '=', $id)->whereRaw('number = assign')->where('state', '=', 1)->first();
		$teacher=DB::table('assigns')->where('taskid', '=', $id)->get();
		return view('site.detailevent',['item'=>$tasks,'teacher'=>$teacher]);
	}
}