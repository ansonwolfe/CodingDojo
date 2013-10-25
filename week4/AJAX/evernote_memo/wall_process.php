<?php

	session_start();
	require 'connection.php';
// inserting message
	if (isset($_POST['user_text'])) {
		$message = mysql_real_escape_string($_POST['user_message_text']);
		$query ="INSERT INTO messages (user_id, message, created_at) VALUES ('{$_SESSION['id']}','{$message}', NOW())";
		mysql_query($query);
		
		header('Location: wall.php?id='. $_SESSION['id']);
		exit;
	}
// inserting comments
	if (isset($_POST['user_comment'])) {
	$query ="INSERT INTO comments (user_id, message_id, comment, created_at) VALUES ('{$_SESSION['id']}','{$_POST['user_comment']}', '{$_POST['user_comment_text']}', NOW())";
	mysql_query($query);

	header('Location: wall.php?id='. $_SESSION['id']);
	exit;
	}
// delete button
   	if(isset($_POST['delete_button'])){
    	   $id = $_POST['delete_button']; 
     
    $query = "DELETE FROM comments WHERE id='{$_POST['delete_button']}'"; 
	mysql_query($query); 
	header('Location: wall.php?id='. $_SESSION['id']);
	exit;
	}
?>