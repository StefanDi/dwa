<!--If the user hasn't made any posts yet, prevent a SQL error-->
<? if($show_no_posts_message): ?>
	You haven't posted anything yet!.
<? endif; ?>

<? foreach($posts as $post): ?>

	<div class="my-post-parent">
		<h3>
			<?=$post['first_name']?> <?=$post['last_name']?> @ <?=$post['created']?>:
			<span id="pid<?=$post['post_id']?>" class="delete-post-btn"><a href="">x</a></span>
		</h3>
		<?=$post['content']?>
	</div>
	
		
<? endforeach; ?>