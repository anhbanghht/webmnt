<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'records'; 
    protected $dates = ['deleted_at','updated_at','created_at','startdate'];
    
    public function teachers(){
        return $this->hasOne('App\Teacher','id','teacher');
    }
    
    public function subjects(){
        return $this->hasOne('App\Subject','id','subject');
    }
}
?>