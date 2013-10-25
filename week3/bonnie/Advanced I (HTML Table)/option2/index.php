<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Advanced I</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<?php
	/* This example shows that $users array contains 14 arrays separated by commas.
	* Each array holds two items (first_name and last_name) and you can access each data
	* that each of the array hold by using a foreach within a foreach loop:
	* foreach ($users as $user) {
	*		foreach ($user as $value) {
	*			echo $value;
	*		}
	* }
	* where in $value are the items inside first_name and last_name column e.g: Michael Choi
	*/
	$users = array
	( 
	   array('first_name' => 'Michael', 'last_name' => 'Choi'),
	   array('first_name' => 'John', 'last_name' => 'Supsupin'),
	   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
	   array('first_name' => 'KB', 'last_name' => 'Tonel'),
	   array('first_name' => 'Oliver', 'last_name' => 'Rosales'),
	   array('first_name' => 'Holly', 'last_name' => 'Sewell'),
	   array('first_name' => 'Dilys', 'last_name' => 'Sun'),
	   array('first_name' => 'Ignacio', 'last_name' => 'Rovirosa'),
	   array('first_name' => 'Eylem', 'last_name' => 'Ozaslan'),
	   array('first_name' => 'Kristine', 'last_name' => 'Tonel'),
	   array('first_name' => 'Daniel', 'last_name' => 'Urman'),
	   array('first_name' => 'Benjamin', 'last_name' => 'Jones'),
	   array('first_name' => 'Angie', 'last_name' => 'Ranguel'),
	   array('first_name' => 'Charles', 'last_name' => 'Holloman'), 
	); ?>

	<?php

	/* Here we created a function called draw_user_table and passed in the $users array
	* as a paramenter
	*/
	function draw_user_table($users)
	{

		/* This first loop (for loop) will be responsible for eachoing out each row in our
		* multidimentional array. here we created a for loop that loops through the number  
		* of users in the $users array. remember that in our $users array we have 
		* 14 rows of arrays, so the count($users) will return a value 14, thus making 
		* it loop 14 times. 
		*/
		for($rows = 0; $rows < count($users); $rows++)
		{
			/* here we have a condition. if ($rows + 1) divided by 5 returns an int, then echo
			* out a <tr> tag with a class of 'highlited'. if it returns a decimal result (which is
			* a float data type, then echo a standard <tr> tag.) This condition simply checks
			* whether the row is divisible by 5, if it is then highlight that specific row.
			* if not then just give it a normal <tr> tag. (notice we didn't close the <tr>
			* tag yet.)
			*/
			if(is_int(($rows + 1) / 5))
			{
				echo "<tr class='highlighted'>";
			}
			else
				echo "<tr>";

			/* Here we have another for loop which is responsible for echoing out each data
			* from our row. e.g: first name, last name. The reason why we set the loop
			* condition to $columns < 7 is because we have 6 columns: User ID, first_name,
			* last_name, full_name, UPPERCASE full_name, and COUNT fullname.
			*/
			for($columns = 0; $columns < 7; $columns++)
			{

				/* we set conditions to check each columns and display the appropriate data
				* for each columns such as ID, first_name, etc.
				*/
				if($columns == 1)
				{
					// This is where we echo the ID inside a <td> tag.
					echo "<td>" . ($rows + 1) . "</td>";
				}
				elseif($columns == 2)
				{
					/* This is where we echo the first_name. $users[$rows]['firs_name'] can be
					* written as: $users[0]['first_name'] and will echo out 'Michael'. 
					* since we are in the for loop, [0] will be incremented up until we 
					* reach the value of count($users). Thus, making us iterate through the
					* items of our $users array.
					*/
					echo "<td>" . $users[$rows]["first_name"] . "</td>";
				}
				elseif($columns == 3)
				{
					/* This is where we echo the last_name. $users[$rows]['last_name'] can be
					* written as: $users[0]['last_name'] and will echo out 'Choi'. 
					* since we are in the for loop, [0] will be incremented up until we 
					* reach the value of count($users). Thus, making us iterate through the
					* items of our $users array.
					*/
					echo "<td>" . $users[$rows]["last_name"] . "</td>";
				}
				elseif($columns == 4)
				{
					/* We are just simply concatenating the first_name and last_name here */
					echo "<td>" . $users[$rows]["first_name"] . " " . $users[$rows]["last_name"] . "</td>";
				}
				elseif($columns == 5)
				{
					/* We are just simply concatenating the first_name and last_name here 
					* and at the same time convert the concatenated strings in to UPPERCASE
					*/
					echo "<td>" . strtoupper($users[$rows]["first_name"] . " " . $users[$rows]["last_name"]) . "</td>";
				}
				elseif($columns == 6)
				{
					/* Here we use the strlen function, which just basically counts the string's length. we use
					* the trim function to remove white space in our concatenated first_name and last_name
					*/
					echo "<td>" . trim(strlen($users[$rows]["first_name"] . $users[$rows]["last_name"])) . "</td>";
				}
			}
			/* Now we close our </tr> tag so that on the next loop, the information/data will
			* be displayed on the next row.
			*/
			echo "</tr>";
		}
	}
	?>
	<table>
		<thead>
			<th>User #</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Full Name</th>
			<th>Full Name in upper case</th>
			<th>Length of name</th>
		</thead>
		<tbody>
			<!-- we need to call the function so that it will be executed. -->
			<?php draw_user_table($users); ?>
		</tbody>
	</table>
</body>
</html>