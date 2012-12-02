<?php

class poems_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	
	public function index() {

	}
	
	public function builder() {
		#set up view
		$this->template->content = View::instance('v_poems_builder');
		
		#set the title
		$this->template->title = "Here. In My Head";
		
		#load client files
		$client_files = Array(
						"/css/p4-main-styles.css",
						"/css/poem-builder-styles.css",
						"/js/p4-main-functions.js",
						"/js/p4-nav-functions.js",
						"/js/poem-builder-main.js",
						"/js/poem-builder-words.js"
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);
		
		#render template
		echo $this->template;
	}
	
	
	
		
} // end class
