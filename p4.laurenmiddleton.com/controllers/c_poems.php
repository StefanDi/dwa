<?php

class poems_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		
		#if user is blank, they're not logged in; redirect to login/registration page
		if(!$this->user) {
			Router::redirect("/users/login");
			
			#return will force this method to exit here so the rest of the code won't be executed and the profile view won't be displayed
			return false;
		}
	} 
	
	
	public function index() {
	}
	
	#displays poem builder tool
	public function builder() {
		#if user is blank, they're not logged in; redirect to login/registration page
		if(!$this->user) {
			Router::redirect("/users/login");
			
			#return will force this method to exit here so the rest of the code won't be executed and the profile view won't be displayed
			return false;
		}
		
		#set up view
		$this->template->content = View::instance('v_poems_builder');
		
		#set the title
		$this->template->title = "Here. In My Head";
		
		#load client files
		$client_files = Array(
						"/css/p4-main-styles.css",
						"/css/poem-builder-styles.css",
						"/css/poem-display-styles.css",
						"/js/p4-main-functions.js",
						"/js/p4-nav-functions.js",
						"/js/poem-builder-main.js",
						"/js/poem-builder-words.js"
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);
		
		#render template
		echo $this->template;
	}
	
	#publishes poem
	public function publish() {
		#grab the poem name that was sent
		$name = $_POST['name'];
		
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
	
	#displays poems of current user
	public function my_poems() {
		#Set up view
		$template = View::instance('v_poems_my_poems');
		
		#Builds a query to grab all poems by this user
		#Selects everything in 'poems' and some fields in 'users' (so 'created' is unambiguous)
		$q = "SELECT poems.*, users.user_id, users.first_name, users.last_name
			FROM poems
			JOIN users USING (user_id)
			WHERE user_id = ".$this->user->user_id;
			
		#Run the query, storing the results in the variable $poems
		$poems = DB::instance(DB_NAME)->select_rows($q);
				
		#If $poems is empty, user hasn't published any poems yet
		if(empty($poems)) {
			$template->show_no_poems_message = TRUE;
		} else {
			$template->show_no_poems_message = FALSE;
		}
				
		#Pass data to the View
		$template->poems = $poems;
		
		#Render view
		echo $template;
	}
	
	#returns the comments for a given poem
	public function poem_comments($poem_id) {
		#set up view for stub
		$template = View::instance('v__poem_comments');
		
		#build a query to grab the comments for the poem
		$q = "SELECT comments.*, users.user_id, users.first_name, users.last_name
			FROM comments
			JOIN users USING (user_id)
			WHERE poem_id = ".$poem_id;
			
		#run the query, store result in variable $comments
		$comments = DB::instance(DB_NAME)->select_rows($q);
				
		#pass data to the view
		$template->comments = $comments;
		
		#render view
		echo $template;	
	}
	
	#adds a comment to a poem
	public function p_comment($poem_id) {
		#Associate this comment with the logged in user
		$_POST['user_id'] = $this->user->user_id;
		
		#Associate this comment with the poem its about
		$_POST['poem_id'] = $poem_id;
		
		#Unix timestamp of when this comment was created/modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		#Insert
		DB::instance(DB_NAME)->insert('comments', $_POST);
	}
	
	#deletes a poem
	public function delete($poem_id) {
		#Define the parameters for the query
		$table = 'poems';
		$where_condition = "WHERE poem_id = ".$poem_id;
				
		#Execute the query to delete the post
		DB::instance(DB_NAME)->delete($table, $where_condition);	
	}
	
	#generates a list of all users
	public function users() {
		#Set up view
		$template = View::instance('v_poems_users');
		
		#Build a query to get all the users
		$q = "SELECT *
			FROM users";
			
		#Execute the query to get all the users. Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		#Build our query to figure out what connections does this user already have? I.e. who are they following?
		$q = "SELECT *
			FROM users_users
			WHERE user_id = ".$this->user->user_id;
			
		#Execute this query with the select_array method
		#select_array will return our results in an array and use the "users_id_followed" field as the index.
		#This will come in handy when we get to the view
		#Store our results (an array) in the variable $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
		
		#Pass data (users and connections) to the view
		$template->users = $users;
		$template->connections = $connections;
		
		#Render the view
		echo $template;
	}
	
	#follows another user's poem stream
	public function follow($user_id_followed) {
		#Prepare our data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);
			
		#Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);
		
		#Send them back
		//Router::redirect("/poems/users");
	}
	
	#unfollows another user's poem stream
	public function unfollow($user_id_followed) {
		#Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);
		
		#Send them back
		//Router::redirect("/poems/users");
	}
	
	#returns the posts of the user's follows
	public function stream() {
		
		#Set up view
		$template = View::instance('v_poems_stream');
		
		#Build a query of the users this user is following
		$q = "SELECT *
			FROM users_users
			WHERE user_id = ".$this->user->user_id;
			
		#Execute our query, storing the results in a variable $connections
		$connections = DB::instance(DB_NAME)->select_rows($q);
		
		#In order to query for the posts we need, we're going to need a string of user id's, separated by commas
		#To create this, loop through our connections array
		$connections_string = "";
		foreach($connections as $connection) {
			$connections_string .=$connection['user_id_followed'].",";
		}
		
		#Remove the final comma
		$connections_string = substr($connections_string, 0, -1);
		
		#If user isn't following anyone yet, prevent a SQL error
		if (empty($connections_string)) {
			$template->show_no_follows_message = TRUE;
		} else {
			
			$template->show_no_follows_message = FALSE;
			
			#Build our query to grab the posts
			#Selects everything in 'posts' and select fields in 'users' (so 'created' is unambiguous)
			$q = "SELECT poems.*, users.user_id, users.first_name, users.last_name
				FROM poems
				JOIN users USING (user_id)
				WHERE poems.user_id IN (".$connections_string.")"; #This is where we use that string of user_ids we created
		}
			
		#Run our query, store the results in the variable $poems
		$poems = DB::instance(DB_NAME)->select_rows($q);
		
		#If $poems is empty, show a message
		if(empty($poems)) {
			$template->show_no_posts_message = TRUE;
		} else {
		
			$template->show_no_posts_message = FALSE;
		}
		
		#Pass data to the view
		$template->poems = $poems;
		
		#Render view
		echo $template;
	
	}
	
		
} // end class
