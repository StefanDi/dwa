<!DOCTYPE html>

<html>

<head>
	<?php
	$quarter = .25;
	$dime = .10;
	$nickle = .05;
	$calculate_total = ($quarter*3)+($dime*4)+($nickle*1);
	?>
</head>

<body>
	I have this much money: <?=$calculate_total?>
</body>

</html>