<!DOCTYPE html>

<html>

<head>
	<?php
		
		$winning_number = rand(1, 5);
		$contestant_number = "";
		$contestant_status = "";
		
	?>
	
</head>

<body>
	
	<form method='POST' action='user-input.php'>
		Enter 5 contestants.<br>
		<input type='text' name='contestant1'><br>
		<input type='text' name='contestant2'><br>
		<input type='text' name='contestant3'><br>
		<input type='text' name='contestant4'><br>
		<input type='text' name='contestant5'><br>
		<input type='submit' value='Pick a winner!'><br>
	</form>
	
	<pre>
	<?
	print_r($_POST);
	?>
	</pre>
	
	The winning number is <?=$winning_number?>.<br><br>
	
	<? foreach($_POST as $index => $name): ?>
		<? $contestant_number = rand(1, 5); ?>
		
		<? if($contestant_number == $winning_number) {
				$contestant_status = "Winner";
				}
				else {
					$contestant_status = "Loser";
				} ?>
		
		<?=$name?>'s number is <?=$contestant_number?>.
		<?=$name?> is a <?=$contestant_status?>! <br>
		
	<? endforeach; ?>
	
</body>

</html>