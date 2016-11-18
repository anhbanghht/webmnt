<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Modules extends Model{
    use SoftDeletes;
    protected $table = 'modules';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    
    public function permissions(){
        return $this->hasOne('\App\Permission','module','id');
    }
    
    public function array_groups(){
        return $this->permissions()->orderBy('group')->get();
        
    }
}
?>