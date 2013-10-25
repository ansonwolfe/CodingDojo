<?php
	// $shops = array(
	// 	array("rose", 1.25, 15),
	// 	array("daisy", 1.25, 15),
	// 	array("orchid", 1.25, 15),
	// 	);

 // 	echo $shops[1][2]; 


	// for($i=0; $i<3; $i++) 
	// { 
	// 	echo "<br /> Row $i: " . $i . '<br />';
	   
	//    for($j=0; $j<5; $j++) 
	//    	{ 
	//       echo $i . '-' . $j .', '; 
	//   	 } 
	// } 


	$users = array( 
	   array("first_name" => "Michael", "last_name" => "Choi"), 
	   array("first_name" => "John", "last_name" => "Supsupin"), 
	   array("first_name" => "Mark", "Last_name" => "Guillen") 
	); 

	foreach($users as $user) //fetch a new row in $users and store that in $user
	{ 
	   foreach($user as $key=>$value) //go through each key/value pair for $user   { 
	     echo $key . " : " . $value ."<br />"; 
	    
	} 

	// please make sure you understand how above example works. You'll be using a lot of foreach statements in building your web applications.
?>