<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Program extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'programs'; 
    protected $dates = ['deleted_at','updated_at','created_at','startdate']; 
    
    
    
}
?>