<div id="my-poems-list-parent">

<!--If the user hasn't made any posts yet, prevent a SQL error-->
<? if($show_no_poems_message): ?>
	You haven't published anything yet!
<? endif; ?>

<? foreach($poems as $poem): ?>
	<div class="my-poem-parent">
		<span class="delete-poem-btn">
			<a href="/poems/delete/<?=$poem['poem_id']?>" title="Delete poem">x</a>
		</span>
		<h3>
			<?=$poem['name']?> by <?=$poem['first_name']?> <?=$poem['last_name']?>
		</h3>
		<span class="poem-timestamp">
			published <?=Time::display($poem['created'], "", "America/New_York")?>
		</span>
		<br><br>
		<a id="view-btn-poem<?=$poem['poem_id']?>" class="btn view-poem-btn" href="#poem<?=$poem['poem_id']?>">View</a>
		<div id="poem<?=$poem['poem_id']?>" class="poem-content hidden">
			<?=$poem['content']?>
		</div>
		<a id="" class="btn show-comments-btn" href="<?=$poem['poem_id']?>">show comments</a>
		<div id="poem<?=$poem['poem_id']?>-comments-parent" class="poem-comments hidden">
			
			comments will go here.
			
			
		</div>
		<div>
			<form method="POST" action="/poems/p_comment/<?=$poem['poem_id']?>">
				<label for="comment-input-poem<?=$poem['poem_id']?>" class="off-screen">Enter a comment</label> <!--for accessibility-->
				<textarea id="comment-input-poem<?=$poem['poem_id']?>" name="content"></textarea>
				<label for="comment-submit-poem<?=$poem['poem_id']?>" class="off-screen">Submit your comment</label> <!--for accessibility-->
				<input id="comment-submit-poem<?=$poem['poem_id']?>" type="submit" value="Comment" />
			</form>
		</div>
	</div>
		
<? endforeach; ?>

</div>

<div id="delete-poem-dialog" class="hidden">
	Are you sure you want to delete?
</div>