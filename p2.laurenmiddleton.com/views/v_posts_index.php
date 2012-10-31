<!--If the user isn't following anyone yet, prevent a SQL error-->
<? if($show_no_posts_message): ?>
	You aren't following anyone yet! Find some friends <a href="/posts/users">here</a>.
<? endif; ?>

<? foreach($posts as $post): ?>

	<!-- if the post was created by this user, put it in a div with one class--> 
	<? if($post['user_id'] == $user->user_id): ?>
		<div class="my-post-parent">
			<h3>
				<?=$post['first_name']?> <?=$post['last_name']?> <span class="post-timestamp">posted <?=Time::display($post['created'], "", "America/New_York")?>:</span>
			</h3>
			<?=$post['content']?>
		</div>
	
	<!-- otherwise, put it in a div with another class-->
	<? else: ?>
		<div class="other-post-parent">
			<h3>
				<?=$post['first_name']?> <?=$post['last_name']?> <span class="post-timestamp">posted <?=Time::time_ago($post['created'], "-1")?>:</span>
			</h3>
			<?=$post['content']?>
		</div>
	<? endif; ?>
	
<? endforeach; ?>