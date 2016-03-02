<?php

class Polls extends Eloquent
{
	
	protected $table = "polls";
	protected $fillable = array('title', 'question', 'type', 'status', 'submittedbyid', 'categoryid');

	public function pollchoices(){
		return $this->hasOne('PollChoices');
	}

}