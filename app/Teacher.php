<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'teachers'; 
    
    protected $dates = ['deleted_at','updated_at','created_at']; 
    
    public function getBirthAttribute(){
        return date('d/m/Y',strtotime($this->dateofbirth));
    }
    
    public function department(){
        return $this->hasOne('App\department','id','id_department');
    }
    public function getWorkAttribute(){
        if( $this->working )
            return "Có";
        else
            return "Không";
    }
    
}
?>