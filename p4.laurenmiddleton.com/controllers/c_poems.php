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
	
	public function publish() {
		#grab the poem data that was sent
		$poem = $_POST['content'];
				
		#Associate this poem with this user
		$_POST['user_id'] = $this->user->user_id;
		
		#Unix timestamp of when this poem was created/modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		#Insert
		#Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('poems', $_POST);
	}
	
	public function my_poems() {
		#Set up view
		$template = View::instance('v_poems_my_poems');
		
		#Builds a query to grab all poems by this user
		#Selects everything in 'poems' and some fields in 'users' (so 'created' is unambiguous)
		$q = "SELECT poems.*, users.user_id, users.first_name, users.last_name
			FROM poems
			JOIN users USING (user_id)
			WHERE user_id = ".$this->user->user_id;
			
		#Run the query, storing the results in the variable $posts
		$poems = DB::instance(DB_NAME)->select_rows($q);
				
		#If $posts is empty, user hasn't made any posts yet
		//if(empty($posts)) {
		//	$template->show_no_posts_message = TRUE;
		//} else {
		//	$template->show_no_posts_message = FALSE;
		//}
		
		
		#Pass data to the View
		$template->poems = $poems;
		
		#Render view
		echo $template;
	}
	
	public function p_comment($id) {
		#Associate this comment with the logged in user
		$_POST['user_id'] = $this->user->user_id;
		
		#Associate this comment with the poem its about
		$_POST['poem_id'] = $id;
		
		#Unix timestamp of when this comment was created/modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		#Insert
		DB::instance(DB_NAME)->insert('comments', $_POST);
	}
	
	
	
		
} // end class
