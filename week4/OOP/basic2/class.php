<?php

	class Car {
	    var $speed_information;
	    var $fuel;
	    var $mileage;
	   	var $price;
	    var $tax;

	    function __construct($price, $speed_information, $fuel, $mileage) 
	    { 
			$this->price = $price;
			$this->speed_information = $speed_information;
			$this->fuel = $fuel;
			$this->mileage = $mileage;
			$this->tax_rate($price);
			$this->display_all();

		}
		// if price is more than 10K, increase tax rate
			private function tax_rate($price){
				if ($price < 10000)
					$this->tax = 0.12;
				else 
					$this->tax = 0.26;
			}

		
		function display_all() {
			echo "Price: " . $this->price . "<br >" .
					"Speed: " . $this->speed_information . "<br />" .
					"Fuel: " . $this->fuel . "<br />" .
					"Mileage: " . $this->mileage  . "<br />" .
					"Tax: " . $this->tax  . "<br />";  
		}
			
	}
	// creating the cars...
	echo "<h3> car 1 </h3>";
	$car1 = new Car(2000, "35mph", "Full","15mpg");

	echo "<h3> car 2 </h3>";
	$car2 = new Car(2000, "35mph", "Empty","15mpg");

	echo "<h3> car 3 </h3>";
	$car3 = new Car(2000, "35mph", "Kind of Full","15mpg");

	echo "<h3> car 4 </h3>";
	$car4 = new Car(2000, "45mph", "Full","15mpg");

	echo "<h3> car 5 </h3>";
	$car5 = new Car(20000, "35mph", "Full","95mpg");
?>