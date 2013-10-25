<?php
// assignment 1
echo "<h3>Assignment 1</h3>";
   
	for ($i=1; $i < 8; $i++) { 

		for ($j=1; $j <= $i; $j++) { 
		
			echo $j;
		}
		echo "<br />";
	}	

	for ($i=6; $i >0; $i--) { 
		for ($j=1; $j <= $i; $j++) { 
		
			echo $j;
		}
		echo "<br />";
	}

// assignment 2
echo "<h3>Assignment 2</h3>";

	function convert_number($x) {
		if ($x % 2 == 0)
			echo $x / 2;

		else 
			echo $x/3 + 1;
	} 

	convert_number(10);

// assignment 3
echo "<h3>Assignment 3</h3>";	

function replace_love ($name){
	$poem = "Love is patient and kind. <br />
		Love is not jealous or boastful or proud or rude. <br />
		Love does not demand its own way.<br />
		Love is not irritable, and it keeps no record of being wronged.<br />
		Love does not rejoice about injustice but rejoices whenever the truth wins out. <br />
		Love never gives up, never loses faith, is always hopeful, and endures through every circumstance. ";
	// $name = "Cobie";
	$new_poem = str_replace('Love', $name, $poem);

	echo $new_poem;	
// 	$replace = preg_replace('/\bLove\b/u', $name, $poem);
// 	echo $replace;
 }
// $name = "Cobie";

replace_love('Cobie');

// assignment 4
echo "<h3>Assignment 4</h3>";	
	
	for ($i=1; $i <= 10; $i++) { 
		echo $i . " X " . $i ." = " . $i*$i . "<br />"; 
	}
// assignment 5
echo "<h3>Assignment 5</h3>";	

	$names = array('KB','John','a','Oliver','Leonardo', 'Mikey', 'Michael');

		$min = $names['0'];
		$max = $names['0'];

	foreach ($names as $name) {
		if (strlen($name) < strlen($min)) {
			$min = $name;
		}
		if (strlen($name) > strlen($max)) {
			$max = $name;
		}
	
	}
	echo $min;
	echo $max;

	// // I don't fully understand this function & what it does. Can you explain in video feedback? Thanks.
	// function sortByLength($a,$b){
	//   if($a == $b) return 0;

	//   return (strlen($a) > strlen($b) ? -1 : 1);
	// }
	// usort($names,'sortByLength');
	
	// foreach ($names as $name) {
	// 	echo $name . "<br />";
	// }
?>