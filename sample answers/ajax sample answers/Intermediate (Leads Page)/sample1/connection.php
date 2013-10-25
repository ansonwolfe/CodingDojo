<?php
	// Used constants to be used for database connection.
	define('DB_HOSTNAME', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'lead_gen_business');

	// Connects to database with the constants we've declared above.
	$connect = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD) r die("Could not connect to your database. Please check your database settings. ". mysql_error());\

	// Selects a database to be used. Again, here we used the constant "DB_NAME" that we have declared above.
	$select_db = mysql_select_db(DB_NAME) or die("Couldn't find database named ". "'". DB_NAME . "'");

	// FUNCTIONS:
	//
	// This function gets all the records from the database. It takes 1 parameter --> the query to be sent to the databse.
	function fetch_all($query)
	{
		// Here we run the query and stored it in the $result variable. While we're storing it, the mysql_query() function is already running.
		$result = mysql_query($query);
		
		// Sets a $data array. This will be storage of all the records that we have retrieved from the database.
		$data = array();

		// Counts rows returned from the query. If it's greater than zero we then store those records into the $data array. 
		if(mysql_num_rows($result) > 0)
		{
			// Using a while loop to store records to the $data array.
			// Logic: While there is a result found, store it to the $data array.
			while($row = mysql_fetch_assoc($result))
			{
				$data[] = $row;
			}

			// We now return the $data array containing the record(s) we have retrieved.
			return $data;
		}
		// Function will return false if there were no records found.
		else
		{
			return FALSE;
		}
	}
?>