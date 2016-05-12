<?php

class AjaxPollController extends \BaseController {

	public function addPollMc(){
		if(Request::ajax()){
			$title = Input::get('title');
			$question = Input::get('question');
			$type = Input::get('type');
			$by = Auth::user()->id;
			$status = 'pending';
			$cats = json_encode(Input::get('cats'), true);
			$choices = Input::get('choices');
			$verified = Profile::whereUserId($by)->whereIsverified(1)->first();
			if(empty($verified)){
				return Response::json(array("status" => "not verified"));
			}else{
				$poll = Polls::create([
					'title' => $title,
					'question' => $question,
					'type' => $type,
					'status' => $status,
					'submittedbyid' => $by,
					'categoryid' => $cats,
				]);
				foreach ($choices as $value) {
				$c[] = new PollChoices([
					'polls_id' => $poll->id,
					'choice' => $value,
				]);
				}

				if($poll->pollchoices()->saveMany($c)){
					return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
			}
		}
	}

	public function addPollThumb(){
		if(Request::ajax()){
			$title = Input::get('title');
			$question = Input::get('question');
			$type = Input::get('type');
			$by = Auth::user()->id;
			$status = 'pending';
			$cats = json_encode(Input::get('cats'), true);
			$verified = Profile::whereUserId($by)->whereIsverified(1)->first();
			if(empty($verified)){
				return Response::json(array("status" => "not verified"));
			}else{
				$poll = Polls::create([
					'title' => $title,
					'question' => $question,
					'type' => $type,
					'status' => $status,
					'submittedbyid' => $by,
					'categoryid' => $cats,
				]);

				$c[] = new PollChoices([
					'polls_id' => $poll->id,
					'choice' => 'up',
				]);

				$c[] = new PollChoices([
					'polls_id' => $poll->id,
					'choice' => 'down',
				]);

				if($poll->pollchoices()->saveMany($c)){
					return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
			}
		}
	}

	public function addPollMood(){
		if(Request::ajax()){
			$title = Input::get('title');
			$question = Input::get('question');
			$type = Input::get('type');
			$by = Auth::user()->id;
			$status = 'pending';
			$cats = json_encode(Input::get('cats'), true);
			$moods = Input::get('moods');
			$verified = Profile::whereUserId($by)->whereIsverified(1)->first();
			if(empty($verified)){
				return Response::json(array("status" => "not verified"));
			}else{
				$poll = Polls::create([
					'title' => $title,
					'question' => $question,
					'type' => $type,
					'status' => $status,
					'submittedbyid' => $by,
					'categoryid' => $cats,
				]);
				foreach ($moods as $value) {
				$c[] = new PollChoices([
					'polls_id' => $poll->id,
					'choice' => $value,
				]);
				}
				if($poll->pollchoices()->saveMany($c)){
					return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
			}
		}
	}

	public function addPollRank(){
		if(Request::ajax()){
			$title = Input::get('title');
			$question = Input::get('question');
			$type = Input::get('type');
			$by = Auth::user()->id;
			$status = 'pending';
			$cats = json_encode(Input::get('cats'), true);
			$choices = Input::get('choices');
			$verified = Profile::whereUserId($by)->whereIsverified(1)->first();
			if(empty($verified)){
				return Response::json(array("status" => "not verified"));
			}else{
				$poll = Polls::create([
					'title' => $title,
					'question' => $question,
					'type' => $type,
					'status' => $status,
					'submittedbyid' => $by,
					'categoryid' => $cats,
				]);
				foreach ($choices as $value) {
				$c[] = new PollChoices([
					'polls_id' => $poll->id,
					'choice' => $value,
				]);
				}

				if($poll->pollchoices()->saveMany($c)){
					return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
			}
		}
	}

	public function addPollRating(){
		if(Request::ajax()){
			$title = Input::get('title');
			$question = Input::get('question');
			$type = Input::get('type');
			$by = Auth::user()->id;
			$status = 'pending';
			$cats = json_encode(Input::get('cats'), true);
			$ratingnumber = Input::get('ratingnumber');
			//$choices = Input::get('choices');
			$choices = array(Input::get('question'));
			$verified = Profile::whereUserId($by)->whereIsverified(1)->first();
			if(empty($verified)){
				return Response::json(array("status" => "not verified"));
			}else{
				$poll = Polls::create([
					'title' => $title,
					'question' => $question,
					'type' => $type,
					'status' => $status,
					'submittedbyid' => $by,
					'categoryid' => $cats,
					'no_rate' => $ratingnumber,
				]);
				foreach ($choices as $value) {
				$c[] = new PollChoices([
					'polls_id' => $poll->id,
					'choice' => $value,
				]);
				}

				if($poll->pollchoices()->saveMany($c)){
					return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
			}
		}
	}

	public function addPollUpick(){
		if(Request::ajax()){
			$title = Input::get('title');
			$question = Input::get('question');
			$type = Input::get('type');
			$by = Auth::user()->id;
			$status = 'pending';
			$cats = json_encode(Input::get('cats'), true);
			//$choices = json_encode(Input::get('choices'), true);
			$choices = Input::get('choices');
			$verified = Profile::whereUserId($by)->whereIsverified(1)->first();
			if(empty($verified)){
				return Response::json(array("status" => "not verified"));
			}else{
				$poll = Polls::create([
					'title' => $title,
					'question' => $question,
					'type' => $type,
					'status' => $status,
					'submittedbyid' => $by,
					'categoryid' => $cats,
				]);
				//$poll->save();
				foreach ($choices as $value) {
				$c[] = new PollChoices([
					'polls_id' => $poll->id,
					'choice' => $value,
				]);
				}
				//if($poll->pollchoices()->save($c)){
				if($poll->pollchoices()->saveMany($c)){
					return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
			}
		}
	}

	public function votePollUpick(){
		$pollid = Input::get('pollid');
		$choiceid = Input::get('choiceid');
		$checkVote = PollAnswers::whereUserid(Auth::user()->id)->wherePollid($pollid)->first();
		if($checkVote){
			return Response::json(array('status'=> 'exist'));
		}else{

			$vote = new PollAnswers;
			$vote->userid = Auth::user()->id;
			$vote->pollid = $pollid;
			$vote->choiceid = $choiceid;
			$vote->status = 1;

			if($vote->save()){
			return Response::json(array('status'=> 'success'));
			}else{
			return Response::json(array('status'=> 'failed'));	
			}
			
		}
	}

	public function votePollRate(){
		$pollid = Input::get('pollid');
		$choiceid = Input::get('choiceid');
		$rate = Input::get('rate');
		$checkVote = PollAnswers::whereUserid(Auth::user()->id)->wherePollid($pollid)->first();
		if($checkVote){
			return Response::json(array('status'=> 'exist'));
		}else{

			$vote = new PollAnswers;
			$vote->userid = Auth::user()->id;
			$vote->pollid = $pollid;
			$vote->choiceid = $choiceid;
			$vote->rate = $rate;
			$vote->status = 1;

			if($vote->save()){
			return Response::json(array('status'=> 'success'));
			}else{
			return Response::json(array('status'=> 'failed'));	
			}
			
		}
	}

	public function votePollMc()
	{
		$pollid = Input::get('pollid');
		$choiceid = Input::get('choiceid');
		$checkVote = PollAnswers::whereUserid(Auth::user()->id)->wherePollid($pollid)->first();
		if($checkVote){
			return Response::json(array('status'=> 'exist'));
		}else{
			foreach($choiceid as $c)
			{
				$vote = new PollAnswers;
				$vote->userid = Auth::user()->id;
				$vote->pollid = $pollid;
				$vote->choiceid = $c;
				$vote->status = 1;
				$vote->save();
			}

			return Response::json(array('status'=> 'success'));
			
			
		}
	}

}