<?php

class users_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
	}
	
	public function index() { //calls users without specifying a method
		echo "Welcome to the users department";
	}
	
	public function signup() {
		echo "display the signup page";
	}
	
	public function login() {
		echo "display the login page";
	}
	
	public function logout() {
		echo "display the logout page";
	}
	
	public function profile($user_name) {
		//need to add an if statement in to handle cases of no user/nonexistant user entered
		echo "this is the profile of ".$user_name; //to pass the parameter (user name) in, tack it on to your url command (in order)
	}
	
}