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
		$this->template->content->tabGuts = View::instance('v_nav_my_profile');
		$this->template->content->tabGuts->addPost = View::instance('v_posts_add');
		$this->template->title = "My Profile";
		echo $this->template;
	}
	
	//displays My Profile View
	public function my_profile() {
		//creates a new blank template just for this method
		$template = View::instance('v_nav_my_profile');
		$template->addPost = View::instance('v_posts_add');
		echo $template;
	}
	
	//displays My Feed View
	public function my_feed() {
		//creates a new blank template just for this method
		$template = View::instance('v_nav_my_feed');
		echo $template;
	}
	
	//displays My Posts View
	public function my_posts() {
		//creates a new blank template just for this method
		$template = View::instance('v_nav_my_posts');
		echo $template;
	}
	
	//displays My Follows View
	public function my_follows() {
		//creates a new blank template just for this method
		$template = View::instance('v_nav_my_follows');
		echo $template;
	}
	
	//displays All Users view
	public function all_users() {
		//creates a new blank template just for this method
		$template = View::instance('v_nav_all_users');
		echo $template;
	}
	
	//displays Customize view
	public function customize() {
		//creates a new blank template just for this method
		$template = View::instance('v_nav_customize');
		echo $template;
	}
	
}