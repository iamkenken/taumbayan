<?php

class CMSAjaxController extends \BaseController
{
	public function deleteUser(){
		$userId = Input::get('id');
		$user = User::with('profile')->find($userId);
		if($user->profile->delete()){
			$user->delete();
			return Response::json(array('status' => 'ok'));
		}else{
			return Response::json(array('status' => 'failed'));
		}
	}
}