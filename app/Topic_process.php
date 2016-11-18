<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic_process extends Model{
    
    use SoftDeletes; 
    
    protected $table = 'topic_process'; 
    
    protected $dates = ['deleted_at','updated_at','created_at','startdate','enddate'];
    
    public function getStatusAttribute(){
        if( $this->complete )
            return "Đã hoàn thành";
        else
            return "Chưa hoàn thành";
    }

    public function getSdateAttribute(){
    	return Date('d/m/Y', strtotime($this->startdate) );
    }

    public function getEdateAttribute(){
    	return Date('d/m/Y', strtotime($this->enddate) );
    }
    
    
}
?>