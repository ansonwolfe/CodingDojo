<?php

function predump($array){
	echo "<pre>";
	var_dump($array);
	echo "</pre>";
}

class Dojo{

	var $name;
	var $health;
	var $x;
	var $y;
	var $ninjas;
	var $dragons;

	function __construct($name){
		echo "constructing a new dojo called " . $name ."<br />";
		$this->name = $name;
		$this->ninjas = 0;
		$this->dragons = 0;
	}

	function create_ninjas($num=1) {
		echo "creating ninjas for " . $this->name."<br />";
		$this->ninjas = $this->ninjas+$num;
	}
	function create_dragons($num) {
		echo "creating dragons for " . $this->name."<br />";
		$this->dragons = $this->dragons+$num;
	}
}

$dojo1 = new Dojo("CodingDojo");
$dojo2 = new Dojo("HackerDojo");
$dojo3 = new Dojo("MojoDojo");

$dojo1->create_ninjas();
$dojo2->create_ninjas(2);
$dojo3->create_dragons(5);
$dojo3->create_dragons(3);

echo "Dojo1's name is " . $dojo1->name;

predump($dojo1);
predump($dojo2);
predump($dojo3);

