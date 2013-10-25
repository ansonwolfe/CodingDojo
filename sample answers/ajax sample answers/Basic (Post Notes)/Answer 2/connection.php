<?php
	// Initialize session variables ($_SESSION)
	session_start();

	// Connect to MySQL server. If connection was unsuccessful, it will return an error.
	// The die() function prints a message and exits (discontinues exection of codes) the current script.
	$connect = mysql_connect('localhost', 'root', '') or die("Unable to connect to your database. Make sure your database settings are correct.");

	// If the above code works (If connection to the MySQL database was successful), This code will now select a database from the MySQL server and will return an error if unsuccessful.
	$select_database = mysql_select_db('ajax_basic') or die("Unknown datbase name");

	// Function to fetch several records from the database.
	function fetch_all($query)
	{
		$result = mysql_query($query);
		$data = array();

		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_assoc($result))
			{
				$data[] = $row;
			}

			return $data;
		}
		else
		{
			return FALSE;
		}
	}
?>