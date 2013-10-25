<?php
	include ('header.php');

	// query to pull all messages with users
	$messages = fetch_all("SELECT messages.id AS message_id, message, user_id, username, first_name, last_name , messages.created_at, messages.updated_at FROM messages LEFT JOIN users ON user_id = users.id ORDER BY messages.created_at DESC;");


	if(!isset($_SESSION['logged_in']))
	{
		header("Location: index.php");
	}

?>
<!-- header -->
	<div class = "span12">
		<div class="page-header">
	  		 <form action="registration.php" method="post">
	  			<input type="submit" value ="Log Out" name="logout" class="btn btn-info pull-right" >
	  		</form>
	  		<h1>Dog Wall <small>Welcome <?php echo $_SESSION['username']; ?>!</small></h1>
	  	</div>
	 
<!-- message body -->
		<div class="span8 offset2">
			<!-- original message post -->
			<div id="post_message">
				<h3>Post a message</h3>
				<form action="wall_process.php" method="post">
					<input type="hidden" name="user_text" value="user_text">
					<textarea name="user_message_text" class="span8" id="message_textarea"></textarea>
					<br/>
					<input type="submit" value="Post a message" class="btn btn-primary">
				</form>

<?php 			foreach ($messages as $message) { 
?>
				<div id="messages">	
						<h5><?= $message['username'] ?> <small><?= $message['created_at']?></small></h5>
						<p>
							<?= $message['message']?>
						</p>
				</div>			
				<!-- comments  -->
<?php			$query = "SELECT comments.*, users.username  FROM comments 
							LEFT JOIN users ON comments.user_id = users.id 
							WHERE message_id = " . $message['message_id'];
				$comments = fetch_all($query);

				foreach ($comments as $comment) { 

?>
				<div id="comments" class="offset2">	
						<h5><?= $comment['username']?> <small><?= $comment['created_at']?> 			
							</small></h5>
						<p>
							 <?= $comment_id = $comment['comment'];?>

			 	<!-- delete button visible only to user who created comment -->
					<?php if ($_GET['id'] === $comment['user_id']) {
							echo "<form id='delete' action='wall_process.php' method='post'>";
							echo "<input type='hidden' name='delete_button' value='" . $comment['id'] . "'>";
							echo "<input id ='delete_text' class='pull-right' type='submit' value ='delete'>
							</form>";
						}?>
						</p>
						<br />
				</div>
<?php }?>
				<div id="post_comments" class="offset2">
					<h6>Post a comment</h6>

					<form action="wall_process.php" method="post">
						<input type="hidden" name="user_comment" value="<?= $message['message_id']?>">
						<textarea name="user_comment_text" class="span6"></textarea>
						<br/>
						<input type="submit" value="Post a comment" class="btn btn-success pull-right">
					</form>
				</div>		
<?php							
			}	
?>					
			</div>
		</div>
	</div>
</body>
</html>
