<?php
	session_start();

	require("connection.php");

	if(!isset($_SESSION['logged_in']))
	{
		header("Location: index.php");
	}
?>

<style type="text/css">
h5.comment{
	margin-left:15px;
}
p.comment{
	margin-left:20px;
	font-size:10px;
	border:1px solid green;
}

</style>

Welcome <?= $_SESSION['user']['first_name'] ." " . $_SESSION['user']['last_name'] ?>!

<a href="process.php">Log Off</a>


<h2>Post a message</h2>
<form action="wall_process.php" method="post">
	<input type="hidden" name="action" value="create_message" />
	<textarea name="message"></textarea>
	<input type="submit" value="Post a message" />
</form>

<?php
	$query = "
	SELECT messages.*, users.first_name, users.last_name
	FROM messages
	LEFT JOIN users ON users.id = messages.user_id
	ORDER BY id DESC
	";
	$messages = fetch_all($query);

	foreach($messages as $message)
	{
?>

<h3><?= $message['first_name'] ?> <?= $message['last_name'] ?> - <?= $message['created_at'] ?></h3>
<p><?= $message['message'] ?> </p>

<?php
		$query = "
			SELECT comments.*, users.first_name, users.last_name FROM comments 
				LEFT JOIN users ON users.id = comments.user_id
				WHERE message_id = " . $message['id'];
		$comments = fetch_all($query);
		echo $comments['created_at']
		foreach($comments as $comment)
		{?>

			<h5 class="comment"> <?= $comment['first_name'] ?> <?= $comment['last_name'] ?> - <?= $comment['created_at'] ?></h5>
			<p class="comment"> <?= $comment['comment'] ?> </p>
<?php	}
?>

	<form action="wall_process.php" method="post">
		<input type="hidden" name="message_id" value="<?= $message['id'] ?>" />
		<input type="hidden" name="action" value="create_comment" />
		<textarea name="comment"></textarea>
		<input type="submit" value="Post a comment" />
	</form>
<?php
	}
?>