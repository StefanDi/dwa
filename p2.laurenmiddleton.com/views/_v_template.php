<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- CSS -->
	<link rel='stylesheet' type='text/css' href='/css/lkm-styles.css' />
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="/js/jquery-ui-1.8.24.custom/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui-1.8.24.custom/js/jquery-ui-1.8.24.custom.min.js"></script>
	<script type="text/javascript" src="../js/p2-main.js"></script>
	<script type="text/javascript" src="../js/p2-nav-helper-functions.js"></script>	
				
	<!-- Controller Specific JS/CSS -->
	<?php echo @$client_files; ?>
	
	
</head>

<body>	

		<?=@$header;?>
	
		<?=$content;?>
			
		<?=@$footer;?>

</body>
</html>