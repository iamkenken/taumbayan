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
			$choices = json_encode(Input::get('choices'), true);
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

				$c = new PollChoices([
					'choice' => $choices,
				]);

				if($poll->pollchoices()->save($c)){
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
			$moods = json_encode(Input::get('moods'), true);
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

				$c = new PollChoices([
					'choice' => $moods,
				]);

				if($poll->pollchoices()->save($c)){
					return Response::json(array("status" => "success"));
				}else{
					return Response::json(array("status" => "failed"));
				}
			}
		}
	}

}