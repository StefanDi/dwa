<span class="breadcumb">All Users</span><br><br>


<form method='POST' action='/posts/p_follow'>

	<? foreach($users as $user): ?>
	
		<!-- Print this user's name -->
		<div class="user-parent"><?=$user['first_name']?> <?=$user['last_name']?></div>
		
		<!-- If there exists a connection with this user, show an unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			<a href='/posts/unfollow/<?=$user['user_id']?>' class='follow-link'>Unfollow</a>
			
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			<a href='/posts/follow/<?=$user['user_id']?>' class='follow-link'>Follow</a>
		<? endif; ?>
		
		<br><br>
	
	<? endforeach; ?>

</form>