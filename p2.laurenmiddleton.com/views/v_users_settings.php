<span class="breadcrumb">Settings</span><br><br>

<h4>Change Password</h4>

<form method="POST" action="/users/p_change_password"> 
				<ul class="ul-basic">
					<li>
						<label for="new-password">New Password:</label>
						<input id="new-password" type="password" name="new_password" />
					</li>
					<li>
						<label for="new-password-submit" class="off-screen">Submit</label> <!--label included for accessiblity, but hidden offscreen-->
						<input id="new-password-submit" type="submit" value="Submit" />
					</li>
					
					<? if($message): ?>
						<li class="success-message">
							Your password has been changed!
						</li>
					<? endif; ?>
				</ul>
</form>