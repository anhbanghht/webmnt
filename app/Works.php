<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model {

	//
	protected $table = 'works';
	
	protected $fillable = ['work_name', 'year', 'semesterid', 'typeid', 'description', 'notes', 'state'];
}
