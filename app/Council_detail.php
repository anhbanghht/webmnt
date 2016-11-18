<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Council_detail extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'council_detail'; 
    
    protected $dates = ['deleted_at','updated_at','created_at']; 
    
    public function council(){
        return $this->hasOne('App\Council','id','council_id');
    }
    
    public function intertime_students(){
        return $this->hasOne('App\Intertime_students','id','list_student_by_intershiptime_id');
    }
    
}
?>