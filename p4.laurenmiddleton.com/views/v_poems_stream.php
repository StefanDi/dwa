<!--If the user isn't following anyone yet, prevent a SQL error-->
<? if($show_no_follows_message): ?>
	You aren't following anyone yet!
<? endif; ?>

<!--If the user's followers haven't made any posts, show a message-->
<? if($show_no_posts_message): ?>
	<br><br>
	No posts to show!
<? endif; ?>

<? foreach($poems as $poem): ?>

	<!-- if the poem was created by this user, put it in a div with one class--> 
	<? if($poem['user_id'] == $user->user_id): ?>
		<div class="my-poem-parent">
			<h3>
				<?=$poem['first_name']?> <?=$poem['last_name']?>
			</h3>
			<span class="poem-timestamp">
				published <?=Time::display($poem['created'], "", "America/New_York")?>
			</span>
			<br><br>
			<?=$poem['content']?>
		</div>
	
	<!-- otherwise, put it in a div with another class-->
	<? else: ?>
		<div class="other-poem-parent">
			<h3>
				<?=$poem['first_name']?> <?=$poem['last_name']?>
			</h3>
			<span class="poem-timestamp">
				published <?=Time::display($poem['created'], "", "America/New_York")?>
			</span>
			<br><br>
			<?=$poem['content']?>
		</div>
	<? endif; ?>
	
<? endforeach; ?>