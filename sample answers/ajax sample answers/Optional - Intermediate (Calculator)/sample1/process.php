<?php
	$data['operation'] = $operation = $_POST['operation'];
	$first_number  = $_POST['first_number'];
	$second_number = $_POST['second_number'];
	
	switch($operation){
		case "sum":
			$data['result'] = $first_number + $second_number;
		break;
		case "multiply":
			$data['result'] = $first_number * $second_number;
		break;
		case "is_greater_than":
			$data['result'] = ($first_number > $second_number) ? 'TRUE' : 'FALSE';
		break;
		case "is_lesser_than":
			$data['result'] = ($first_number < $second_number) ? 'TRUE' : 'FALSE';
		break;
	}
	
	echo json_encode($data);
?>