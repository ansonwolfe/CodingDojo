<?php
	session_start();

	if(isset($_POST['fibonacci'])) {
		fibonacci();
	}

	function fibonacci() {
		// create array to store results from squence
		$results = array();

		// check if numbers are numeric, set variable - did not finish with error messages
		if (is_numeric($_POST['first_number'])) {
			$num1 = $_POST['first_number'];
		}	

		if (is_numeric($_POST['first_number'])) {
		$num2 = $_POST['second_number'];
		}
		// echo $num1 . " , " . $num2;

		// loop through numbers ... as many times as specified in series
		for ($i=0; $i < $_POST['series'] ; $i++) { 
			$fib_num = $num1 + $num2; 
		
		// put result in array...
			$results[] = $fib_num;

		//set variables to number in results (recursion) 
			$num1 = $num2;
			$num2 = $fib_num;
		}

		// set numbers and results into session to transfer to index.php page
		$_SESSION['num1'] = $_POST['first_number'];
		$_SESSION['num2'] = $_POST['second_number'];
		$_SESSION['results'] = $results;
		// var_dump($_SESSION['results']);
	}

	 header ("Location: index.php");