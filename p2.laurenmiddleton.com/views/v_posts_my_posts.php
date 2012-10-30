<? foreach($posts as $post): ?>

	<div class="my-post-parent">
		<h3>
			<?=$post['first_name']?> <?=$post['last_name']?> @ <?=$post['created']?>:
			<span id="pid<?=$post['post_id']?>" class="delete-post-btn"><a href="">x</a></span>
		</h3>
		<?=$post['content']?>
	</div>
	
		
<? endforeach; ?>