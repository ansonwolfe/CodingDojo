<?php
	$array = array();
	ini_set("auto_detect_line_endings", true);
	$file = fopen('us-500.csv', 'r');
	while (! feof($file)) 
	{
		$array[] = fgetcsv($file);
	}
	fclose($file);

	for ($i=0; $i < count($array[0]); $i++) { 
		$property[$i] =  $array[0][$i]; //stores values into property array
		//echo "property is " . $property[$i] . "<br>";
	}
	
 	$j = 1; //fake runner
	foreach (array_slice($array,1) as $person) {

		echo "<pre>";
		echo "<h2>Header " . $j . "</h2>";
		echo "<ul>";
		$j++;
		//var_dump($person);
		foreach ($person as $key => $value) {

			$key = $property[$key]; //
			echo "<li> $key: $value </li>";
		}
		echo "</pre>";
		echo "</ul>";

	}

	// var_dump($array);


?>
