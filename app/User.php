<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $table = 'user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dates = ['created_at','updated_at','deleted_at'];
    
    public function has_permission($route_name){
        return $this->usergroup->has_permission($route_name);
    }
    
    public function usergroup(){
        return $this->hasOne('\App\UserGroup','id','group');
    }
    
    public function teacher(){
        return $this->hasOne('App\Teacher','id','teacher_id');
    }
}
