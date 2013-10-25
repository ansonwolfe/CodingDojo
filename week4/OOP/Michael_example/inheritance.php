<?php

	class Car{
		var $color;
		var $odometer;
		var $doors;

		function __construct(){
			echo "<br />Creating a car!!!";
		}

		function destroy(){
			echo "<br />Destroying the car!!!";
		}
	}

	class Accord extends Car{
	
		function destroy(){
			echo "<br />Destroying the Accord!";
			parent::destroy();
		}
	}

	$accord = new Accord();
	$accord->destroy();


