<?php namespace App\Libraries;
	
	use DB;
	use App\Http\Controllers\Controller;
    
	class Helps {
		static function getUser($id){
			$data = DB::table('users')->where('id', $id)->first();
			return $data;
		}
		static function getGroupUser($id){
			$data = DB::table('usergroup')->where('id', $id)->first();
			return $data;
		}
		static function getTeacher($id){
			$data = DB::table('teachers')->where('id', $id)->first();
			return $data;
		}
		static function getAssignTeacher($taskid){
			$data = DB::table('assigns')->where('taskid', '=', $taskid)->get();
			return $data;
		}
		static function getSubjectType($subjectname){
			$data = DB::table('subject')->where('subject_name', 'like', '%'.$subjectname.'%')->first();
			return $data;
		}
		static function getWork($id){
			$data = DB::table('works')->where('id', '=', $id)->first();
			return $data;
		}
		static function getTypeWork($id){
			$data = DB::table('work_types')->where('id', '=', $id)->first();
			return $data;
		}
		static function checkTask($date,$start,$location){
			$result = DB::table('tasks')
						->where('state', '=', 1)
						->where('date','=',date('Y-m-d',strtotime($date)))
						->where('location','=',$location)
						->where('start', '<', $start)
						->where('end', '>', $start)
						->get();
			if(count($result) > 0){
				return true;
			}else{
				return false;
			}
		}
		static function checkSendEmail($taskid,$teacherid){
			$result = DB::table('assigns')
						->where('taskid', $taskid)
						->where('teacherid',$teacherid)
						->first();
			if($result->send == 1){
				return true;
			}else{
				return false;
			}
		}
		
		static function getCustomerTableOnly($id,$table){
			$data = DB::table($table)->where('state', 1)->where('id', $id)->first();
			return $data;
		} 
		
		static function getCustomerTableAll($table){
			$data = DB::table($table)->where('state', 1)->get();
			return $data;
		} 
		
		static function getNew(){
			$getdate=strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " -5 day");
			$getdate= date('Y-m-d',$getdate);
			$news = DB::table('site_article')->where('state',1)->where('created_at','>=',$getdate)->take(5)->orderBy('id', 'desc')->get();
			return $news;
		}
		
		static function getTwoCategory(){
			$category = DB::table('site_category')->where('state',1)->take(2)->get();
			return $category;
		}
		
		static function getArticle($idcategory){
			$category = DB::table('site_article')->where('state',1)->where('categoryid','=',$idcategory)->take(4)->orderBy('id', 'desc')->get();
			return $category;
		}
		
	}

?>