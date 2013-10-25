<?php

session_start();


require("connection.php");

if(isset($_POST['action']) and $_POST['action'] == 'create_message')
{
	$query = "INSERT INTO messages (user_id, message, created_at) VALUES ({$_SESSION['user']['id']}, '{$_POST['message']}', NOW())";
	mysql_query($query);
	// echo $query;
	header("Location: index.php");
}
else if(isset($_POST['action']) and $_POST['action'] == 'create_comment')
{
	$query = "INSERT INTO comments (user_id, comment, message_id, created_at) VALUES ({$_SESSION['user']['id']}, '{$_POST['comment']}', '{$_POST['message_id']}', NOW())";
	mysql_query($query);
	header("Location: index.php");
}
?>

