<?php
	// Initialize session variables
	session_start();

	$connect = mysql_connect('localhost', 'root', '1422');
	
	if(!$connect)
	{
		die("Unable to connect to your database. Make sure your database settings are correct. " . mysql_error());
	}
	else
	{
		mysql_select_db('ajax_optional');
	}

	// Functions
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

	function fetch_record($query)
	{
		$result = mysql_query($query);

		if(mysql_num_rows($result) > 0)
		{
			return mysql_fetch_assoc($result);
		}
		else
		{
			return FALSE;
		}
	}

	function update_task($query)
	{
		mysql_query($query);

		if(mysql_affected_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
?>