<?php

// Original bjective was to print out a * equivalent to each of the number in the array. 
// Step 1. Take out each number from array ==> Store into a variable $y.
// Step 2. For each of the variable $y, print out one star... for as long as $y (< because 0 is included).


	function draw_stars($var)
	{
		for ($i=0; $i < count($var); $i++) 
		{ 
			$y = $var[$i];
			$length = strlen($y);
			
			if (is_numeric($y))
				{
					for ($star=0; $star < $y; $star++)
					{
							echo  "*";
					}
				}		
			else 
				{
					for ($star=0; $star < $length; $star++)
					{
							echo strtolower(substr($y, 0, 1));
					}
				}	

			echo "<br / >";	
		}
	}

	$x = array(4,'Tom',1,'Michael',5,7, 'Jimmy Smith');
	// call the function
	draw_stars($x);

?>