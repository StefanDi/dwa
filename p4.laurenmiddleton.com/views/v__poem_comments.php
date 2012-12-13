<!--add an message for "no comments to show"-->

<? foreach($comments as $comment): ?>
			
	<?=$comment['content']?>
	<br />
	posted by <?=$comment['user_id']?>
	at <?=$comment['created']?>
	<br />
	<br />
				
<? endforeach; ?>