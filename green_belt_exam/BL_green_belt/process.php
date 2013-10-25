<?php
	session_start();
	include "connection.php";

	if(isset($_POST['country'])) {
		city_details();
		country_details();
		$_SESSION['country'] = $_POST['country'];
	}

	function city_details() {
		$query = "SELECT * from City
					WHERE CountryCode = '{$_POST['country']}'";

		$city_details = fetch_all($query);

		$_SESSION['city_details'] = $city_details;
	}

	function country_details() {

		$query = "SELECT CountryLanguage.*, Country.Population, Name FROM CountryLanguage 
					LEFT JOIN Country ON CountryLanguage.CountryCode = Country.Code
					WHERE CountryLanguage.CountryCode = '{$_POST['country']}'";

		$country_details = fetch_all($query);
		// echo "<pre>";
		// var_dump($country_details);
		// echo "</pre>";
		$_SESSION['$country_details'] = $country_details;
	}			 
	
	header("Location: index.php");
?>	