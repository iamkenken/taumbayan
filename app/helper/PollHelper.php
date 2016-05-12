<?php

class PollHelper
{
	public static function votePercetage($pollid, $choiceid)
	{
		$pollanswers = Pollanswers::wherePollid($pollid)->whereStatus('1')->get();
		$voted = Pollanswers::wherePollid($pollid)->whereChoiceid($choiceid)->whereStatus('1')->get();
		if(count($pollanswers) > 0){
		$totalvotes = count($pollanswers);
		$choicevotes = count($voted);
		$percent = round((($choicevotes/$totalvotes) * 100), 2);
		return $percent;
		}

		return 0;
	}

	public static function getUser($id)
	{
		$user = User::with('profile')->whereId($id)->first();
		if($user)
		{
		$profile = $user->profile;
			return $user;
		}
		return null;
	}

	public static function getTypeName($type)
	{
		switch ($type)
		{
			case 'multiplechoice':
			echo 'Multiple Choice';
			break;
			case 'thumbs':
			echo 'Thumbs Up or Down';
			break;
			case 'upick';
			echo 'uPick';
			break;
			case 'rating';
			echo 'Rating';
			break;
			case 'ranking';
			echo 'Ranking';
			break;
			case 'mood';
			echo 'Mood Meter';
			break;
		}
	}

	public static function getMoodChoices($id, $mood)
	{
		$poll = Pollchoices::wherePollsId($id)->get();
		foreach($poll as $p)
		{
			if($p->choice == $mood)
			{
				return $p->id;
				exit();
			}
		}
	}

	public static function getThumbChoices($id, $thumb)
	{
		$poll = Pollchoices::wherePollsId($id)->get();
		foreach($poll as $p)
		{
			if($p->choice == $thumb)
			{
				return $p->id;
				exit();
			}
		}
	}

	public static function getPollRate($id)
	{
		$poll = Polls::whereId($id)->first();
		return $poll->no_rate;
	}

	public static function getMcChoices($id)
	{
		$poll = Pollchoices::wherePollsId($id)->get();
		return $poll;
	}

	public static function getRateChoices($id)
	{
		$poll = Pollchoices::wherePollsId($id)->first();
		return $poll;
	}


	public static function getUpickChoices($id)
	{
		$poll = Pollchoices::wherePollsId($id)->get();
		return $poll;
	}

	public static function getChoices($id)
	{
		$poll = Pollchoices::wherePollsId($id)->get();
		return $poll;
	}

	public static function getUserRate($id)
	{
		if(Auth::check())
		{
			$where = ['pollid' => $id, 'userid' => Auth::user()->id];
			$pollanswer = PollAnswers::where($where)->first();
			if($pollanswer)
			{
			return $pollanswer->rate;
			}
		}
	}

	public static function getTotalRating($id)
	{
		//(252*5 + 124*4 + 40*3 + 29*2 + 33*1) / (252 + 124 + 40 + 29 + 33)
		$poll = Polls::whereId($id)->first();
		$stars = $poll->no_rate;
		$pollanswers = PollAnswers::wherePollid($id)->get();
		if($pollanswers)
		{
			foreach($pollanswers as $a)
			{
					$rates[] = $a->rate;
			}
			$ratings = array_count_values($rates);
			$totalStars = 0;
			$voters = array_sum($ratings);
			foreach ($ratings as $stars => $votes) 
			{
			    $totalStars += $stars * $votes;
			}
			return $totalStars/$voters;
		}
	}

	
}

