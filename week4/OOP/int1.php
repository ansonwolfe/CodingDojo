<?php
	class Animal {
		var $name;
		var $health;

		function __construct($name){
			$this->health = 100;
			$this->name = $name;
			$this->displayHealth();
		}

		function walk (){
			$this->health = ($this->health - 1); 
		}
		function run () {
			$this->health = ($this->health - 5);
		}
		function displayHealth () {
			echo "Animal name: " . $this->name . "<br />" . "Health: " . $this->health . "</br >";
		}
	}	
	class Dog extends Animal {

		function __construct($name){
			$this->health = 150;
			$this->name = $name;
		}
		
		function pet() {
			$this->health = ($this->health +5);
		}	
			
	}
		class Dragon extends Animal {

		function __construct($name){
			$this->health = 170;
			$this->name = $name;

		}
		
		function fly() {
			$this->health = ($this->health -10);
		}

		function displayHealth() {
			echo "This is a Dragon! <br />";
			Animal :: displayHealth();
		}	
			
	}
	echo "<h3> animal </h3>";
	$animal = new Animal("wahoo");
	$animal->walk();
	$animal->walk();
	$animal->walk();
	$animal->run();	
	$animal->run();	
	$animal->displayHealth();
	// $animal->fly();

	echo "<h3> dog </h3>";
	$dog = new Dog("Cobie");
	$dog->walk();
	$dog->walk();
	$dog->walk();
	$dog->run();	
	$dog->run();
	$dog->pet();	
	$dog->displayHealth();

	echo "<h3> Dragon </h3>";
	$dragon = new Dragon("Max");
	$dragon->walk();
	$dragon->walk();
	$dragon->walk();
	$dragon->run();
	$dragon->run();
	$dragon->fly();
	$dragon->fly();
	$dragon->displayHealth();

?>