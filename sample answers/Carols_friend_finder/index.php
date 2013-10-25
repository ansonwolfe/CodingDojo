<?php
	session_start();

	include_once("connection.php");

	if(isset($_SESSION['logged_in']))
	{
		header("location: main.php");
	}

?>

<html>
<head>
	<title>Friend Finder - Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){

	});
	</script>
</head>
<body>
	<div id="wrapper">
		<div id="embarquation">
			<h1>Welcome to Friend Finder</h1>
			<div id="registration">
				<h2>Please Register</h2>
<?php
	if(isset($_SESSION['register_errors']))
	{
		echo "<p class='errors'>";
		foreach($_SESSION['register_errors'] as $error)
		{
			echo $error ."<br />";
		}
		echo "</p>";
		unset($_SESSION['register_errors']);
	}
?>
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="register" />
					<input type="text" name="first_name" placeholder="First Name" /><br />
					<input type="text" name="last_name" placeholder="Last Name" /><br />
					<input type="text" name="email" placeholder="E-mail address" /><br />
					<input type="password" name="password" placeholder="Password" /><br />
					<input type="password" name="confirm_password" placeholder="Confirm Password" /><br />
					<input type="submit" value="Register" />
				</form>
			</div> <!--end of div registration-->
			<div id="login">
				<h2>Or Log-In</h2>
<?php
	if(isset($_SESSION['message']))
	{
		echo "<p class='valid'>" .  $_SESSION['message'] . "</p>";
		unset($_SESSION['message']);
	}
	if(isset($_SESSION['login_errors']))
	{
		foreach($_SESSION['login_errors'] as $error)
		{
			echo $error ."<br />";
		}
		unset($_SESSION['login_errors']);
	}
?>	
				<form action="process.php" method="post">
					<input type="hidden" name="action" value="login" />
					<input type="text" name="email" placeholder="E-mail address" /><br />
					<input type="password" name="password" placeholder="Password" /><br />
					<input type="submit" value="Login" />
				</form>
			</div><!--end of div login-->
		</div><!--end of div embarquation-->
	</div><!--end of div wrapper-->
</body>
</html>