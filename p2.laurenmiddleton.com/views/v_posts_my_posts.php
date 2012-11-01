<!--If the user hasn't made any posts yet, prevent a SQL error-->
<? if($show_no_posts_message): ?>
	You haven't posted anything yet!
<? endif; ?>

<? foreach($posts as $post): ?>

	<div class="my-post-parent">
		<span class="delete-post-btn">
			<a href="/posts/delete/<?=$post['post_id']?>">x</a>
		</span>
		<h3>
			<?=$post['first_name']?> <?=$post['last_name']?>
		</h3>
		<span class="post-timestamp">
			posted <?=Time::display($post['created'], "", "America/New_York")?>
		</span>
		<br><br>
		<?=$post['content']?>
	</div>
	
		
<? endforeach; ?>