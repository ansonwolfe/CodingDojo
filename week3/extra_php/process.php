<?php
	session_start();

	if (isset($_POST['month'])) {
		month_info();
	}

	function month_info() {
		$quarter = NULL;
		$season = NULL;

		switch ($_POST['month']) {
			case 'January':
				$quarter = '1st';
				$season = 'winter';
				break;
			case 'February':
				$quarter = '1st';
				$season = 'winter';
				break;	
			case 'March':
				$quarter = '1st';
				$season = 'spring';
				break;
			case 'April':
				$quarter = '2nd';
				$season = 'spring';
				break;		
			case 'May':
				$quarter = '2nd';
				$season = 'spring';
				break;
			case 'June':
				$quarter = '2nd';
				$season = 'summer';
				break;		
			case 'July':
				$quarter = '3rd';
				$season = 'summer';
				break;
			case 'August':
				$quarter = '3rd';
				$season = 'summer';
				break;		
			case 'September':
				$quarter = '3rd';
				$season = 'fall';
				break;
			case 'October':
				$quarter = '4th';
				$season = 'fall';
				break;		
			case 'November':
				$quarter = '4th';
				$season = 'winter';
				break;
			case 'December':
				$quarter = '4th';
				$season = 'winter';
				break;		
		}
	
	$_SESSION['month'] = $_POST['month'];
	$_SESSION['quarter'] = $quarter;
	$_SESSION['season'] = $season;
	header("Location: extra_6.php");
	}
?>