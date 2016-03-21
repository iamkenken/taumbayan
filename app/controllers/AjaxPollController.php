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
				if($poll->save()){
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
			$vote->status = 0;

			if($vote->save()){
			return Response::json(array('status'=> 'success'));
			}else{
			return Response::json(array('status'=> 'failed'));	
			}
			
		}
	}

}