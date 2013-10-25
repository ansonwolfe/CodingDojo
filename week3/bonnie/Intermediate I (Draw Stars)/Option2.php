<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Basic II</title>
</head>

<body>
<?php
	// for loop responsible for displaying only stars
	$numbers_array = array(4, 6, 8, 1, 9, 10, 4, 2, 2, 7, 17);
	for($counter = 0; $counter < count($numbers_array); $counter++)
	{
		for($inner_counter = 0; $inner_counter < $numbers_array[$counter]; $inner_counter++)
		{
			echo "*";
		}
		echo "<br />";
	}

	echo "<br /> <br /> <br /> <br />";

	// for loop responsible for displaying stars and strings
	for($counter = 0; $counter < count($numbers_strings_array); $counter++)
	{
		if(is_numeric($numbers_strings_array[$counter]))
		{
			for($inner_counter = 0; $inner_counter < $numbers_strings_array[$counter]; $inner_counter++)
			{
				echo "*";
			}			
		}	
		else
		{	
			$string = $numbers_strings_array[$counter];
			for($inner_counter = 0; $inner_counter < strlen($string); $inner_counter++)
			{
				echo strtolower($string[0]);
			}
		}	
		echo "<br />";
	}
?>
</body>