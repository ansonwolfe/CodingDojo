<?php

	include("connection.php");

	session_start();
	
	//if the user is trying to register
	if(isset($_POST['action']) && $_POST['action'] == "register")
	{
		registerAction();
	}
	else if(isset($_POST['action']) && $_POST['action'] == "login")
	{
		loginAction();
	}
	else
	{
		//user is probably wanting to log off
		session_destroy();
		header("Location: index.php");
	}

	function pre_vardump($array)
	{
		echo "<pre>";
		var_dump($array);
		echo "</pre>";
	}

	function loginAction()
	{
		$errors = array();

		// echo "user is trying to login!";

		if(!(isset($_POST['email']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
		{
			$errors[] = "invalid email address";
		}

		if(!(isset($_POST['password']) AND strlen($_POST['password']) > 0))
		{
			$errors[] = "invalid password";
		}

		if(count($errors) > 0)
		{
			$_SESSION['login_errors'] = $errors;
			header("Location: index.php");
		}
		else
		{
			//check to see if what has been posted matches the database
			$query = "SELECT * FROM users WHERE email = '{$_POST['email']}' AND password = '".md5($_POST['password'])."'";

			$users = fetchRecords($query);

			if(count($users)>0)
			{
				$_SESSION['user']['first_name'] = $users[0]['first_name'];
				$_SESSION['user']['last_name'] = $users[0]['last_name'];
				$_SESSION['user']['email'] = $users[0]['email'];
				$_SESSION['logged_in'] = true;
				header("Location: wall.php");
			}
			else
			{
				$errors[] = "Invalid login information";
				$_SESSION['login_errors'] = $errors;
				header("Location: index.php");
			}
		}
	}

	function registerAction()
	{
		$errors = array();

		// echo "user is trying to register!";
		if(!(isset($_POST['first_name']) AND is_string($_POST['first_name']) AND strlen($_POST['first_name'])>0))
		{
			$errors[] = "invalid first name";
		}

		if(!(isset($_POST['last_name']) AND is_string($_POST['last_name']) AND strlen($_POST['last_name'])>0))
		{
			$errors[] = "invalid last name";
		}


		if(!(isset($_POST['email']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
		{
			$errors[] = "invalid email address";
		}

		if(!(isset($_POST['password']) AND isset($_POST['password_confirmation']) AND strlen($_POST['password']) > 0AND $_POST['password'] == $_POST['password_confirmation']))
		{
			$errors[] = "invalid password and password confirmation";
		}

		//first check whether a user with that email address already exists
		$query = "SELECT * FROM users WHERE email = '{$_POST['email']}'";
		$users = fetchRecords($query);

		if(count($users) > 0)
		{
			$errors[] = "User with that email address already exists";
		}

		if(count($errors) > 0)
		{
			$_SESSION['register_errors'] = $errors;
			header("Location: index.php");
		}
		else
		{

			$query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '".md5($_POST['password'])."', NOW())";
			mysql_query($query);

			$user_id = mysql_insert_id();
			$_SESSION['message'] = "Hey You're registered!";
			header("Location: index.php");
		}
	}

	// pre_vardump($_POST);
?>