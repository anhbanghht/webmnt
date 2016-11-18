<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Modules as Model;
use App\Users;

class Modules extends Controller{
    public function list_modules(){
        $info = Model::all();
        return view('modules.list',['info'=>$info]);
    }
    public function update_modules(){
        $routeCollection = \Route::getRoutes();
        foreach($routeCollection->getRoutes() as $route){
            if( in_array($route->getName(),['login','login','dologin','logout','denied',null]) ) continue;
            $module = Model::where('route','=', $route->getName() )->first();
            if( ! $module){
                $module = new Model();
                $module->name = $module->route = $route->getName();
                $module->save();
            }
            $permission = \App\Permission::where('module','=',$module->id)->first();
            if( ! $permission ){
                $permission = new \App\Permission();
                $permission->group = 2;
                $permission->module = $module->id;
                $permission->save();
            }
        }
        return redirect()->route('modules:');
    }
    
    public function edit($id){
        $data = Model::find($id);
        //dd($data->array_groups());
        $groups = \App\UserGroup::all();
        return view('modules.edit',['data'=>$data,'groups'=>$groups]);
    }
    
    public function update($id){
        global $request;
        $module = Model::find($id);
        $module->name = $request->name;
        $module->route = $request->route;
        $module->save();
        return redirect()->route('modules:');
    }
    
    public function del($id){
        global $request;
        Model::destroy($id);
        if ($request->ajax() || $request->wantsJson())
            return response()->json(['error'=>false,'text'=>'Xóa thành công!']);
        return ;
    }
}
?>