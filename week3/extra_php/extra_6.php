<?php 
	session_start();
?>		
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Extra Assignment 6</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">
	  	$(document).ready(function() {
	  		$("#enter").submit(function(){
    			$("#month_selected").append($("#month").val() + "<br>");
				return false;
    		});

	  	});	
	</script>
	<style type="text/css">
		#month_details {
			width: 250px;
			height: 230px;
			padding: 25px;
			margin: 20px;
			border: 1px solid silver;
		}
	</style>
</head>
<body>
	<form action="process.php" method="post">
		<label>Choose a Month: </label>
		<select name="month">
<?php 		$months = array('January','February','March','April','May','June','July','August','September','October','November','December');	
			foreach ($months as $month) {
				echo "<option>" . $month . "</option>";
			}
?>
		</select>
		<input type="submit" value="Enter">
		<input type="hidden" id="month" value="<?=$month?>">
	</form>

	<div id="month_details">
		<h3>Results</h3>
		<h1><?= $_SESSION['month'] ?></h1>
		
		<label>Quarter: <label> <?= $_SESSION['quarter']; ?>  <br />
		<label>Season: <label> <?= $_SESSION['season']; ?>  <br />
	</div>


</body>
</html>
<?php


?>