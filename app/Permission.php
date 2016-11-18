<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Permission extends Model{
    use SoftDeletes;
    protected $table = 'permissions';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    
    public function modules(){
        return $this->hasOne('\App\Modules','id','module');
    }
}