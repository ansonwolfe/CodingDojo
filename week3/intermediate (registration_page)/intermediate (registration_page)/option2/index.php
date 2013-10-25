<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Test</title>
</head>
<body>

	<h1>Registration Page</h1>
	<h3 style="color:red; font-size:10pt" id="validation">
		<?php 
		
		if(isset($_SESSION['errors']))
			{
				foreach ($_SESSION['errors'] as $key => $error_message) {
					echo $error_message;
				}
			} 
  			unset($_SESSION['errors']);

  		if(isset($_SESSION['validated']))
  			{
  				echo "<span style =\"color:green\">Thanks for submitting your information!</span>";
  			}
  			unset($_SESSION['validated']);

		?>
	</h3>
	<form id="user_registration" action="process.php" method="post">
		Email*: <input type="text" name="email" id="email" placeholder="email address"><br>
		First Name*:	<input type="text" name="first_name" id="first_name"  size="25" placeholder="ex: Taylor"><br>
		Last Name*: <input type="text" name="last_name" id="last_name"  size="25" placeholder="ex: Smith"><br>
		Password*: <input type="password" name="password" id="password" size="15"  placeholder="password"><br>
		Confirm Password*: <input type="password" name="confirm_password" size="15"  id="confirm_password" placeholder="password"><br>
		Birth Date: <input type="text" name="birth_date" id="birth_date" placeholder="mm/dd/yyyy"><br>
		<p style="font-size: 10pt">*required field</p>
		<br>
		<input type="submit" value="Register">
	</form>
</body>
</html>


