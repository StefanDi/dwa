<?php

class nav_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
	}
	
	//displays All Users view
	public function allUsers() {
		$this->template->content = View::instance('v_all_users');
		$this->template->title = "All Users";
		echo $this->template;
	}
	
}