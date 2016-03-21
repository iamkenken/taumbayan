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

	public static function getUser($id){
		$user = User::with('profile')->whereId($id)->first();
		if($user)
		{
		$profile = $user->profile;
			return $user;
		}
		return null;
	}
}

