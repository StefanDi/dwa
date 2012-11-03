<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- CSS -->
	<link rel='stylesheet' type='text/css' href='/css/lkm-styles.css' />
	
	<!-- JS -->
				
	<!-- Controller Specific JS/CSS -->
	<?php echo @$client_files; ?>
	
	
</head>

<body>	

		<?=@$header;?>
	
		<?=$content;?>
			
		<?=@$footer;?>

</body>
</html>