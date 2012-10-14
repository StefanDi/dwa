<?php

class nav_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
		$this->template->header = View::instance('v_header');
		$this->template->footer = View::instance('v_footer');
		$this->template->content = View::instance('_v_main_content');
		$this->content_template->nav = View::instance('v_nav');
	}
	
	//displays My Feed View
	public function showMyFeed() {
		$this->content_template->tabGuts = View::instance('v_my_feed');
		$this->template->title = "My Feed";
		echo $this->template;
		echo $this->content_template;
	}
	
	//displays My Posts View
	public function showMyPosts() {
		$this->content_template->tabGuts = View::instance('v_my_posts');
		$this->template->title = "My Posts";
		echo $this->template;
		echo $this->content_template;
	}
	
	//displays My Follows View
	public function showMyFollows() {
		$this->content_template->tabGuts = View::instance('v_my_follows');
		$this->template->title = "My Follows";
		echo $this->template;
		echo $this->content_template;
	}
	
	//displays All Users view
	public function showAllUsers() {
		$this->content_template->tabGuts = View::instance('v_all_users');
		$this->template->title = "All Users";
		echo $this->template;
		echo $this->content_template;
	}
	
	//displays Customize view
	public function showCustomize() {
		$this->content_template->tabGuts = View::instance('v_customize');
		$this->template->title = "Customize";
		echo $this->template;
		echo $this->content_template;
	}
	
}