<div id="login-container">

<div id="login-header">

<h1>Here. In My Head</h1>
<h3>Create and share poetry based on the lyrics of Tori Amos.</h3>

</div>

<div id="login-left">

<h2 class="login">Features</h2>
<ul id="features" class="ul-bullets">
	<li>Create your own account</li>
	<li>Upload a profile picture</li>
	<li>Create and save poems using a stylish drag and drop interface</li>
	<li>Publish and print your work for other users to see</li>
	<li>Follow other users' poetry streams</li>
	<li>Write and receive feedback</li>
</ul>

</div>

<div id="login-right">

<h2 class="login">Log In</h2>
<form method="POST" action="/users/p_login">

	<label for="login-email" class="login-label">Email:</label>
	<input id="login-email" class="login-input" name="email" type="text" />
	<br />
	
	<label for="login-pw" class="login-label">Password:</label>
	<input id="login-pw" class="login-input" name="password" type="password" />
	<br />
	
	<label for="login-submit" class="off-screen">Log In</label> <!--for accessibility-->
	<input id="login-submit" type="submit" value="Log In" />
	
</form>

<div id="login-result" class="hidden">
</div>

<h2 class="login">Register</h2>
<form id="reg-form" method="POST" action="/users/p_signup">

	<label for="reg-first" class="login-label">First Name:</label>
	<input id="reg-first" class="reg-field" name="first_name" type="text" />
	<br />
	
	<label for="reg-last" class="login-label">Last Name:</label>
	<input id="reg-last" class="reg-field" name="last_name" type="text" />
	<br />
	
	<label for="reg-email" class="login-label">Email:</label>
	<input id="reg-email" class="reg-field" name="email" type="text" />
	<br />
	
	<label for="reg-pw" class="login-label">Password:</label>
	<input id="reg-pw" class="reg-field" name="password" type="password" />
	<br />
	
	<label for="reg-submit" class="off-screen">Register</label> <!--for accessibility-->
	<input id="reg-submit" type="submit" value="Register" />
	
</form>

<div id="reg-error" class="hidden">
	Please fill out all fields.
</div>

<div id="reg-result" class="hidden">
</div>

</div>

</div>