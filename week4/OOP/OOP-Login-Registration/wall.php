<?php
	session_start();

	if(!isset($_SESSION['logged_in']))
	{
		header("Location: index.php");
	}
?>

Welcome <?= $_SESSION['user']['first_name'] ." " . $_SESSION['user']['last_name'] ?>!

<a href="process.php">Log Off</a>