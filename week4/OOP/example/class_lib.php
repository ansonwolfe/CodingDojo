<?php 
class person { 
 	var $persons_name; 

		 function __construct($persons_name) { 
		$this->name = $persons_name; 
		} 

		function set_name($persons_name) { 
		 $this->name = $persons_name; 
		 }
		 
		 function get_name($persons_name) { 
		 return $this->name; 
		 } 
}
?>
