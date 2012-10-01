<!DOCTYPE html>

<html>

<head>
	<?php
		$hour = date(G);
		$background_color = "";
		
		if ($hour < 20) {
			$background_color = blue;
		}
		else {
			$background_color = black;
		}
	?>
	
	<style type='text/css'>
		body {
			background-color: <?=$background_color?>;
		}
	</style>
	
</head>

<body>
	<?=$hour?>
</body>

</html>