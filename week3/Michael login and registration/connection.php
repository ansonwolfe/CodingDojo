<?php

$link = mysql_connect('localhost', 'root', 'root');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("test_db");

function fetchRecords($query){
	$data = array();
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result))
	{
		$data[] = $row;
	}
	return $data;
}


?>