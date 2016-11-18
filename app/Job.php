<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'job'; 
    
    protected $dates = ['deleted_at','updated_at','created_at']; 
    
    public function intership_time(){
        return $this->hasOne('App\Intership_time','id','intertime_id');
    }
    public function teacher(){
        return $this->hasMany('App\Teacher','teacher_id','id');
    }
    public function getImporAttribute(){
        if( $this->important )
            return "Có";
        else
            return "Không";
    }
    
    public function getAlldAttribute(){
        if( $this->allday )
            return "Có";
        else
            return "Không";
    }
   
}
?>