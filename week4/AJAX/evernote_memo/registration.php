<?php
 	session_start();
 	include ('connection.php');

function is_a_word($var)
		{
			$word = str_split($var);
				foreach ($word as $letter) 
				{
					if (is_numeric($letter))
						$_SESSION['error']['numbers'] = "Invalid name!";
				}
		}

// encapsulating registration checks within register_new_user
	function register_new_user() 
		{
			if (($_POST['first_name'] == "") OR ($_POST['last_name'] == "") OR ($_POST['username'] == "")) {
				 $_SESSION['error']['req_fields'] = "Required field(s).";
				}

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$_SESSION['error']['email'] = "Invalid email entered.";
				}	

			if (strlen($_POST['password']) < 6) {
					$_SESSION['error']['password'] = "Password needs to be longer than 6 characters.";
				}	

			if (($_POST['password']) != ($_POST['confirm_password'])) {
					$_SESSION['error']['password_match'] = "Passwords do not match.";
				}
// if all fields passed the registration test, store information in database, encrypt password, and redirect to wall.php
			if (!isset($_SESSION['error']))
			{
				$password = md5($_POST['password']);
				$first_name = mysql_real_escape_string($_POST['first_name']);
				$last_name = mysql_real_escape_string($_POST['last_name']);
				$username = mysql_real_escape_string($_POST['username']);
				$email = mysql_real_escape_string($_POST['email']);
				$password = mysql_real_escape_string($_POST['password']);

				$query = "INSERT INTO users (first_name, last_name, username, email, password, created_at) 
						VALUES ('$first_name','$last_name','$username','$email','$password', NOW())";

				mysql_query($query);
				
				$new_user = mysql_insert_id();
				login();

			 // 	header('Location: wall.php?id='. $new_user);
				// exit;
			}		
		}
// encapsulating login 
	function login() 
		{
		$login_password = md5($_POST['password']);

		$registered_user = fetch_record("SELECT * FROM users WHERE username = '{$_POST['username']}' AND password = '$login_password'");

		 	if ($registered_user != NULL) {

		 		$_SESSION['id'] = $registered_user['id'];
		 		$_SESSION['first_name'] = $registered_user['first_name'];
		 		$_SESSION['last_name'] = $registered_user['last_name'];
		 		$_SESSION['username'] = $registered_user['username'];
				$_SESSION['logged_in'] = TRUE;

				if ($_SESSION['logged_in'] === TRUE) {
					header('Location: wall.php?id='.$registered_user['id']);
		 			exit;
		 		}	
		 	}
		  	else {
		  		$_SESSION['login_error'] = "Username and/or Password do not match.";
		  		 header("Location:index.php");	
		  		 exit;
			}	
		}

// logout
	if (isset($_POST['logout'])) {
		session_destroy();
		header("Location: index.php");
		exit;
	}

// if registration form is used, invoke register_new_user function
	if (isset($_POST['registration'])) {
			register_new_user();
			is_a_word($_POST['first_name']);
 			is_a_word($_POST['last_name']);
		}			
	elseif (isset($_POST['login'])) {
			login();
		}		



 // header redirects back to index.php
 	header("Location:index.php");		
?>