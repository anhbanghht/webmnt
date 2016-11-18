<?php namespace App\Http\Controllers;
use DB;
use Mail;
use App\Category;
use App\Article;
use App\Notes;
use App\Introduce;
use App\Libraries\Helps;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;
use Input;

class AdminsiteController extends Controller {

	public function listArticle()
	{
		$articels = Helps::getCustomerTableAll('site_article');
		$category = Helps::getCustomerTableAll('site_category');
		return view('adminsite.listarticle',['items' => $articels,'categorys'=>$category]);
	}
	
	public function getaddArticle()
	{
		$category = Helps::getCustomerTableAll('site_category');
		return view('adminsite.addarticle',['categorys'=>$category]);
	}
	
	public function postaddArticle(Request $data)
	{
		$category = Helps::getCustomerTableAll('site_category');
		if(!empty($data->title) && !empty($data->description) && !empty($data->content)):
			$img=''; $attach='';
			if (Input::file('image')):
				$img=$this->uploadfile('image','images');
			endif;
			if (Input::file('attach')):
				$attach = $this->uploadfile('attach','attachs');
			endif;
			
			$article = new Article();
			$article->categoryid 	= $data->categoryid;
			$article->title 		= $data->title;
			$article->description 	= $data->description;
			$article->content 		= $data->content;
			$article->image 		= $img;
			$article->attached 		= $attach;
			$article->state 		= $data->state;
			$article->created_by 	= $data->created_by;
			$article->save();
			if($article->id != 0 ):
				$message ="Lưu thành công!";
			else:
				$message ="Lưu thất bại!";
			endif;
		else:
			$message ="Error! Tên bài viết, nội dung bài viết, mô tả không được để trống!";
		endif;
		return view('adminsite.addarticle',['message'=>$message,'categorys'=>$category]);
	}
	
	static function uploadfile($file,$type){
		$this_name_file='';
		$destinationPath = 'uploads/'.$type.'/';
		$extension = Input::file($file)->getClientOriginalExtension();
		$fileName = $type.date('dmY').rand(111,999).'.'.$extension;
		Input::file($file)->move($destinationPath, $fileName);
		$pathfile = 'uploads/'.$type.'/'.$fileName;
		if(file_exists($pathfile)):
			$this_name_file = $fileName;
		else:
			if($type=="images"):
				$this_name_file="default.png";
			else:
				$this_name_file="";
			endif;
		endif;
		
		return $this_name_file;
	}
	
	public function geteditArticle($id)
	{
		$articels = Helps::getCustomerTableOnly($id,'site_article');
		$category = Helps::getCustomerTableAll('site_category');
		return view('adminsite.editarticle',['item'=>$articels,'categorys'=>$category]);
	}
	
	public function posteditArticle($id,Request $data){
		$articels = Helps::getCustomerTableOnly($id,'site_article');
		$category = Helps::getCustomerTableAll('site_category');
		$img=$articels->image; $attach=$articels->attached;
			if (Input::file('image')):
				$img=$this->uploadfile('image','images');
			endif;
			if (Input::file('attach')):
				$attach = $this->uploadfile('attach','attachs');
			endif;
		Article::where('id', $id)->update([
		'categoryid' => $data->categoryid,
		'title' => $data->title,
		'description'=>$data->description,
		'content'=>$data->content,
		'image'=>$img,
		'attached'=>$attach
		]);
		return redirect('/site/listarticle');
	}
	
	public function delArticle(Request $data)
	{
		$val = new stdClass();
		$id = $data->id;
		$result=Article::where('id', $id)->update(array('state' 	=> '-2'));
		$val->id=$id;
		if($result){
			$val->error=false;
			$val->link='listarticle';
		}else{
			$val->error=true;
		}
		echo json_encode($val);
	}
	
	//end Articel
	
	//Start Category
	public function listCategory(){
		$category = Helps::getCustomerTableAll('site_category');
		return view('adminsite.listcategory',['items' => $category]);
	}
	
	public function getaddCategory()
	{
		return view('adminsite.addcategory');
	}
	
	public function postaddCategory(Request $data)
	{
		$category = new Category();
		$category->title 		= $data->title;
		$category->description 	= $data->description;
		$category->created_by	= $data->created_by;
		$category->state 		= $data->state;
		$category->save();
		if($category->id != 0 ):
			$message ="Lưu thành công!";
		else:
			$message ="Lưu thất bại!";
		endif;
		return view('adminsite.addcategory',['message'=>$message]);
	}
	
	public function geteditCategory($id){
		$category = Helps::getCustomerTableOnly($id,'site_category');
		return view('adminsite.editcategory',['item'=>$category]);
	}
	
	public function posteditCategory($id,Request $data){
		$category = Helps::getCustomerTableOnly($id,'site_category');
		Category::where('id', $id)->update(['title' => $data->title,'description'=>$data->description]);
		return redirect('/site/listcategory');
	}
	
	public function delCategory(Request $data)
	{
		$val = new stdClass();
		$id = $data->id;
		$result=Category::where('id', $id)->update(array('state' 	=> '-2'));
		$val->id=$id;
		if($result){
			$val->error=false;
			$val->link='listcategory';
		}else{
			$val->error=true;
		}
		echo json_encode($val);
	}
	//End Category
	
	//Start notes
	public function listNotes(){
		$notes = Helps::getCustomerTableAll('site_notes');
		return view('adminsite.listnotes',['items' => $notes]);
	}
	
	public function getaddNotes()
	{
		return view('adminsite.addnotes');
	}
	
	public function postaddNotes(Request $data)
	{
		if (Input::file('attach')):
			$attach = $this->uploadfile('attach','attachs');
		endif;
		$notes = new Notes();
		$notes->title 		= $data->title;
		$notes->description = $data->description;
		$notes->attached	= $attach;
		$notes->state 		= $data->state;
		$notes->save();
		if($notes->id != 0 ):
			$message ="Lưu thành công!";
		else:
			$message ="Lưu thất bại!";
		endif;
		return view('adminsite.addnotes',['message'=>$message]);
	}
	
	public function geteditNotes($id){
		$notes = Helps::getCustomerTableOnly($id,'site_notes');
		return view('adminsite.editnotes',['item'=>$notes]);
	}
	
	public function posteditNotes($id,Request $data){
		$notes = Helps::getCustomerTableOnly($id,'site_notes');
		if (Input::file('attach')):
			$attach = $this->uploadfile('attach','attachs');
		else:
			$attach = $notes->attached;
		endif;
		Notes::where('id', $id)->update(['title' => $data->title,'description'=>$data->description,'attached'=>$attach]);
		return redirect('/site/listnotes');
	}
	
	public function delNotes(Request $data)
	{
		$val = new stdClass();
		$id = $data->id;
		$result=Notes::where('id', $id)->update(array('state' 	=> '-2'));
		$val->id=$id;
		if($result){
			$val->error=false;
			$val->link='listnotes';
		}else{
			$val->error=true;
		}
		echo json_encode($val);
	}
	//End Notes
	
	//Begin Interview
	public function geteditIntroduce($id){
		$introduce = Helps::getCustomerTableOnly($id,'site_introduce');
		return view('adminsite.editintroduce',['item'=>$introduce]);
	}
	
	public function posteditIntroduce($id,Request $data){
		$introduce = Helps::getCustomerTableOnly($id,'site_introduce');
		Introduce::where('id', $id)->update(['content'=>$data->content]);
		return view('adminsite.editintroduce',['item'=>$introduce,'message'=>'Lưu Thành Công!']);
	}
	//End Interview
	
	
	//Begin Message
	public function getinbox()
	{
		$inbox = DB::table('site_feedback')->get();
		return view('adminsite.inbox',['items'=>$inbox]);
	}
	public function getfeedback(Request $data)
	{
		$feedback = DB::table('site_feedback')->where('id',$data->id)->first();
		return view('adminsite.feedbacklayout',['id'=>$data->id,'feedback'=>$feedback]);
	}
	public function postfeedback(Request $data)
	{
		$feedback = DB::table('site_feedback')->where('id',$data->id)->first();
		DB::table('site_feedback')
			->where('id', $data->id)
			->update(['reply' => $data->message,'state' => 1]);
		$content=$data->message;
		
		Mail::raw('', function($message) use ($feedback,$content){
			$message->to($feedback->email,$feedback->name)->subject($feedback->subject)->setBody($content, 'text/html');
		});
	}
	//End Message
	
}