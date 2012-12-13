<?php

class index_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://yourapp.com/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		//if user is blank, they're not logged in; redirect to login/registration page
		if(!$this->user) {
			Router::redirect("/users/login");
		}
		
		else {
			//they are logged in, bring them to their profile
			Router::redirect("/users/profile");
		}

	}
	
	
	
		
} // end class
