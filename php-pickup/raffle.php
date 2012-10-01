<!DOCTYPE html>

<html>

<head>
	<?php
		$contestants["Sam"] = "";
		$contestants["Eliot"] = "";
		$contestants["Liz"] = "";
		$contestants["Max"] = "";
		
		$winning_number = rand(1, 4);
		$contestant_status = "";
		$some_winner = false;		
		

	?>
	
</head>

<body>
	
	<h1>Contestants</h1>
	
	The winning number is <?=$winning_number?>.<br><br>
	
	<? foreach($contestants as $name => $contestant_number): ?>
			<? $contestant_number = rand(1,4)?>
			
			<? if($contestant_number == $winning_number) {
				$contestant_status = "Winner";
				$some_winner = true;
				}
				else {
					$contestant_status = "Loser";
				} ?>
				
			<?=$name?>'s number is <?=$contestant_number?>.
			<?=$name?> is a <?=$contestant_status?>! <br>
			
	<? endforeach; ?> <br>
	
	<? if($some_winner == false) {
			echo "No winners this round :(";
		} ?>
	
	
	
</body>

</html>