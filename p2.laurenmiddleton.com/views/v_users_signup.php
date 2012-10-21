<h2>Register</h2>
			
<form method="POST" action="/users/p_signup"> <!--this naming convention means it's the processing end of a form with the same name - should put the register form in its own view fragment-->
	<ul class="ul-basic">
		<li>
			<label for="first-name-register">First Name:</label>
			<input id="first-name-register" type="text" name="first_name" /> <!--name should match DB column name-->
		</li>
		<li>
			<label for="last-name-register">Last Name:</label>
			<input id="last-name-register" type="text" name="last_name" />
		</li>
		<li>
			<label for="email-register">Email:</label>
			<input id="email-register" type="text" name="email" />
		</li>
		<li>
			<label for="password-register">Password:</label>
			<input id="password-register" type="password" name="password">
		</li>
		<li class="success-message">
			Registration successful! Please log in above.
		</li>
		<li class="error-message">
			This email is already registered. Please use another.
		</li>
		<li>
			<label for="registration-submit" class="off-screen">Register</label> <!--label included for accessiblity, but hidden offscreen-->
			<input id="registration-submit" type="submit" value="Register" />
		</li>
	</ul>
</form>