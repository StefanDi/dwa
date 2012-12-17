<div id="users-list">

	<? foreach($users as $user): ?>
	
		<img src="/uploads/avatars/<?=$user['avatar']?>" class="users-list-avatar" />
		<!-- Print this user's name -->
		<div class="user-parent"><?=$user['first_name']?> <?=$user['last_name']?></div>
		
		<!-- If there exists a connection with this user, show an unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			
			<a href='/poems/unfollow/<?=$user['user_id']?>' class='btn follow-link'>Unfollow</a>
			<br />
			
			
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			
			
			<a href='/poems/follow/<?=$user['user_id']?>' class='btn follow-link'>Follow</a>
			<br />
			
		<? endif; ?>
		
		<br><br>
	
	<? endforeach; ?>

</div>