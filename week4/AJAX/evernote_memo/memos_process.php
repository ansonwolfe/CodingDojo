<?php
	session_start();
	require "connection.php";

		if (isset($_POST['notes'])) {
	// escapes special characters in text area
		$memo = mysql_real_escape_string($_POST['memo_entered']);


		$query ="INSERT INTO memos (user_id, memo, created_at) VALUES ('{$_SESSION['id']}','{$memo}', NOW())";

		mysql_query($query);
		
		header('Location: memos.php?id='. $_SESSION['id']);
		exit;
	}
?>