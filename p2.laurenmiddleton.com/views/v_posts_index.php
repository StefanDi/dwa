<span class="breadcumb">My Feed</span><br><br>

<!--If the user isn't following anyone yet, prevent a SQL error-->
<? if($show_no_follows_message): ?>
	You aren't following anyone yet! Find some friends <a href="/posts/users">here</a>.
<? endif; ?>

<!--If the user's followers haven't made any posts, show a message-->
<? if($show_no_posts_message): ?>
	<br><br>
	No posts to show!
<? endif; ?>

<? foreach($posts as $post): ?>

	<!-- if the post was created by this user, put it in a div with one class--> 
	<? if($post['user_id'] == $user->user_id): ?>
		<div class="my-post-parent">
			<h3>
				<?=$post['first_name']?> <?=$post['last_name']?>
			</h3>
			<span class="post-timestamp">
				posted <?=Time::display($post['created'], "", "America/New_York")?>
			</span>
			<br><br>
			<?=$post['content']?>
		</div>
	
	<!-- otherwise, put it in a div with another class-->
	<? else: ?>
		<div class="other-post-parent">
			<h3>
				<?=$post['first_name']?> <?=$post['last_name']?>
			</h3>
			<span class="post-timestamp">
				posted <?=Time::display($post['created'], "", "America/New_York")?>
			</span>
			<br><br>
			<?=$post['content']?>
		</div>
	<? endif; ?>
	
<? endforeach; ?>