<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Codeigniter</title>
	<style type="text/css">
		fieldset {
			width: 350px;
		}
	</style>
</head>
<body>
	<h3>Welcome <?php  echo $first_name; ?></h3>
	
	<form id="logout" method="post" action="/user/process_logout">
		<input type="submit" value="Logout">
		<hr>
	</form>

	 <fieldset>
  		<legend>User Information:</legend>
 
			First Name: <?= $first_name ?> <br />
			Last Name: <?= $last_name ?> <br />
			Email Address: <?= $email ?> <br />
	</fieldset>		

		
</body>
</html>