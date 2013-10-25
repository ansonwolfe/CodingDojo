<?php
	session_start();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Extra PHP 7</title>
	<style type="text/css">
		#result {
			width: 450px;
			height: 50px;
			padding: 25px;
			margin: 20px;
			border: 1px solid silver;
		}
	</style>
</head>
<body>
	
	<form action="process.php" method="post">
		<input type="hidden" name="fibonacci" value="fibonacci">

		<label>Enter a Number: </label>
		<input type="text" name="first_number">
		<br />
		<label>Enter another number: </label>
		<input type="text" name="second_number">
		<br />
		<label>Series: </label>
		<input type="text" name="series">
		<br />	
		<input type="submit" value="Run Fibonacci">
	</form>

	<div id="result">
		<?= $_SESSION['num1'] . " , " . $_SESSION['num2'];
		// var_dump($_SESSION['results']);
			 foreach ($_SESSION['results'] as $result) {
			 	echo " , " . $result;
			 }
			 unset($_SESSION);
		  ?> 

	</div>


</body>
</html>