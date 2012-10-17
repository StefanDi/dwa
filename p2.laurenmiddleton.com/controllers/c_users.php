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
	
	//submits the registration form
	public function p_signup() {
		
		//prints what data was submitted to the page
		print_r($_POST);
		
		//encrypts password before sending to DB
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		$_POST['created'] = Time::now(); //this returns the current timestamp
		$_POST['modified'] = Time::now();
		
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		//put the registration data in the database
		DB::instance(DB_NAME)->insert('users', $_POST);
	}
	
	public function login() { //this logic doesn't work right, needs to get fixed
			$this->template->content = View::instance('v_log_in');
			$this->template->title = "Login";
			echo $this->template;
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