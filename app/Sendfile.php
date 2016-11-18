<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sendfile extends Model {

	protected $table = 'sendfiles';
	
	protected $fillable = ['title','file_name', 'created_by', 'state'];

}
