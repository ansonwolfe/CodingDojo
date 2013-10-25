<?php
	session_start();

	if(isset($_SESSION['logged_in']))
	{
		header("Location: wall.php");
	}
?>
<html>
<head>
	<title>Login and Registration</title>
</head>
<body>

	<h1>Login Form</h1>
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
		<input type="text" name="email"  value="mchoi@village88.com" placeholder="Email Address" />
		<input type="password" name="password"  value="123456"  placeholder="Enter password" />
		<input type="submit" value="Login" />
	</form>


<?php
	if(isset($_SESSION['message']))
	{
		
		echo $_SESSION['message'] ."<br />";
	
		unset($_SESSION['message']);
	}
?>

	<h1>Registration Form</h1>
	
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
		<input type="text" name="first_name" value="Michael" placeholder="First Name" /><br />
		<input type="text" name="last_name" value="Choi"  placeholder="Last Name" /><br />
		<input type="text" name="email" value="mchoi@village88.com"  placeholder="Email Address" /><br />
		<input type="password" name="password"  value="123456" placeholder="Enter password" /><br />
		<input type="password" name="password_confirmation" value="123456"  placeholder="Confirm password" /><br />
		<input type="submit" value="Register" />
	</form>


</body>
</html>