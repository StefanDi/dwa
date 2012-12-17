<div id="stream-list-parent">

<!--If the user isn't following anyone yet, prevent a SQL error-->
<? if($show_no_follows_message): ?>
	<div class="no-poems-message">You aren't following anyone yet.</div>
<? endif; ?>

<!--If the user's followers haven't made any poems, show a message-->
<? if($show_no_posts_message): ?>
	<div class="no-poems-message">No poems to show.</div>
<? endif; ?>

<? foreach($poems as $poem): ?>

	<!-- if the poem was created by this user, put it in a div with one class--> 
	<? if($poem['user_id'] == $user->user_id): ?>
		<div class="my-poem-parent">
			
			<img src="/uploads/avatars/<?=$poem['avatar']?>" class="stream-avatar" />
			
			<span class="poem-display-title"><?=$poem['name']?></span>
			<br />
			
			published by <?=$poem['first_name']?> <?=$poem['last_name']?> on
			<?=Time::display($poem['created'], "", "America/New_York")?>
			<br /><br />
			
			<a id="stream-view-btn-poem<?=$poem['poem_id']?>" class="btn stream-view-poem-btn" href="#poem<?=$poem['poem_id']?>">View</a>
			
			<div id="poem<?=$poem['poem_id']?>-stream" class="poem-content hidden">
				<?=$poem['content']?>
			</div>
			
			<a id="" class="btn show-comments-btn" href="<?=$poem['poem_id']?>">Show Comments</a>
		
	<div id="stream-poem<?=$poem['poem_id']?>-comments-container" class="poem-comments-container hidden">	
		
		<div id="stream-poem<?=$poem['poem_id']?>-comments-parent" class="poem-comments">
			<!--comments will go here.-->
			<? if($show_no_comments_message): ?>
				<div class="no-comments-message">This poem has no comments yet.</div>
			<? endif; ?>
		</div>
		
		<div>
			<form method="POST" action="/poems/p_comment/<?=$poem['poem_id']?>">
				<label for="stream-comment-input-poem<?=$poem['poem_id']?>" class="off-screen">Enter a comment</label> <!--for accessibility-->
				<textarea id="stream-comment-input-poem<?=$poem['poem_id']?>" name="content"></textarea>
				<label for="stream-comment-submit-poem<?=$poem['poem_id']?>" class="off-screen">Submit your comment</label> <!--for accessibility-->
				<a id="stream-comment-submit-poem<?=$poem['poem_id']?>" class="btn my-poem-comment-submit-btn-stream" href="<?=$poem['poem_id']?>">Comment</a>
			</form>
		</div>
		
	</div> <!--end comments-container-->
			
		</div>
	
	<!-- otherwise, put it in a div with another class-->
	<? else: ?>
		<div class="other-poem-parent">
		
		<img src="/uploads/avatars/<?=$poem['avatar']?>" class="stream-avatar" />
			
			<span class="poem-display-title"><?=$poem['name']?></span>
		<br />
		
		published by <?=$poem['first_name']?> <?=$poem['last_name']?> on
		<?=Time::display($poem['created'], "", "America/New_York")?>
		<br /><br />
		
		<a id="view-btn-poem<?=$poem['poem_id']?>" class="btn view-poem-btn" href="#poem<?=$poem['poem_id']?>">View</a>
		
		<div id="poem<?=$poem['poem_id']?>" class="poem-content hidden">
			<?=$poem['content']?>
		</div>
		
		<a id="" class="btn show-comments-btn" href="<?=$poem['poem_id']?>">Show Comments</a>
		
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
				<textarea id="comment-input-poem<?=$poem['poem_id']?>" name="content"></textarea>
				<label for="comment-submit-poem<?=$poem['poem_id']?>" class="off-screen">Submit your comment</label> <!--for accessibility-->
				<a id="comment-submit-poem<?=$poem['poem_id']?>" class="btn my-poem-comment-submit-btn" href="<?=$poem['poem_id']?>">Comment</a>
			</form>
		</div>
		
	</div> <!--end comments-container-->
			
		</div> <!--end other poem parent-->
	<? endif; ?>
	
<? endforeach; ?>

</div><!--end stream list parent-->