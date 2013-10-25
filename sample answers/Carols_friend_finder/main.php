<?php
	session_start();
	if(!isset($_SESSION['logged_in']))
	{
		header("location: index.php");
	}
	include('library.php');
?>
<html>
	<head>
		<title>Friend Finder - Home Page</title>
		<link rel="stylesheet" href="css/blue_theme/style.css" type="text/css" />
		<style>
			#list_wrapper
			{
				width:600px;
			}
		</style> 
		<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
		<script>
			$(document).ready(function() 
		    { 
		        $('#friendstable, #userstable').tablesorter({sortList:[[0,0],[2,1]], widgets: ['zebra']}); 
		    });
		</script>
	</head>
	<body>
<?php 
	echo "Welcome " . $_SESSION['user']['first_name'] ." " . $_SESSION['user']['last_name'] . "! <br />" . $_SESSION['user']['email'] . "<br /><a href='process.php'>Log Off</a>";
?>
		<div id='list_wrapper'>
			<h2>List of Friends</h2>
<?php 	 	
			$table->friendsTable();
?>	
			<h2>List of Users who subscribed to Friend Finder</h2>
<?php 	
			$table->usersTable();
?>	
		</div><!--end of div list_wrapper-->

	</body>
</html>
