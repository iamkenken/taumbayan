<?php

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequestException;
use Facebook\FacebookRequest;

class FbHelper
{
	private $helper;
	private $session;

	public function __construct(){
		FacebookSession::setDefaultApplication(Config::get('facebook.app_id'), Config::get('facebook.app_secret'));
		$this->helper = new FacebookRedirectLoginHelper(url('login/fb/callback'));
	}

	public function getUrlLogin(){
		return $this->helper->getLoginUrl(Config::get('facebook.app_scope'));
	}

	public function generateSessionFromRedirect(){
		$this->session = null;
		try{
			$this->session = $this->helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex){

		} catch(\Exception $ex){

		}
		return $this->session;
	}

	public function generateSessionFromToken($token){
		$this->session = new FacebookSession($token);
		return $this->session;
	}

	public function getToken(){
		return $this->session->getToken();
	}

	public function getGraph(){
		$request = new FacebookRequest($this->session, 'GET', '/me?fields=email,first_name, last_name, id, birthday, gender');
		$response = $request->execute();
		return $response->getGraphObject();
	}

}