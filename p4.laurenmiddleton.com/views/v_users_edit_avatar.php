<div id="edit-avatar-container">

<? if(@$_GET['error']): ?>
	<span class="upload-error"><?=$_GET['error']?></span><br />
<? endif; ?>

<form method="POST" enctype="multipart/form-data" action="/users/p_edit_avatar" id="upload-avatar-form">
	
	<label for="upload-avatar">Choose an image:</label>
	<input id="upload-avatar" type="file" name="image" /><br />
	
	<label for="upload-avatar-submit" class="off-screen">Upload</label><!--for accessibility-->
	<input id="upload-avatar-submit" type="submit" value="Upload" />
	
</form>

<? if(@$_GET['alert']): ?>
	<span class="upload-alert"><?=$_GET['alert']?></span><br />
<? endif; ?>

</div>