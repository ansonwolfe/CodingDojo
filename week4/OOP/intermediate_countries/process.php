<?php
	include "connection.php";
	
	// inherits everything from Databse class
	class Country extends Database {

		var $country;
		var $country_db;

	// create Database instance
	    function __construct(){
	    	parent::__construct();
		}

		function pull_country_names(){	
			$query = "SELECT code, name FROM country;";
			
			$country_names = $this->fetch_all($query);
			return $country_names;
		}

		function find_country_info(){
			$query = "SELECT Name, Continent, Region, SurfaceArea, Population, LifeExpectancy, GovernmentForm FROM country WHERE code = '".$_POST['country_selected']. "'";

			$selected_country = $this->fetch_record($query);
			// $selected_country = json_encode($selected_country);
			echo json_encode($selected_country);
		}		
	}	
// initiate the Country class
	$country = new Country();

	// pulling country info
		if(isset($_POST['country_selected']))
		{
			$country->find_country_info();
		}
?>