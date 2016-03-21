<?php

class Polls extends Eloquent
{
	
	protected $table = "polls";
	protected $fillable = array('title', 'question', 'type', 'status', 'submittedbyid', 'categoryid');

	public function pollchoices(){
		return $this->hasMany('PollChoices');
	}

	public function pollanswers(){
		return $this->hasMany('PollAnswers', 'pollid');
	}

	/*public function upick(){
		return 	DB::table('polls')
				->join('pollchoices', 'polls.id', '=', 'pollchoices.polls_id')
	            ->join('pollanswers', 'polls.id', '=', 'pollanswers.pollid')
	            ->select('polls.id')
	            ->get();
	}*/



}