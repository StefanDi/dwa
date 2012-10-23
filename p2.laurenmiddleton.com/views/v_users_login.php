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
	
	<form method="POST" action="/users/p_login">
		<ul class="ul-basic">
			<li>
				<label for="email-login" class="login-label">Email:</label>
				<input id="email-login" type="text" name="email" />
			</li>
			<li>
				<label for="password-login" class="login-label">Password:</label>
				<input id="password-login" type="password" name="password" />
			</li>
			<li class="error-message"> <!--only appears when error is thrown. consider separate file for all possible error messages, correct one gets plunked in-->
				Incorrect email and password combination. Please try again.
			</li>
			<li>
				<label for="login-submit" class="off-screen">Log In</label> <!--label included for accessiblity, but hidden offscreen-->
				<input id="login-submit" type="submit" value="Log In" />
			</li>
		</ul>
	</form>
	
	Don't have an account yet? <a id="register-link" href="">Register</a>
	
	<div id="registration-container" class="hidden"> <!--consider factoring out the guts of this div-->
		
		<? include 'v_users_signup.php'; ?>
		
	</div>

</div>