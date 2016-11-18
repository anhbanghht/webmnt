<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'topic'; 
    
    protected $dates = ['deleted_at','updated_at','created_at'];
    
    public function intertime_students(){
        return $this->hasOne('App\Intertime_students','topic_id','id');
    }
    
    public function topic_process(){
        return $this->hasMany('App\Topic_process','topic_id','id');
    }
    
}
?>