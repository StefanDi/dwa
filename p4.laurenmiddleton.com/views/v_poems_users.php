<div id="users-list">

	<? foreach($users as $user): ?>
	
		<!-- Print this user's name -->
		<div class="user-parent"><?=$user['first_name']?> <?=$user['last_name']?></div>
		
		<!-- If there exists a connection with this user, show an unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			<a href='/poems/unfollow/<?=$user['user_id']?>' class='btn follow-link'>Unfollow</a>
			
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			<a href='/poems/follow/<?=$user['user_id']?>' class='btn follow-link'>Follow</a>
		<? endif; ?>
		
		<br><br>
	
	<? endforeach; ?>

</div>