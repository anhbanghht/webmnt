<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'company'; 
    
    protected $dates = ['deleted_at','updated_at','created_at','startdate']; 
    
    public function teacher(){
        return $this->hasOne('App\Teacher','id','teacher_id');
    }
    public function intership_time(){
        return $this->hasOne('App\Intership_time','id','intertime_id');
    }
}
?>