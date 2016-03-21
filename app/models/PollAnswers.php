<?php

class PollAnswers extends Eloquent
{
	
	protected $table = "pollanswers";
	protected $fillable = array('pollid, userid, choiceid');

	public function polls(){
		return $this->belongsTo('Polls');
	}

}