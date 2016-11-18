<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'students'; 
    
    protected $dates = ['deleted_at','updated_at','created_at','startdate'];
    
    public function getBirthAttribute(){
        return date('d/m/Y',strtotime($this->dateofbirth));
    }
    
    public function topics(){
        return $this->hasMany('App\Topic','id','student_id');
    }
    public function courses(){
        return $this->hasOne('App\Courses','id','course_id');
    }
    
}
?>