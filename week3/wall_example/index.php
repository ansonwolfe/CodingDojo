<?php
	session_start();

	require("connection.php");

	if(isset($_SESSION['logged_in']))
	{
		header("Location: wall.php");
	}

	// echo "<pre>";
	// var_dump($_SESSION);
	// echo "</pre>";
?>

<html>
<head>
	<title>Login and Registration</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){

	});
	</script>

</head>
<body>

<?php
	if(isset($_SESSION['message']))
	{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
?>

	<h1>Login</h1>
<?php
	if(isset($_SESSION['login_errors']))
	{
		foreach($_SESSION['login_errors'] as $error)
		{
			echo $error ."<br />";
		}

		unset($_SESSION['login_errors']);

	}
?>	<form action="process.php" method="post">
		<input type="hidden" name="action" value="login" />
		<input type="text" name="email" placeholder="Email address" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" value="Login" />
	</form>

	<h1>Registration</h1>
<?php
	if(isset($_SESSION['register_errors']))
	{
		foreach($_SESSION['register_errors'] as $error)
		{
			echo $error ."<br />";
		}
		unset($_SESSION['register_errors']);
	}
?>
	<form action="process.php" method="post">
		<input type="hidden" name="action" value="register" />
		<input type="text" name="first_name" placeholder="First Name" /><br />
		<input type="text" name="last_name" placeholder="Last Name" /><br />
		<input type="text" name="email" placeholder="Email address" /><br />
		<input type="password" name="password" placeholder="Password" /><br />
		<input type="password" name="confirm_password" placeholder="Confirm Password" /><br />
		<input type="submit" value="Register" />
	</form>

</body>
</html>