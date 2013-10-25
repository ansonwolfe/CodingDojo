<?php

	include 'header.php';

?>	


	<div class="span12">
		<div class="header hero-unit">
			<img src="http://s3.amazonaws.com/creattica/designs/images/109846/original/farmdog_fu-jbyvnr.jpg" alt="logo">
		</div>

		<div class="container-fluid">	
			<div class="row">	
				<h3>New User? Register Now</h3>
					<form action="registration.php" method="post" class="span4 offset1">
						<!-- <input type='hidden' name='registration' value="reg" /> -->
					<!-- container where error messages are displayed. -->
<?php
							if(isset($_SESSION['error']))
							{
								echo "<div class='alert alert-error'> <ul>" ;
								
								foreach ($_SESSION['error'] as $message) 
								{
									echo "<li>" . $message . "</li>";
								}
								echo "</ul> </div>";
							}	
?>	
						<!-- highlights required fields -->
						<div class="control-group  
<?php 						if (isset($_SESSION['error']['req_fields']))
									{
										echo ' error';
									} 
?>							">
							<!-- highlight improper email format -->
							<div class="control-group
<?php 							if (isset($_SESSION['error']['email']))
										{
											echo ' error';
										} 
?>								">
								<label>Email*</label>
								<input type="text" name = "email" placeholder="email">
							</div>
							<!-- highlight improper names -->
							<div class="control-group 
<?php 							if (isset($_SESSION['error']['numbers']))
										{
											echo ' error';
										} 
?>								">
								<label>First Name*</label>
								<input type="text" name="first_name" placeholder="First Name" />					
							</div>
							
							<div class="control-group  
<?php 							if (isset($_SESSION['error']['numbers']))
										{
											echo ' error';
										} 
?>								">
								<label>Last Name*</label>
								<input type="text" name="last_name" placeholder="Last Name" class="control-group error"/>		
							</div>

							<label>Username*</label>
							<input type="text" name="username" placeholder="Username" />	
									<!--  high improper password and password match-->
							<div class="control-group 
<?php 							if (isset($_SESSION['error']['password']))
									{
										echo ' error';
									} 
?>">
								<label>Password*</label>
								<input type="password" name="password" placeholder="Password" />
							</div>
							<div class="control-group 
<?php 							if (isset($_SESSION['error']['password_match']))
									{
										echo ' error';
									} 
?>">
								<label>Confirm Password*</label>
								<input type="password" name="confirm_password" placeholder="Confirm Password" />
							</div>	
						</div>
						<input type="submit" name="registration" value="Register" class="btn btn-info" />
					</form>

				<!-- login side -->
				<form action="registration.php" method="post" class="span4 offset2">
<!-- 					<input type='hidden' name='login' value ="login"/> -->
					<h3>Registered? Login Now</h3>
<?php
						if(isset($_SESSION['login_error']))
						{
							echo "<div class='alert alert-error'>" . ($_SESSION['login_error']) . "</div>" ;
						} 
?>
					<div class="control-group">
						<label>Username</label>
						<input type="text" name="username" placeholder="username" />
					</div>
					<div class="control-group">
						<label>Password</label>
						<input type="password" name="password" placeholder="Password" />
					</div>
						<input type="submit" name="login" value="Login" class="btn btn-info" />
				</form>
			</div>
		</div>
	</div>	
<?php 
	unset($_SESSION['error']);
	unset($_SESSION['login_error']); 
?>
	
</body>
</html>