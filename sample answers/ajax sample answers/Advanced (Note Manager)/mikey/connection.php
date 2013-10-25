<?php
	// Initialize session variables
	session_start();

	// Connect to MySQL Database using mysql_connect() function or return an error if connection was unsuccessful.
	$connect = mysql_connect('localhost', 'root', '') or die ("Unable to connect to your database. Make sure your database settings are correct.");

	// Select Database name or return an error if database was not found.
	$select_db = mysql_select_db('ajax_advanced') or die("Couldn't find your database.");

	// Functions:
	//
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