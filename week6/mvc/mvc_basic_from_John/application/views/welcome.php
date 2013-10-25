<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/static/css/style.css" />
	<title>Welcome</title>
</head>
<body>

<div id="wrapper">
	<div id="header">
		<h4>
			Welcome back <?= $user['firstname']?>
			<a href="/login/logout" class="close">Logout</a>
		</h4>
	</div>
	<div class="container indent_left_2">
		<h3>User Information</h3>
		<p>First Name: <?= $user['firstname']?></p>
		<p>Last Name:  <?= $user['lastname']?></p>
		<p>Email Address: <?= $user['email']?></p>
	</div>
</div>

</body>
</html>