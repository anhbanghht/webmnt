<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'courses'; 
    
    protected $dates = ['deleted_at','updated_at','created_at']; 
    
    public function intership_time(){
        return $this->hasOne('App\Intership_time','id','intertime_id');
    }
}
?>