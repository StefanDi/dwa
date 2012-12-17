<img src="<?=$user->avatar?>" class="my-profile-avatar" />

<h2><?=$user->first_name?> <?=$user->last_name?></h2>

<?=$poem_count?> poems published

<br /><br />

<h3>Upload an avatar</h3>

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
	
</form>