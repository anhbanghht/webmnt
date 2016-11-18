<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Schedule extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'schedule'; 
    protected $dates = ['deleted_at','updated_at','created_at','startdate']; 
    
    
    
}
?>