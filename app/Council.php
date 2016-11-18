<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Council extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'council'; 
    
    protected $dates = ['deleted_at','updated_at','created_at']; 
    
    public function council_group(){
        return $this->hasOne('App\Council_group','id','council_group_id');
    }
    public function council_detail(){
        return $this->hasMany('App\Council_detail','council_id','id');
    }
    
}
?>