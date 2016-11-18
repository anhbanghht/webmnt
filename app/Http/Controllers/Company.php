<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Company as Model;
use App\Teacher;
use Validator;
use App\Intership_time;
class Company extends Controller{
    public function listCompany(){
        $company = Model::all();
        return view('company.list',['company'=>$company]);
    }
    public function add(){
        $teacher = Teacher::all();
        $intership_time = Intership_time::all();
        return view('company.add', ['teacher'=>$teacher, 'intership_time'=>$intership_time]);
    }
    public function edit($id){
        $company = Model::find($id);
        $teacher = Teacher::all();
        $intership_time = Intership_time::all();
        return view('company.edit',['company'=>$company,  'teacher'=>$teacher, 'intership_time'=>$intership_time]);
    }
    public function update($id){
        global $request;
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
            'subject' => 'required',
            'student_quantity' => 'required|numeric',
            'guide_people' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên cơ sở thực tập!',
            'email.required' => "Bạn cần nhập email",
            'email.email' => 'Bạn phải nhập đúng định dạng email',
            'phone.numeric' => 'Số điện thoại chỉ chấp nhập số',
            'phone.required' => 'Bạn phải nhập đúng định dạng số điện thoại!',
            'address.numeric' => 'Trường địa chỉ không được để trống!',
            'subject.required' => "Trường lĩnh vực hoạt động không được để trống!",
            'student_quantity.required' => 'Bạn phải nhập số lượng sinh viên thực tập tại cơ sở!',
            'guide_people.required' => 'Bạn phải nhập họ tên người hướng dẫn tại cơ sở!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $company = Model::find($id);
            $company->company_name = $request->get('name');
            $company->email = $request->get('email');
            $company->website = $request->get('website');
            $company->phone = $request->get('phone');
            $company->address = $request->get('address');
            $company->subject = $request->get('subject');
            $company->student_quantity = $request->get('student_quantity');
            $company->guide_people = $request->get('guide_people');
            $company->teacher_id = $request->teacher_id;
            $company->intertime_id = $request->intertime_id;
            $company->description = $request->get('description');
            $company->note = $request->get('note');
            $company->save();
        }
            return redirect()->route('company::');
    }
    public function create(){
        global $request;
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits',
            'address' => 'required',
            'subject' => 'required',
            'student_quantity' => 'required|digits',
            'guide_people' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên cơ sở thực tập!',
            'email.required' => "Bạn cần phải nhập đúng định dạng email!",
            'phone.required' => 'Bạn phải nhập đúng định dạng số điện thoại!',
            'address.required' => 'Trường địa chỉ không được để trống!',
            'subject.required' => "Trường lĩnh vực hoạt động không được để trống!",
            'student_quantity.required' => 'Bạn phải nhập số lượng sinh viên thực tập tại cơ sở!',
            'guide_people.required' => 'Bạn phải nhập họ tên người hướng dẫn tại cơ sở!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $company = new Model();
            $company->company_name = $request->get('name');
            $company->email = $request->get('email');
            $company->website = $request->get('website');
            $company->phone = $request->get('phone');
            $company->address = $request->get('address');
            $company->subject = $request->get('subject');
            $company->student_quantity = $request->get('student_quantity');
            $company->guide_people = $request->get('guide_people');
            $company->teacher_id = $request->teacher_id;
            $company->intertime_id = $request->intertime_id;
            $company->description = $request->get('description');
            $company->note = $request->get('note');
            $company->save();
        }
        return redirect()->route('company::');
    }
    public function delete($id){
        Model::destroy($id);
        return redirect()->route('company::');
    }
    public function view($id){
        $company = Model::find($id);
        return view('company.view' ,['company'=>$company]);
    }
    
}

?>