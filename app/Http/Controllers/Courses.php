<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Courses as Model;
use Validator;
class Courses extends Controller{
    public function listCourses(){
        $courses = Model::all();
        return view('courses.list',['courses'=>$courses]);
    }
    public function add(){
        return view('courses.add');
    }
    public function edit($id){
        $courses = Model::find($id);
        return view('courses.edit',['courses'=>$courses]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'course' => 'required',
            'course_full' => 'required'
        );
        $messages = array(
            'course.required' => 'Bạn phải nhập tên khóa học!',
            'course_full.required' => 'Bạn phải nhập tên đầy đủ của khóa học!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $courses = Model::find($id);
            $courses->course = $request->get('course');
            $courses->course_full = $request->get('course_full');
            $courses->note = $request->get('note');
            $courses->save();
        }
        return redirect()->route('courses::');
    }
    public function create(){
        global $request;
        $rules = array(
            'course' => 'required',
            'course_full' => 'required'
        );
        $messages = array(
            'course.required' => 'Bạn phải nhập tên khóa học!',
            'course_full.required' => 'Bạn phải nhập tên đầy đủ của khóa học!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $courses = new Model();
            $courses->course = $request->get('course');
            $courses->course_full = $request->get('course_full');
            $courses->note = $request->get('note');
            $courses->save();
        }
        return redirect()->route('courses::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('courses::');
    }
    public function view($id){
        $courses = Model::find($id);
        return view('courses.view' ,['courses'=>$courses]);
    }
}
?>