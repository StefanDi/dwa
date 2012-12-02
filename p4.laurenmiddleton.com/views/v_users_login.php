<h1>Here. In My Head</h1>
<h3>Create and share poetry based on the lyrics of Tori Amos.</h3>

<h2>Features</h2>
<ul class="ul-bullets">
	<li>Create your own account</li>
	<li>Upload a profile picture</li>
	<li>Create and save poems using a stylish drag and drop interface</li>
	<li>Publish and print your work for other users to see</li>
	<li>Follow other users' poetry streams</li>
	<li>Write and receive feedback</li>
</ul>

<h2>Log In</h2>
<label for="login-email">Email:</label>
<input id="login-email" name="" type="text" />
<br />

<label for="login-pw">Password:</label>
<input id="login-pw" name="" type="password" />
<br />

<label for="login-submit" class="off-screen">Log In</label> <!--for accessibility-->
<input id="login-submit" type="submit" value="Log In" />

<h2>Register</h2>
<form method="POST" action="/users/p_signup">

	<label for="reg-first">First Name:</label>
	<input id="reg-first" name="first_name" type="text" />
	<br />
	
	<label for="reg-last">Last Name:</label>
	<input id="reg-last" name="last_name" type="text" />
	<br />
	
	<label for="reg-email">Email:</label>
	<input id="reg-email" name="email" type="text" />
	<br />
	
	<label for="reg-pw">Password:</label>
	<input id="reg-pw" name="password" type="password" />
	<br />
	
	<!--<label for="reg-pw-confirm">Confirm Password:</label>
	<input id="reg-pw-confirm" name="" type="" />
	<br />-->
	
	<label for="reg-submit" class="off-screen">Register</label> <!--for accessibility-->
	<input id="reg-submit" type="submit" value="Register" />
	
</form>