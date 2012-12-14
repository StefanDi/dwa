<!--add an message for "no comments to show"-->

<? foreach($comments as $comment): ?>
			
	<?=$comment['content']?>
	<br />
	posted by <?=$comment['first_name']?> <?=$comment['last_name']?>
	on <?=Time::display($comment['created'], "", "America/New_York")?>
	<br />
	<br />
				
<? endforeach; ?>