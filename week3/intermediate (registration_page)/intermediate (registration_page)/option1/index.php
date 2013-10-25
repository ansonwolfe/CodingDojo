<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>PHP Advanced Assignment - Intermediate</title>
	<style type="text/css">
		*{
			font:12px Arial;
			margin:0px;
			padding:0px;
		}
		#registration_form{
			margin:0px auto;
			margin-top:100px;
			border:1px solid #c9c9c9;
			padding:10px;
			width:350px;
		}
		#registration_form ul{
			list-style:none;
		}
		#registration_form li{
			margin-bottom:10px;
		}
		#registration_form li label{
			float:left;
			width:150px;
		}
		#registration_form li input{
			float:right;
			width:190px;
		}
		#registration_form li .birthdate{
			float:right;
		}
		#registration_form li input[type="submit"]{
			padding:2px;
			width:80px;
		}
		.clear{
			clear:both;
		}
		.message p{
			color:#FF0000;
			margin-bottom:5px;
		}
		.message p.success{
			color: green;
			margin-bottom:10px;
		}
		.error{
			border:1px solid red;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<form id="registration_form" action="process.php" method="post">
			<div class="message">
				<?php 		
				if(! empty($_SESSION['error']))
				echo $_SESSION['error'];
				else
				{
					if(! empty($_SESSION['success']))
						echo $_SESSION['success'];
				} ?>			
			</div>
			<div class="clear"></div>
			<ul>
				<li>
					<label for="Email">Email</label>
					<input type="text" name="email" <?= (! empty($_SESSION['email'])) ? 'class="error"' : '' ?>/>
					<div class="clear"></div>
				</li>
				<li>
					<label for="First Name">First Name</label>
					<input type="text" name="first_name" <?= (! empty($_SESSION['first_name'])) ? 'class="error"' : '' ?>/>
					<div class="clear"></div>
				</li>
				<li>
					<label for="Last Name">Last Name</label>
					<input type="text" name="last_name" <?= (! empty($_SESSION['last_name'])) ? 'class="error"' : '' ?>/>
					<div class="clear"></div>
				</li>
				<li>
					<label for="Password">Password</label>
					<input type="password" name="password" <?= (! empty($_SESSION['password'])) ? 'class="error"' : '' ?>/>
					<div class="clear"></div>
				</li>
				<li>
					<label for="Confirm Password">Confirm Password</label>
					<input type="password" name="confirm_password" <?= (! empty($_SESSION['confirm_password'])) ? 'class="error"' : '' ?>/>
					<div class="clear"></div>
				</li>
				<li>
					<label for="Birthdate">Birthdate</label>
					<div class="birthdate">
						<select name="month">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select name="date">
						<?php for($counter=1; $counter<=31; $counter++)
							{ ?>
								<option value="<?= $counter ?>"><?= $counter ?></option>
						<?php } ?>
						</select>
						<select name="year">
						<?php for($counter=1970; $counter<=date('Y'); $counter++)
							{ ?>
								<option value="<?= $counter ?>"><?= $counter ?></option>
						<?php } ?>		
						</select>
					</div>
					<div class="clear"></div>
				</li>
				<li><input type="submit" value="Register" /></li>
			</ul>
		</form>
	</div>
</body>
</html>