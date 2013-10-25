<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login page - Codeigniter</title>
	<style type="text/css">
		fieldset {
			width: 350px;
		}

	</style>
</head>
<body>
	 <form id="login" action="/user/process_login" method="post">
		<fieldset>
	 		 <legend>Login:</legend>
			<?php if (isset($login_errors))
					{
						 	echo $login_errors;
					}	?>
			
				<label>Email</label>
				<input type="text" name="email" />
				<br />
				<label>Password</label>
				<input type="password" name="password" />
				<br />
				<input type="submit" value="Login" />
		</fieldset>
	</form>
	<br />
	<form id="register" action="/user/process_register" method="post">
		<fieldset>
  			<legend>Register:</legend>
			<?php  if (isset($errors))
				{
					 	echo $errors;
				}	?>
			<label>First Name: </label>
			<input type="text" name="firstname">
			<br />
			<label>Last Name: </label>
			<input type="text" name="lastname">
			<br />
			<label>Email Address: </label>
			<input type="text" name="email">
			<br />
			<label>Password: </label>
			<input type="password" name="password">
			<br />
			<label>Confirm Password: </label>
			<input type="password" name="cpassword">
			<br />
			<input type="submit" value="Register">
		</fieldset>	
	</form>
</body>
</html>