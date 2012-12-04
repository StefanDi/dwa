 <!--If the user hasn't made any posts yet, prevent a SQL error-->
<!--<? if($show_no_posts_message): ?>
	You haven't posted anything yet!
<? endif; ?>-->

<? foreach($poems as $poem): ?>

	<div class="my-poem-parent">
		<span class="delete-poem-btn">
			<a href="/poems/delete/<?=$poem['poem_id']?>" title="Delete poem">x</a>
		</span>
		<h3>
			<?=$poem['first_name']?> <?=$poem['last_name']?>
		</h3>
		<span class="poem-timestamp">
			published <?=Time::display($poem['created'], "", "America/New_York")?>
		</span>
		<br><br>
		<a id="view-btn-poem<?=$poem['poem_id']?>" class="btn view-poem-btn" href="#poem<?=$poem['poem_id']?>">View</a>
		<div id="poem<?=$poem['poem_id']?>" class="poem-content hidden"><?=$poem['content']?></div>
	</div>
	
		
<? endforeach; ?>