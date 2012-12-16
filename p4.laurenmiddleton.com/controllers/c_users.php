<?php

class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	
	public function index() {
		#if user is blank, they're not logged in; redirect to login/registration page
		if(!$this->user) {
			Router::redirect("/users/login");
			
			#return will force this method to exit here so the rest of the code won't be executed and the profile view won't be displayed
			return false;
		}
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
			
				echo "Thank you for registering! Please log in above.";
			
			} else {
				#Otherwise, there is a match and signup fails
				
				echo "Registration failed. This email address is already in use. Please try again.";
			}
	}
	
	public function login() {
		#set up view
		$this->template->content = View::instance('v_users_login');
		
		#set the title
		$this->template->title = "Here. In My Head";
		
		#load client files
		$client_files = Array(
						"/css/p4-main-styles.css",
						"/js/p4-login-functions.js",
						"/js/jquery.form.js",
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
			
			echo "Incorrect email and password combination. Please try again.";
			
		#but if we did, login succeeded!
		} else {
			#store this token in a cookie
			@setcookie("token", $token, strtotime('+1 week'), '/');
						
			#send them to their profile
			Router::redirect("/poems/builder");
		}
	}
	
	#logs the user out
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
	
	#shows the user's profile
	public function my_profile() {
		#if user is blank, they're not logged in; redirect to login/registration page
		if(!$this->user) {
			Router::redirect("/users/login");
			
			#return will force this method to exit here so the rest of the code won't be executed and the profile view won't be displayed
			return false;
		}
		
		#set up blank template
		$template = View::instance('v_users_my_profile');
		
		#determine the user's poem count
		$poem_count = users_controller::poem_count($this->user->user_id);
		
		#determine the user's avatar filename
		$avatar = users_controller::_avatar_filename($this->user->user_id);
		
		#print_r($avatar);
		
		#if(empty($avatar)) {
		#	$template->no_avatar = TRUE;
		#} else {
		#	$template->no_avatar = FALSE;
		#}
		
		#pass data to the view
		$template->poem_count = $poem_count;
		$template->avatar = $avatar;
				
		echo $template;
	}
	
	#returns the number of poems a user has published
	public static function poem_count($user_id) {
		#write a query to grab all the poems linked to the given user id
		$q = "SELECT poems.*, users.user_id, users.first_name, users.last_name
			FROM poems
			JOIN users USING (user_id)
			WHERE user_id = ".$user_id;
			
		#Run the query, storing the results in the variable $poems
		$poems = DB::instance(DB_NAME)->select_rows($q); 
				
		#initialize a counter
		$counter = 0;
		
		#loop through the results, incrementing the counter each time
		foreach($poems as $poem) {
			$counter = $counter + 1;
		}
		
		#return the count
		return $counter;
	}
	
	#returns the filename of a user's avatar
	public static function _avatar_filename($user_id) {
		#write a query to grab the filename
		$q = "SELECT avatar
			FROM users
			WHERE user_id= ".$user_id;
			
		#run the query, storing the result in the variable $avatar_filename
		$avatar_filename = DB::instance(DB_NAME)->select_row($q);
		
		return $avatar_filename;
	}
	
	#uploads a profile picture
	/*-------------------------------------------------------------------------------------------------
	modified from
	http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP
	-------------------------------------------------------------------------------------------------*/
	public function p_edit_avatar() {

		if(isset($_FILES['image'])){

			$errors     = array();
			$file_ext   = strtolower(strrchr($_FILES['image']['name'], '.'));
			$file_name  = $this->user->user_id."-".$file_ext;			
			$file_size  = $_FILES['image']['size'];
			$file_tmp   = $_FILES['image']['tmp_name'];
			$file_type  = $_FILES['image']['type'];   

			$extensions = array(".jpeg",".jpg",".png",".gif"); 		

			if(in_array($file_ext,$extensions) === false){
				Router::redirect("/users/my_profile?error=Only jpg, png or gif images please.");
			}

			if($file_size > 2097152) {
				Router::redirect("/users/my_profile?error=Your file size was too large; please choose an image smaller than 2mb");
			}				
			if(empty($errors)==true) {
				move_uploaded_file($file_tmp, APP_PATH."/uploads/avatars/".$file_name);

				# Save to database
					DB::instance(DB_NAME)->update("users", Array("avatar" => $file_name), "WHERE user_id = ".$this->user->user_id);

				# Create small (thumb)

					$imgObj = new Image(APP_PATH."/uploads/avatars/".$file_name);

					$small = Utils::postfix("_".SMALL_W."_".SMALL_H, APP_PATH.AVATAR_PATH.$file_name);

					$imgObj->resize(SMALL_W, SMALL_H, 'crop');
					$imgObj->save_image($small, 100);

				# Send them back to their profile
					Router::redirect("/users/my_profile/");

			} else {
				Router::redirect("/users/my_profile?error=There was an error uploading your image.");
			}

		}			
	}
	
	
		
} // end class
