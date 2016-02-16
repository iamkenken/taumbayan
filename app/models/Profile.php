<?php

class Profile extends Eloquent{
	
	public $guarded = [];

	public function user(){
		return $this->belongsTo('User');
	}

}