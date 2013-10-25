<?php

	$data['errors'][] = "first name is invalid";
	$data['errors'][] = "last name is invalid";

	function displayErrors(){
		global $data;
		$data['errors'][] = "Hi!";

		foreach($data['errors'] as $error)
		{
			echo $error ."<br />";
		}
	}

	displayErrors();
	var_dump($data);
	
?>