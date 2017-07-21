<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {
	
	protected $table = 'services';
	public $timestamps = true;
	
	/* Creating rules */
	public static $rules_create = array(
		'user_id'=>'required',
		'name'=>'required',
		'tag'=>'required',
		'status'=>'required',
		'image'=>'required',
		'investment'=>'required',
		'funded'=>'required',
		'summary'=>'required',
		'content'=>'required',
	);

	/* Updating rules */
	public static $rules_edit = array(
		'id'=>'required',
		'user_id'=>'required',
		'name'=>'required',
		'tag'=>'required',
		'status'=>'required',
		'image'=>'required',
		'investment'=>'required',
		'funded'=>'required',
		'summary'=>'required',
		'content'=>'required',
	);
	   
	public function type() {
        return $this->belongsTo('App\Type');
    }

}