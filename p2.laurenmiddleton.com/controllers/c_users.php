<?php

class users_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
		$this->template->header = View::instance('v_header');
		$this->template->footer = View::instance('v_footer');
	}
	
	public function index() { //calls users without specifying a method
		echo "Welcome to the users department";
	}
	
	public function signup() {
		echo "This is the signup page";
	}
	
	public function login($login_success = NULL) { //this logic doesn't work right, needs to get fixed
		if($login_success == false) {
			$this->template->content = View::instance('v_log_in');
			$this->template->title = "Login";
			echo $this->template;
		}
		else {
			$this->template->content = View::instance('_v_main_content');
			$this->content_template->nav = View::instance('v_nav');
			$this->content_template->tabGuts = View::instance('v_my_feed');
			$this->template->title = "My Feed";
			echo $this->template;
			echo $this->content_template;
		}
		
	}
	
	public function logout() {
		echo "This is the logout page";
	}
	
	public function profile($user_name = NULL) {
		
		if($user_name == NULL) {
			echo "No user specified";
		}
		else {
			echo "This is the profile of ".$user_name; //to pass the parameter (user name) in, tack it on to your url command (in order)
		}
	}
	
	
}