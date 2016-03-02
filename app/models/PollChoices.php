<?php

class PollChoices extends Eloquent
{
	
	protected $table = "pollchoices";
	protected $fillable = array('choice');

	public function polls(){
		return $this->belongsTo('Polls');
	}
}