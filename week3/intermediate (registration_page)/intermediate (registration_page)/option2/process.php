<?php 

	session_start();

	//error validation------------------------------------------------------------------/
	$errors = array();

	//email validation
	if(empty($_POST['email'])){
		$errors[] = "Email cannot be blank. <br />";
	} 
	elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		//show no error, pass email to database
	} 
	else{
		$errors[]= "Please enter a valid email. <br />";
	}

	//first name & last name validation
	$name = array(
		"first_name" => "First Name",
		"last_name" =>"Last Name",
	);
	foreach ($name as $input_name => $input_label) {
		if(empty($_POST[$input_name])){
			$errors[] = $input_label . " cannot be blank. <br/>";
		}
		elseif(preg_match('/[^a-zA-Z]/', $_POST[$input_name])){
			$errors[] = "Please enter a valid " . $input_label . ".<br/>";
		}
		else{
			//show no errors, pass name to database
		}
	}

	//password validation
	if(empty($_POST['password'])){
		$errors[] = "Password cannot be blank. <br />";
	}
	elseif(strlen($_POST['password'])<6){
		$errors[] = "Password must be at least 6 characters. <br />";
	}else{
		//show no errors, pass password to database
	}

	//password confirmation validation
	if(empty($_POST['confirm_password'])){
		$errors[] = "Confirm Password cannot be blank. <br />";
	}
	elseif($_POST['confirm_password'] <> $_POST['password']){
		$errors[] = "Confirm Password must match Password. <br />";		
	}

	//birthdate confirmation
	if (preg_match("'\b(0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01])[- /.](19|20)?[0-9]{2}\b'", $_POST['birth_date'])) {
  	}
  	else{
  		$errors[] = 'Please enter your birthdate in a valid format. mm/dd/yyyy';
  	}

  	//errors validation end -------------------------------------------------------------/
 	

  	//if errors array is empty, validate -----------------------------------------------/
  	if(count($errors) > 0)
  	{
		$_SESSION['errors'] = $errors;
  	}
  	else
  	{
  		$_SESSION['validated'] = true;
  	}


	header('location: index.php');




 ?>