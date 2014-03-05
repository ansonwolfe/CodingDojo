<?php
	function odd_or_even($num){

		for ($i=0; $i < $num; $i++) { 
			echo "Number is " . $i . ".  ";

			if($i % 2 == 0)
				echo "This is even.";
			else
				echo "This is odd.";
		
			echo "</br>";
		}


	}


	odd_or_even(50);
?>

