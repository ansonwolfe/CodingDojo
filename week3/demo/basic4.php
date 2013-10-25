<?php
	function get_max_and_min($numbers)
	{
		$min = $numbers[0];
		$max = $numbers[0];

		foreach ($numbers as $num) 
		{
			if ($num < $min)
				$min = $num;

			if ($num > $max)
				$max = $num;
		}

	$result = array("max" => 0, "min" => 0);
	$result["max"] = $max;
	$result["min"] = $min;	
	return $result; 
	}

	$array = array(1,4,5,88,2,4,6,77,998,0,-40, -4,50);
	$output = get_max_and_min($array);

	var_dump($output);
?>