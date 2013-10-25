<?php
	session_start();
	require ("connection.php");

	// if(!isset($_SESSION['logged_in']))
	// {
	// 	header("Location: index.php");
	// }

	$query = "SELECT * FROM users ORDER BY id DESC";
	$users = fetch_all($query);


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>B's project</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/custom_style.css">
</head>
<body>