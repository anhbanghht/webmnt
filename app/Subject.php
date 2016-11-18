<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'subject';
    protected $dates = ['deleted_at','updated_at','created_at','startdate']; 
    
    public function programs(){
        return $this->hasOne('App\Program','id','id_programs');
    }
}
?>