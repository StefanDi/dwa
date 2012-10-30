<?php

class users_controller extends base_controller {

	public function __construct() { //two underscores indicate this is a "magic" method
		parent::__construct(); //this calls construct on the base
		//methods included here will get called with every users method
		
	}
	
	public function index() { //calls users without specifying a method
		//if user is blank, they're not logged in; redirect to login/registration page
		if(!$this->user) {
			Router::redirect("/users/login");
			
			//return will force this method to exit here so the rest of the code won't be executed and the profile view won't be displayed
			return false;
		}
		
		//they are logged in, bring them to their profile
		Router::redirect("/nav/index");
		
	}
	
	public function signup() {
	
		//set up view
		$this->template->header = View::instance('v_header');
		$this->template->footer = View::instance('v_footer');
		$this->template->content = View::instance('v_users_login');
		//render template
		echo $this -> template;
		
	}
	
	//submits the registration form
	public function p_signup() {
		
		//prints what data was submitted to the page
		//print_r($_POST);
		
		//encrypts password before sending to DB
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		//more data we want stored with the user
		$_POST['created'] = Time::now(); //this returns the current timestamp
		$_POST['modified'] = Time::now();
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		//put the registration data in the database
		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
		
		echo "You're signed up";
	}
	
	public function login() {
		//setup view
		$this->template->header = View::instance('v_header');
		$this->template->footer = View::instance('v_footer');
		$this->template->content = View::instance('v_users_login');
		//render template
		echo $this->template;
	}
	
	public function p_login() {
		//hash submitted password so we can compare it against one in the DB
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		//sanitize the user entered data to prevent any funny business
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		//search the db for this email and password
		//retrieve the token if it's available
		$q = "SELECT token
			FROM users
			WHERE email = '".$_POST['email']."'
			AND password = '".$_POST['password']."'";
			
		$token = DB::instance(DB_NAME)->select_field($q);
		
		//if we didn't get a token back, login failed
		if(!$token) {
			//send them back to the login page (change to show div w/ error)
			Router::redirect("/users/login");
			
		//but if we did, login succeeded!
		} else {
			//store this token in a cookie
			@setcookie("token", $token, strtotime('+1 year'), '/');
			
			//send them to their profile
			Router::redirect("/users/profile");		}
	}
	
	public function logout() {
		//generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
		
		//create the data array we'll use with the update method
		//in this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);
		
		//do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
		
		//delete their token cookie - effectively logging them out
		setcookie("token", "", strtotime('-1 week'), '/');
		
		echo "You have been logged out.";
	}
	
	public function profile() {
		//if user is blank, they're not logged in; redirect to login/registration page
		if(!$this->user) {
			Router::redirect("/users/login");
			
			//return will force this method to exit here so the rest of the code won't be executed and the profile view won't be displayed
			return false;
		}
		
		
		//they are logged in, bring them to their profile
		$this->template->header = View::instance('v_header');
		//show logged in header
		$this->template->header->welcome = View::instance('v_header_welcome');
		$this->template->footer = View::instance('v_footer');
		$this->template->content = View::instance('v_main_content');
		$this->template->content->nav = View::instance('v_nav');
		$this->template->content->tabGuts = View::instance('v_nav_my_profile');
		$this->template->content->tabGuts->addPost = View::instance('v_posts_add');
		$this->template->content->tabGuts->myPosts = View::instance('v_posts_my_posts');
		$this->template->title = "MicroBlog";
		
		//Builds a query to grab all posts by this user
		$q = "SELECT *
			FROM posts
			JOIN users USING (user_id)
			WHERE user_id = ".$this->user->user_id;
			
		//Run the query, storing the results in the variable $posts
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		//Pass data to the View
		$this->template->content->tabGuts->myPosts->posts = $posts;
		
		echo $this->template;
		}
	
	
	
		
	
}