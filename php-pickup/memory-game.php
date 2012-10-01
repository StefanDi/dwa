<!DOCTYPE html>

<html>

<head>
	<?php
		$boxes = "";
		$random_width = "";
		$random_height = "";
		
		for($i = 1; $i <= 10; $i++) {
			$random_width = rand(1, 400);
			$random_height = rand(1, 400);
			$boxes = $boxes."<div style='width:$random_width"."px; height:$random_height"."px; float:left; margin:4px; background-color:red'></div>";
		}
	?>
	
</head>

<body>
	
	<?=$boxes?>
	<?=$random_width?>
	<?=$random_height?>
	
</body>

</html>