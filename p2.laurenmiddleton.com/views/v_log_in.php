<div id="login-left" style="clear: left;">

	<h2>Features</h2>
	<ul>
		<li>Create your own account</li>
		<li>Upload a profile picture</li>
		<li>Create posts</li>
		<li>Follow your friends' posts</li>
		<li>Customize your feed</li>
	</ul>

</div>

<div id="login-right">

	<h2>Log In</h2>
	
	<form id="login-form" method="POST" action="log-in.php">
		<ul class="ul-basic">
			<li>
				<label for="username-login">Username:</label>
				<input id="username-login" type="text" name="username" />
			</li>
			<li>
				<label for="password-login">Password:</label>
				<input id="password-login" type="text" name="password" />
			</li>
			<li class="error-message"> <!--only appears when error is thrown. consider separate file for all possible error messages, correct one gets plunked in-->
				Incorrect username and password combination. Please try again.
			</li>
			<li>
				<label for="login-submit" class="off-screen">Log In</label> <!--label included for accessiblity, but hidden offscreen-->
				<input id="login-submit" type="submit" value="Log In" />
			</li>
		</ul>
	</form>
	
	Don't have an account yet? <a id="register-link" href="">Register</a>
	
	<div id="registration-container" class="hidden"> <!--consider factoring out the guts of this div-->
		
		<h2>Register</h2>
			
		<form id="registration-form" method="POST" action="/users/p_signup"> <!--this naming convention means it's the processing end of a form with the same name - should put rhe register form in its own view fragment-->
			<ul class="ul-basic">
				<li>
					<label for="username-register">Create Username:</label>
					<input id="username-register" type="text" name="username" />
				</li>
				<li>
					<label for="password1-register">Create Password:</label>
					<input id="password1-register" type="password" name="password1" />
				</li>
				<li>
					<label for="password2-register">Re-enter Password:</label>
					<input id="password2-register" type="password" name="password2" />
				</li>
				<li class="success-message">
					Registration successful! Please log in above.
				</li>
				<li class="error-message">
					This username is unavailable. Please choose another.
				</li>
				<li>
					<label for="registration-submit" class="off-screen">Register</label> <!--label included for accessiblity, but hidden offscreen-->
					<input id="registration-submit" type="submit" value="Register" />
				</li>
			</ul>
		</form>
		
	</div>

</div>