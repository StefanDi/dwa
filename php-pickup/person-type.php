<!DOCTYPE html>

<html>

<head>
	<?php
	$age = 10;
	
	if($age <= 18) {
		$person_type = "kiddo";
	}
	else {
		$person_type = "adult";
	}
	?>
</head>

<body>
	You're a <?=$person_type?>
</body>

</html>