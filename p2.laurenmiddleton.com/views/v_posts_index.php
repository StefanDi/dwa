
	<? foreach($posts as $post): ?>
	
		<!-- if the post was created by this user, put it in a div with one class--> 
		<? if($post['user_id'] == $user->user_id): ?>
			<div class="my-post-parent">
				<h3>
					<?=$post['first_name']?> <?=$post['last_name']?> @ <?=$post['created']?>:
				</h3>
				<?=$post['content']?>
			</div>
		
		<!-- otherwise, put it in a div with another class-->
		<? else: ?>
			<div class="other-post-parent">
				<h3>
					<?=$post['first_name']?> <?=$post['last_name']?> @ <?=$post['created']?>:
				</h3>
				<?=$post['content']?>
			</div>
		<? endif; ?>
		
	<? endforeach; ?>
	
