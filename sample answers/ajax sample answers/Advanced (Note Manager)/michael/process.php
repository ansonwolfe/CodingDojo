<?php

require('connection.php');

$data = array();

if(isset($_POST['action']) AND $_POST['action'] == "create_note")
{
	$query = "INSERT INTO notes (title, created_at) VALUES ('{$_POST['title']}', NOW()) ";
	mysql_query($query);
}
else if(isset($_POST['action']) AND $_POST['action'] == "update_note" AND isset($_POST['id']) AND isset($_POST['description']))
{
	$query = "UPDATE notes SET description = '{$_POST['description']}' WHERE id = {$_POST['id']}";
	mysql_query($query);
}
else if(isset($_POST['action']) AND $_POST['action'] == "delete_note" AND isset($_POST['id']))
{
	$query = "DELETE FROM notes WHERE id = {$_POST['id']}";
	mysql_query($query);
}

echo json_encode($data);

//end of file