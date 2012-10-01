<!DOCTYPE html>

<html>

<head>
	<?php
	$age = 23;
	
	if($age < 12) {
		$person_type = "kiddo";
	}
	elseif($age > 12 AND $age <= 19) {
		$person_type = "teenager";
	}
	elseif($age > 19 AND $age <= 80) {
		$person_type = "adult";
	}
	else {
		$person_type = "super wise person";
	}
	?>
</head>

<body>
	You're a <?=$person_type?>
</body>

</html>