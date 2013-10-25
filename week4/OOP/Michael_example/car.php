<?php
function predump($array){
	echo "<pre>";
	var_dump($array);
	echo "</pre>";
}

class Accord{

	var $color;
	var $vin;
	var $odometer;

	function __construct(){
		echo "<br />Creating a new Accord";
		$this->odometer = 0;
	}
	function update_color($color){
		$this->color = $color;
		echo "<br />Color is now " . $this->color;
	}
	function drive(){
		echo "<br />Driving.";
		$current_odometer = $this->odometer;
		$this->update_odometer($current_odometer+1);
	}
	private function update_odometer($odometer){
		$this->odometer = $odometer;
		echo "<br />Updating Odometer";
	}
}

$michaelAccord = new Accord();
$michaelAccord->update_color('green');
$michaelAccord->drive();
$michaelAccord->drive();
$michaelAccord->drive();
predump($michaelAccord);
