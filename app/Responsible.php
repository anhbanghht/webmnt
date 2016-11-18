<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsible extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'responsible'; 
    protected $dates = ['deleted_at','updated_at','created_at','startdate']; 
    
     public function record(){
        return $this->hasMany('App\Record','id_responsible','id');
    }
}
?>