<div id="login-container">
	<div id="login-left" style="clear: left;">
	
		<h2>Features</h2>
		<ul>
			<li>Create your own account</li>
			<li>Update your password</li>
			<li>Add and delete posts</li>
			<li>View your profile</li>
			<li>Follow your friends' posts</li>
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
				<? if($error): ?>
					<li class="error-message"> <!--only appears when error is thrown. consider separate file for all possible error messages, correct one gets plunked in-->
						Incorrect email and password combination. Please try again.
					</li>
				<? endif; ?>
				<li>
					<label for="login-submit" class="off-screen">Log In</label> <!--label included for accessiblity, but hidden offscreen-->
					<input id="login-submit" type="submit" value="Log In" />
				</li>
			</ul>
		</form>
		
		<!--<span class="register-message">Don't have an account yet? <a id="register-link" href="">Register</a></span>-->
		
		<div id="registration-container"> <!--consider factoring out the guts of this div-->
			
			<h2>Register</h2>
			
			<form method="POST" action="/users/p_signup"> <!--this naming convention means it's the processing end of a form with the same name - should put the register form in its own view fragment-->
				<ul class="ul-basic">
					<li>
						<label for="first-name-register" class="login-label">First Name:</label>
						<input id="first-name-register" type="text" name="first_name" /> <!--name should match DB column name-->
					</li>
					<li>
						<label for="last-name-register" class="login-label">Last Name:</label>
						<input id="last-name-register" type="text" name="last_name" />
					</li>
					<li>
						<label for="email-register" class="login-label">Email:</label>
						<input id="email-register" type="text" name="email" />
					</li>
					<li>
						<label for="password-register" class="login-label">Password:</label>
						<input id="password-register" type="password" name="password">
					</li>
								
					
					<? if($message == "signup-error"): ?>
						<li class="error-message">
							This email is already registered. Please use another.
						</li>
					<? elseif ($message == "signup-success"): ?>
						<li class="success-message">
							Registration successful! Please log in above.
						</li>
					<? endif; ?>
					
					
					
					<li>
						<label for="registration-submit" class="off-screen">Register</label> <!--label included for accessiblity, but hidden offscreen-->
						<input id="registration-submit" type="submit" value="Register" />
					</li>
				</ul>
			</form>
			
		</div>
	
	</div>
</div>