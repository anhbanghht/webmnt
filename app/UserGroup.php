<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserGroup extends Model{
    
    use SoftDeletes;
    protected $table = 'usergroup';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    
    public function getStatusAttribute(){
        if( $this->active )
            return "Kích hoạt";
        else
            return "Ngừng hoạt động";
    }
    
    public function permission(){
        return $this->hasMany('\App\Permission','group','id');
    }
    
    public function has_permission($route_name){
        $allow = false;
        $rows = $this->permission;
        if( $rows->count() )
            $rows->each(function( $item, $key ) use($route_name,&$allow) {
                if( $item->modules )
                    if( $item->modules->route == $route_name )
                        return $allow = true;
            });
        return $allow;
    }
    
}
?>