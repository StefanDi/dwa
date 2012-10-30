<?php

class nav_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
		
	}
	
	public function index() {
		
	}
	
	//displays My Profile View
	public function my_profile() {
		//creates a new blank template just for this method
		$template = View::instance('v_nav_my_profile');
		$template->addPost = View::instance('v_posts_add');
		$template->myPosts = View::instance('v_posts_my_posts');
		echo $template;
	}
	
	//don't need this anymore
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