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
	
	public function login($login_success = true) { //this logic doesn't work right, needs to get fixed
		if($login_success == false) {
			$this->template->content = View::instance('v_log_in');
			$this->template->title = "Login";
			echo $this->template;
		}
		else {
			//load My Feed
			$this->template->content = View::instance('v_main_content');
			$this->template->content->nav = View::instance('v_nav');
			$this->template->content->tabGuts = View::instance('v_tab_guts');
			$this->template->content->tabGuts->myFeed = View::instance('v_my_feed');
			$this->template->content->tabGuts->myPosts = View::instance('v_my_posts');
			$this->template->content->tabGuts->myFollows = View::instance('v_my_follows');
			$this->template->content->tabGuts->allUsers = View::instance('v_all_users');
			$this->template->content->tabGuts->customize = View::instance('v_customize');
			$this->template->title = "My Feed";
			echo $this->template;
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
			$this->template->content = View::instance('v_main_content');
			$this->template->content->nav = View::instance('v_nav');
			$this->template->content->tabGuts = View::instance('v_tab_guts');
			$this->template->content->tabGuts->myFeed = View::instance('v_my_feed');
			$this->template->content->tabGuts->myPosts = View::instance('v_my_posts');
			$this->template->content->tabGuts->myFollows = View::instance('v_my_follows');
			$this->template->content->tabGuts->allUsers = View::instance('v_all_users');
			$this->template->content->tabGuts->customize = View::instance('v_customize');
			$this->template->title = "My Feed";
			echo $this->template;
		}
	}
	
	
}