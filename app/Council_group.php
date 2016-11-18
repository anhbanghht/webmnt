<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Council_group extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'council_group'; 
    
    protected $dates = ['deleted_at','updated_at','created_at']; 
    
    public function intership_time(){
        return $this->hasOne('App\Intership_time','id','intertime_id');
    }
    
}
?>