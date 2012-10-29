<? foreach($posts as $post): ?>

	<div class="my-post-parent">
		<h3>
			<?=$post['first_name']?> <?=$post['last_name']?> @ <?=$post['created']?>:
		</h3>
		<?=$post['content']?>
	</div>
		
<? endforeach; ?>