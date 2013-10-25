<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<h1>Stars Functions</h1>

<?php
	$number_array = array(4, 7, 6, 1, 3, 9);
	$mix_array = array(5, 8, "Phil", 25, "Jack", 24, "CodingDojo");
	function draw_stars($data)
	{
		$rows = count($data);
		/* before it can even loop to the entire $rows, it will enter another for loop
		* it will check if $inner_counter, which is ZERO is lesser than $data[$counter] which
		* is 4. Remember, $data is the array variable and $counter variable currently has ZERO
		* based on the outer for loop. so, $data[$counter] is $data[0] which points to 4 in our
		* $data array. And since 0<4, it will echo a star(*), it will loop again making
		* the $inner_counter's value to 1 which is also true: 1<4 is TRUE. So it will echo
		* another star(*) again until it reaches false, loops out and will echo <br>, then
		* making $counter's value to 1. Then continues on looping. 
		*/
		for ($counter=0; $counter<$rows; $counter++)
		{
			for ($inner_counter=0; $inner_counter<$data[$counter]; $inner_counter++)
			{
				echo "*";
			}
				echo "<br />";
		}
	}
	function draw_stars_two($data)
	{
		$rows = count($data);
		for ($counter=0; $counter<$rows; $counter++)
		{
			// If element is integer, print '*' that number of times
			if (is_int($data[$counter]))
			{
				for ($inner_counter=0; $inner_counter<$data[$counter]; $inner_counter++)
				{
					echo "*";
				}

				echo "<br />";
			}
			// If element is a string, print first letter as many times as string is long
			if (is_string($data[$counter]))
			{
				$letterCount = strlen($data[$counter]);
				$firstLetter = substr($data[$counter], 0, 1);

				for ($k=0; $k<$letterCount; $k++)
				{
					echo $firstLetter;
				}
				echo "<br />";
			}
		}
	}

?>
	<p>Just Stars Function</p>
	<?php draw_stars($number_array);?>

	<p>Mixed Array Function</p>
	<?php draw_stars_two($mix_array);?>	
</body>
</html>

