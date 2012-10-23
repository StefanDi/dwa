<?php

class nav_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
		
	}
	
	//initializes the nav to My Profile
	public function index() {
		$this->template->header = View::instance('v_header');
		//show logged in header
		$this->template->header->welcome = View::instance('v_header_welcome');
		$this->template->footer = View::instance('v_footer');
		$this->template->content = View::instance('v_main_content');
		$this->template->content->nav = View::instance('v_nav');
		$this->template->content->tabGuts = View::instance('v_my_profile');
		$this->template->title = "My Profile";
		echo $this->template;
	}
	
	//displays My Profile View
	public function showMyProfile() {
		//creates a new blank template just for this method
		$template = View::instance('v_my_profile');
		echo $template;
	}
	
	//displays My Feed View
	public function showMyFeed() {
		//creates a new blank template just for this method
		$template = View::instance('v_my_feed');
		echo $template;
	}
	
	//displays My Posts View
	public function showMyPosts() {
		//creates a new blank template just for this method
		$template = View::instance('v_my_posts');
		echo $template;
	}
	
	//displays My Follows View
	public function showMyFollows() {
		//creates a new blank template just for this method
		$template = View::instance('v_my_follows');
		echo $template;
	}
	
	//displays All Users view
	public function showAllUsers() {
		//creates a new blank template just for this method
		$template = View::instance('v_all_users');
		echo $template;
	}
	
	//displays Customize view
	public function showCustomize() {
		//creates a new blank template just for this method
		$template = View::instance('v_customize');
		echo $template;
	}
	
}