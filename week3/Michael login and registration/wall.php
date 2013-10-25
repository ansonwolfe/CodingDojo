<?php
	session_start();

	if(!isset($_SESSION['logged_in']))
	{
		header("Location: index.php");
	}
?>

Welcome <?= $_SESSION['user']['first_name'] ?>!

<a href="process.php">Log off</a>