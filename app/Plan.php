<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'plan'; 
    
    protected $dates = ['deleted_at','updated_at','created_at','startdate','enddate'];
    
    public function year(){
        return $this->hasOne('App\Year','id','year_id');
    }
    public function intership_type(){
        return $this->hasOne('App\Intership_type','id','intertype_id');
    }

}
?>