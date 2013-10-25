<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/static/css/style.css" />
	<title>Codeigniter Basic Assignment</title>
</head>
<body>
<div id="wrapper">
<?php 
	/*
	* Display error message for user login.
	*/
	
	if(isset($submitted_form) && $submitted_form == 'login' && isset($error_message))
	{
		echo "<div class='container'><div class='alert-error'><p>". $error_message ."</p></div></div>";
	}
?>
	<!-- Login Form -->
	<div class="container">
		<h4>Log In</h4>
		<form action="" method="post" class="form-horizontal">		
			<div class="control-group">
				<label for="email" class="span1" >Email: </label>
				<div class="controls">
					<input type="text" id="email" class="span3" name="email" />
				</div>
			</div>
			<div class="control-group">
				<label for="password" class="span1">Password: </label>
				<div class="controls">
					<input type="password" id="password" name="password" />
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<input type="hidden" name="form_action" value="login" />
					<button type="submit" class="btn btn-primary pull-right">Login</button>
				</div>
			</div>
		</form>
	</div>
<?php 
	/*
	* Display error message/success message for user registration.
	*/
	
	if(isset($submitted_form) && $submitted_form == 'register')
	{
		if(isset($error_message))
			echo "<div class='container'><div class='alert alert-danger'><p>". $error_message ."</p></div></div>";
		elseif(isset($success_message))
			echo "<div class='container'><div class='alert alert-success'><p>". $success_message ."</p></div></div>";
	}
?>
	<!-- Registration Form -->
	<div class="container">
		<h4>Or Register</h4>
		<form action="" method="post" class="form-horizontal">
			<div class="control-group">
				<label for="email" class="span2" >Email Address: </label>
				<div class="controls">
					<input type="text" id="email" class="span3" name="email" />
				</div>
			</div>
			<div class="control-group">
				<label for="firstname" class="span2" >First Name: </label>
				<div class="controls">
					<input type="text" id="firstname" class="span3" name="firstname" />
				</div>
			</div>
			<div class="control-group">
				<label for="lastname" class="span2" >Last Name: </label>
				<div class="controls">
					<input type="text" id="lastname" class="span3" name="lastname" />
				</div>
			</div>
			<div class="control-group">
				<label for="password" class="span2">Password: </label>
				<div class="controls">
					<input type="password" id="password" name="password" />
				</div>
			</div>
			<div class="control-group">
				<label for="re_password" class="span2">Confirm Password: </label>
				<div class="controls">
					<input type="password" id="re_password" name="re_password" />
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<input type="hidden" name="form_action" value="register" />
					<button type="submit" class="btn btn-primary pull-right">Register</button>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>