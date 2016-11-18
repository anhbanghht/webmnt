<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intertime_students extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'list_student_by_intershiptime'; 
    
    protected $dates = ['deleted_at'];
    
    public function intership_time(){
        return $this->hasOne('App\Intership_time','id','intertime_id');
    }
    public function council(){
        return $this->hasOne('App\Council','id','council_id');
    }
    public function topics(){
        return $this->hasOne('App\Topic','id','topic_id');
    }
    public function teacher(){
        return $this->hasOne('App\Teacher','id','teacher_id');
    }
    public function gvpb(){
        return $this->hasOne('App\Teacher','id','teacher_reviewer');
    }
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }
    public function company(){
        return $this->hasOne('App\Company','id','company_id');
    }
    
}
?>