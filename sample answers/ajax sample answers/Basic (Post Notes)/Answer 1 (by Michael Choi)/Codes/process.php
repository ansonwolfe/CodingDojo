<?php

include("connection.php");

$data = array();

if(isset($_POST['note']))
{
	$query = "INSERT INTO notes (note, created_at) VALUES ('{$_POST['note']}', NOW())";
	mysql_query($query);
	// $data['query'] = $query;
	$status = "success";
}
else
{
	$status = "failed";
}



$data['status'] = $status;
echo json_encode($data);

?>