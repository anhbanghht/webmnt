<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intership_type extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'intership_type'; 
    
    protected $dates = ['deleted_at','updated_at','created_at']; 
    
    public function getAlloAttribute(){
        if( $this->allow )
            return "Có";
        else
            return "Không";
    }
    
}
?>