<?php

function predump($array){
	echo "<pre>";
	var_dump($array);
	echo "</pre>";
}
	class Bike {

		var $price;
		var $max_speed;
		var $miles;

		function __construct($name, $price, $max_speed){
			$this->miles = 0;
			$this->price = $price;
			$this->max_speed = $max_speed;
			$this->name = $name;
		}
		function displayinfo(){
			echo
			"price: " . $this->price ."<br />" .
				"max speed: " .	$this->max_speed . "<br />" . "miles driven: " . $this->miles."<br />" ;
		}
		function drive() {
			echo "Driving <br />";
			$current_mileage = $this->miles;
			$this->miles = ($current_mileage+ 10);
		}
		// reverse and preventing negative miles
		function reverse() {
							
			$current_mileage = $this->miles;
			if ($current_mileage > 5) {
				echo "Reversing <br />";
				$this->miles = ($current_mileage - 5);
			}
			else
				echo "Not enough miles to reverse. <br />";
		}
	}
	// creating 3 instances of bike
	$bike1 = new Bike("bike1", 200, "25mph");
	$bike2 = new Bike("bike2", 4000, "55mph");
	$bike3 = new Bike("bike3", 500, "35mph");
	
	echo "<h3> bike 1 </h3>";
	$bike1->drive();
	$bike1->drive();
	$bike1->drive();
	$bike1->reverse();
	$bike1->displayinfo();

	echo "<h3> bike 2 </h3>";
	$bike2->drive();
	$bike2->drive();
	$bike2->reverse();
	$bike2->reverse();
	$bike2->displayinfo();

	echo "<h3> bike 3 </h3>";
	$bike3->reverse();
	$bike3->reverse();
	$bike3->reverse();
	$bike3->displayinfo();

?>
