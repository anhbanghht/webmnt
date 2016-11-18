<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model{
    
    use SoftDeletes; 
    protected $table = 'year'; 
    
    protected $dates = ['deleted_at','updated_at','created_at','startdate']; 
 
    public static function current(){
        //select max date < current time;
        $now = date('Y-m-d H:i:s', time());
        $result = Year::where('startdate',function($q){
            $q->select(\DB::raw("MAX(`startdate`) FROM `year` WHERE `startdate` < NOW() "));
        })->get();
        return $result->first();
    }
    
    public static function isCurrent($year){
        if( $year == Year::current() )
            return true;
        else
            return false;
    }
    
    public function plans(){
        return $this->hasMany('App\Plan','year_id','id');
    }
    
    public function intership_times(){
        return $this->hasMany('App\Intership_time','year_id','id');
    }
}
?>