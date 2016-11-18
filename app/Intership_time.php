<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intership_time extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'intership_time'; 
    
    protected $dates = ['deleted_at','updated_at','created_at','startdate','enddate'];
    
    public function intership_type(){
        return $this->hasOne('App\Intership_type','id','id_intertype');
    }
    
    public function topics(){
        return $this->hasMany('App\Topic','topic_id','id');
    }
    public function year(){
        return $this->hasOne('App\Year','id','year_id');
    }
  
    public function listStudent(){
        return $this->hasMany('App\Intertime_students','intertime_id','id');
    }
    
}
?>