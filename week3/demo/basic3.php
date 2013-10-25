<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Basic 3</title>
</head>
<body>
	<h3>Starting the program</h3>
		

		<?php
			$coin_toss = 20;
			$result = array(0, 0);	

			for ($i=1; $i <= $coin_toss ; $i++)
			{ 	
				$coin = rand(0,1);

				
				if ($coin == 0)
					echo "Attempt # " . $i . " Throwing a coin... It's a " ."head! ... Got " . $result[0] . " head(s) and " . $result[1] . " tail(s) so far." ."<br />";
				else 
					echo "Attempt # " . $i . " Throwing a coin... It's a " ."tail!..." . $result[1] . " tail(s) and " . $result[0] . " head(s) so far." . "<br />";
				
				$result[$coin] = $result[$coin]+1;

			}

		?>
	

	<h3>Ending the program - thank you!</h3>
</body>
</html>

