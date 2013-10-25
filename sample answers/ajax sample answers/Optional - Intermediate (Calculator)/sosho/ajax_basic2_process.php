<?php
	if($_POST['hidden']=="sum")
	{	
		$data['process'] = "Sum";
		$data['answer'] = $_POST['num1'] + $_POST['num2'];
	}	
	if($_POST['hidden']=="multiply")
	{	
		$data['process'] = "Multiply";
		$data['answer'] = $_POST['num1'] * $_POST['num2'];
	}	
	if($_POST['hidden']=="less_than")
	{	
		$data['process'] = "Less Than";
		if($_POST['num1'] < $_POST['num2'])
			$data['answer'] = "True";
		else
			$data['answer'] = "False";
	}
	if($_POST['hidden']=="greater_than")
	{	
		$data['process'] = "Greater Than";
		if($_POST['num1'] > $_POST['num2'])
			$data['answer'] = "True";
		else
			$data['answer'] = "False";
	}		
	// var_dump($data);

	echo json_encode($data);

?>