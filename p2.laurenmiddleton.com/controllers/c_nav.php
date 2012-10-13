<?php

class nav_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
	}
	
	//displays My Feed View
	public function showMyFeed() {
		$this->template->content = View::instance('v_my_feed');
		$this->template->title = "My Feed";
		echo $this->template;
	}
	
	//displays My Posts View
	public function showMyPosts() {
		$this->template->content = View::instance('v_my_posts');
		$this->template->title = "My Posts";
		echo $this->template;
	}
	
	//displays My Follows View
	public function showMyFollows() {
		$this->template->content = View::instance('v_my_follows');
		$this->template->title = "My Follows";
		echo $this->template;
	}
	
	//displays All Users view
	public function showAllUsers() {
		$this->template->content = View::instance('v_all_users');
		$this->template->title = "All Users";
		echo $this->template;
	}
	
	//displays Customize view
	public function showCustomize() {
		$this->template->content = View::instance('v_customize');
		$this->template->title = "Customize";
		echo $this->template;
	}
	
}