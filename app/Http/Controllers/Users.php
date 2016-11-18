<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User as Model;
use App\UserGroup;
use App\Modules;
use App\Permission;
use App\Teacher;
use Validator;

class Users extends Controller{
    
    public function dologin(){
        
        global $request;
        $user = array(
            'username' => $request->username,
            'password' => $request->password
        );
        if( \Auth::attempt($user) ){
            return redirect()->route('dashboard');
        }else
            return redirect()->route('login')->with(['errors'=>'Tài khoản hoặc mật khẩu không đúng!']);
    }
    public function list_group(){
        $group = UserGroup::all();
        return view('usergroups.list',['group'=>$group]);
    }
    
    public function create_group(){
        return view('usergroups.add');
    }
    
    public function insert_group(){
        global $request;
        $rules = array(
            'name' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên nhóm người dùng!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $group = new UserGroup();
            $group->name = $request->name;
            $group->description = $request->note;
            $group->active = $request->get('active')?$request->get('active'):0;
            $group->save();
        }
        return redirect()->route('users:groups:');
    }
    
    public function permission($id){
        $group = UserGroup::find($id);
        $modules = Modules::all();
        return view('permission',['group'=>$group,'modules'=>$modules]);
    }
    
    public function setPermission($id){
        global $request;
        $group = UserGroup::find($id);
        $modules = Modules::all();
        foreach( $modules as $module ){
            if( ! $group->has_permission($module->route) ){
                if( in_array( $module->id, $request->allows ) ){
                    $has = Permission::onlyTrashed()->where('group',$id)->where('module',$module->id)->get()->first();
                    if( $has ){
                        $has->restore();
                    } else {
                        $has = new Permission();
                        $has->module = $module->id;
                        $has->group = $id;
                        $has->save();
                    }
                }
            } else {
                if( ! in_array( $module->id, $request->allows ) ){
                    $has = Permission::where('group',$id)->where('module',$module->id)->get()->first();
                    $has->delete();
                }
            }
        }
        return redirect()->route('users:groups:permission',['id'=>$id]);
    }
    
    public function update($id){
        global $request;
        $rules = array(
            'name' => 'required'
        );
        $messages = array(
            'name.required' => 'Bạn phải nhập tên nhóm người dùng!'
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $group = UserGroup::find($id);
            $group->name = $request->name;
            $group->description = $request->note;
            $group->active = $request->get('active')?$request->get('active'):0;
            $group->save();
        }
        return redirect()->route('users:groups:');
    }
    
    
    
    public function edit($id){
        $data = UserGroup::find($id);
        return view('usergroups.edit',['data'=>$data]);
    }
    
    
    public function del($id){
        global $request;
        UserGroup::destroy($id);
        if ($request->ajax() || $request->wantsJson())
            return response()->json(['error'=>false,'text'=>'Xóa thành công!']);
        return ;
    }
    
    public function multiaction(){
        global $request;
        $ids = $request->ids;
        $action = $request->action;
        foreach( $ids as $id ){
            if( $action == 'delete' )
                UserGroup::destroy($id);
        }
        if ($request->ajax() || $request->wantsJson())
            return response()->json(['error'=>false,'text'=>'Đã thực hiện thành công!']);
        return ;
    }
    public function view($id){
        $group = UserGroup::find($id);
        return view('usergroups.view' ,['group'=>$group]);
    }
    
    // 
    
    public function list_user($group = null){
        if($group)
            $user = Model::where('group',$group)->paginate(10);
        else
            $user = Model::paginate(10);
        return view('user.list',['user'=>$user, 'group'=>$group]);
    }
    public function create_user(){
        $group = UserGroup::all();
        $teacher = Teacher::all();
        return view('user.add',['group'=>$group, 'teacher'=>$teacher]);
    }
    
    public function insert_user(){
        global $request;
        $rules = array(

            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
        );
        $messages = array(
             'required' => "Trường :attribute là bắt buộc",
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = new Model();
            $user->username = $request->username;
            $user->password = \Hash::make($request->password);
            $user->remember_token = '';
            $user->teacher_id = $request->teacher_id;
            $user->name = $request->name;
            $user->group = $request->group;
            $user->save();
        }
        return redirect()->route('users:');
    }
    public function edit_user($id){
        $data = Model::find($id);
        $group = UserGroup::all();
        $teacher = Teacher::all();
        return view('user.edit',['data'=>$data,'group'=>$group, 'teacher'=>$teacher]);
    } 
    public function update_user($id){
        global $request;
        $rules = array(

            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
        );
        $messages = array(
             'required' => "Trường :attribute là bắt buộc",
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if( $validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = Model::find($id);
            $user->username = $request->username;
            if($request->password)
            $user->password = \Hash::make($request->password);
            $user->remember_token = '';
            $user->teacher_id = $request->teacher_id;
            $user->name = $request->name;
            $user->group = $request->group;
            $user->save();
        }
        return redirect()->route('users:');
    }
    public function del_user($id){
        global $request;
        User::destroy($id);
        if ($request->ajax() || $request->wantsJson())
            return response()->json(['error'=>false,'text'=>'Xóa thành công!']);
        return ;
    }
    public function view_user($id){
        $data = Model::find($id);
        return view('user.view_user' ,['data'=>$data]);
    }
    

    public function changepass(){
        return view('user.changepass');
    }

    public function update_pass(){
        global $request;
        if( ! \Hash::check($request->old,\Auth::user()->password) ){
            return redirect()->route('users:changepass')->with(['error.old' => 'Mật khẩu không đúng']);
        } else {
            if( $request->new == $request->repass ){
                $user = \Auth::user();
                $user->password = \Hash::make($request->new);
                $user->save();
                return redirect()->route('users:view_user',['id'=>\Auth::user()->id]);
            }
            else{
                return redirect()->route('users:changepass')->with(['error.new' => 'Mật khẩu không trùng khớp']);
            }
        }
    }
}

?>