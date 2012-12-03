<?php

class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	
	public function index() {
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "Hello World";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		# Render the view
			echo $this->template;
	}
	
	public function signup() {
	}
	
	public function p_signup() {
		#prints what data was submitted to the page
		#print_r($_POST);
		
		#encrypts password before sending to DB
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		#more data we want stored with the user
		$_POST['created'] = Time::now(); //this returns the current timestamp
		$_POST['modified'] = Time::now();
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		#sanitize the user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		#check to see if email entered matches an email in the DB
			#Build query to DB to see if there is a matching email

			$q = "SELECT email
				FROM users
				WHERE email = '".$_POST['email']."'";
			
			#Run query and store in an array
			$matches = DB::instance(DB_NAME)->select_rows($q);
		
			#If matches is empty, signup succeeds
			if(empty($matches)) {
				#put the registration data in the database
				$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
			
				#setup view
				$this->template->content = "signup success";
				
				#render template
				echo $this->template;
			
			} else {
				#Otherwise, there is a match and signup fails
				
				#setup view
				$this->template->content = "signup failed";
				
				#render template
				echo $this->template;
			}
	}
	
	public function login() {
		#set up view
		$this->template->content = View::instance('v_users_login');
		
		#set the title
		$this->template->title = "Here. In My Head";
		
		#load client files
		$client_files = Array(
						"/css/p4-main-styles.css"
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);
		
		#render template
		echo $this->template;
	}
	
	public function p_login() {
		#hash submitted password so we can compare it against one in the DB
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		#sanitize the user entered data to prevent any funny business
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		#search the db for this email and password
		#retrieve the token if it's available
		$q = "SELECT token
			FROM users
			WHERE email = '".$_POST['email']."'
			AND password = '".$_POST['password']."'";
			
		$token = DB::instance(DB_NAME)->select_field($q);
		
		#if we didn't get a token back, login failed
		if(!$token) {
			#setup view
			$this->template->content = "login failed";
				
			#render template
			echo $this->template;
			
		#but if we did, login succeeded!
		} else {
			#store this token in a cookie
			@setcookie("token", $token, strtotime('+1 week'), '/');
			
			#send them to their profile
			Router::redirect("/poems/builder");
		}
	}
	
	public function logout() {
		#generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
		
		#create the data array we'll use with the update method
		#in this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);
		
		#do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
		
		#delete their token cookie - effectively logging them out
		setcookie("token", "", strtotime('-1 week'), '/');
		
		#send them somewhere else
		Router::redirect("/index/index");
	}
	
	
	
		
} // end class
