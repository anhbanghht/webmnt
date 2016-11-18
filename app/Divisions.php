<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Divisions extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'divisions'; 
    protected $dates = ['deleted_at','updated_at','created_at','startdate']; 
    
    public function subjects(){
        return $this->hasOne('App\Subject','id','id_subject');
    }
    public function department(){
        return $this->hasOne('App\Department','id','id_department');
    }
    public function teacher(){
        return $this->hasOne('App\Teacher','id','id_teacher');
    }
}
?>