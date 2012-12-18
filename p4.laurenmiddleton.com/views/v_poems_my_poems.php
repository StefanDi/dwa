<div id="my-poems-list-parent">

<div class="my-poems-count">
	You've published <?=$poem_count?> poems.
</div>

<? foreach($poems as $poem): ?>
	<div class="my-poem-parent">
		<a class="delete-poem-btn" href="<?=$poem['poem_id']?>" title="Delete poem">x</a>
		<br />
		
		<div class="my-poem-avatar">
			<img src="<?=$user->avatar?>" />
		</div>
		
		<span class="poem-display-title"><?=$poem['name']?></span>
		<br />
		
		published by <?=$poem['first_name']?> <?=$poem['last_name']?> on
		<?=Time::display($poem['created'], "", "America/New_York")?>
		<br /><br />
		
		<a id="view-btn-poem<?=$poem['poem_id']?>" class="btn view-poem-btn" href="#poem<?=$poem['poem_id']?>">View</a>
		
		<a id="" class="btn show-comments-btn" href="<?=$poem['poem_id']?>">Show Comments</a>
		
		<div id="poem<?=$poem['poem_id']?>" class="poem-content hidden">
			<div class="poem-view-title">'<?=$poem['name']?>' by <?=$poem['first_name']?> <?=$poem['last_name']?></div>
			<?=$poem['content']?>
		</div>
		
		
		
	<div id="poem<?=$poem['poem_id']?>-comments-container" class="poem-comments-container hidden">	
		
		<div id="poem<?=$poem['poem_id']?>-comments-parent" class="poem-comments">
			<!--comments will go here.-->
			<? if($show_no_comments_message): ?>
				<div class="no-comments-message">This poem has no comments yet.</div>
			<? endif; ?>
		</div>
		
		<div>
			<form method="POST" action="/poems/p_comment/<?=$poem['poem_id']?>">
				<label for="comment-input-poem<?=$poem['poem_id']?>" class="off-screen">Enter a comment</label> <!--for accessibility-->
				<textarea id="comment-input-poem<?=$poem['poem_id']?>" name="content" class="comment-input"></textarea>
				<label for="comment-submit-poem<?=$poem['poem_id']?>" class="off-screen">Submit your comment</label> <!--for accessibility-->
				<a id="comment-submit-poem<?=$poem['poem_id']?>" class="btn my-poem-comment-submit-btn" href="<?=$poem['poem_id']?>">Post</a>
			</form>
		</div>
		
	</div> <!--end comments-container-->
		
	</div>
		
<? endforeach; ?>

</div><!--end my poems list parent-->

<div id="delete-poem-dialog" class="hidden">
	Are you sure you want to delete your poem?
</div>