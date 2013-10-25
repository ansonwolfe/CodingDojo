<?php 
session_start(); 
	$_SESSION = array();
	$_SESSION['error'] = '';
	
	if(! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$_SESSION['email'] = TRUE;
		$_SESSION['error'] .= "<p>Email is invalid!</p>";
	}
	
	if(empty($_POST['first_name']))
	{
		$_SESSION['first_name'] = TRUE;
		$_SESSION['error'] .= "<p>First Name is required!</p>";
	}
	
	if(empty($_POST['last_name']))
	{
		$_SESSION['last_name'] = TRUE;
		$_SESSION['error'] .= "<p>Last Name is required!</p>";
	}		
		
	if(empty($_POST['password']))
	{
		$_SESSION['password'] = TRUE;
		$_SESSION['error'] .= "<p>Password is required!</p>";
	}
		
	if(empty($_POST['confirm_password']))
	{
		$_SESSION['confirm_password'] = TRUE;
		$_SESSION['error'] .= "<p>Confirm Password is required!</p>";
	}
	
	if($_POST['password'] != $_POST['confirm_password'])
	{
		$_SESSION['confirm_password'] = TRUE;
		$_SESSION['error'] .= "<p>Confirm Password must be the same as Password!</p>";
	}
	
	if(empty($_SESSION['error']))
	{
		$_SESSION = array();
		$_SESSION["success"] = '<p class="success">Thanks for submitting your information.</p>';
	}

	header( 'Location: /intermediate/' ) ;
	
?>