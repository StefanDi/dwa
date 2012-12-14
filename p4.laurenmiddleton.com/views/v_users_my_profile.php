<h2><?=$user->first_name?> <?=$user->last_name?></h2>

<h3><?=$poem_count?> poems published</h3>


<h2>Upload a Profile Picture</h2>

<? if(@$_GET['error']): ?>
	<span class="error"><?=$_GET['error']?></span><br />
<? endif; ?>

<? if(@$_GET['alert']): ?>
	<span class="alert"><?=$_GET['alert']?></span><br />
<? endif; ?>

<form method="POST" enctype="multipart/form-data" action="/users/p_edit_avatar">
	
	
	<label for="upload-avatar">Choose an image:</label>
	<input id="upload-avatar" type="file" name="image" /><br />
	
	<label for="upload-avatar-submit" class="off-screen">Upload</label><!--for accessibility-->
	<input id="upload-avatar-submit" type="submit" value="Upload" />
	
	<!--If the user hasn't made any posts yet, prevent a SQL error-->
	<? if($no_avatar): ?>
		<img id="avatar" src="/assets/generic_avatar.png" />
	<? endif; ?>
	
	<? foreach($avatar as $avatar): ?>

		<!--preview thumbnail-->
		<img id="avatar" src="/uploads/avatars/<?=$avatar?>" />
	
	<? endforeach; ?>
</form>