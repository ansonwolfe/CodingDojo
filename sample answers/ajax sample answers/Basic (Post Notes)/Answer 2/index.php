<?php
	// Includes the connection file.
	require_once('connection.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ajax Basic 1</title>
		<!-- INCLUDE BOOTSTRAP THEME FROM BOOTSWATCH.COM -->
		<link rel="stylesheet" href="http://bootswatch.com/journal/bootstrap.min.css">

		<!-- INCLUDE USER-DEFINED STYLESHEET -->
		<link rel="stylesheet" href="style.css">

		<!-- INCLUDE JQUERY LIBRARY FROM GOOGLE HOST -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

		<!-- JQUERY SCRIPTS -->
		<script>
			$(document).ready(function()
			{
				$("#add_note").on("submit", function()
				{
					// $(this) means the parent selector which is the $("#search_leads") form.
					// We store $(this) into the form variable because we will later inside another selector.
					var form = $(this);

					$.post(form.attr("action"), form.serialize(), function(data)
					{
						// Checks for the status variable set on the backend. If it returns TRUE, we append posts to the page.
						if(data.status)
						{
							$(data.post).appendTo("#posts").hide().fadeIn();
							form.find("textarea").val("");
						}
					}, "json");

					return false;
				});
			});
		</script>
		<!-- END OF JQUERY SCRIPTS -->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="span12">
					<fieldset id="posts">
						<legend><h1>My Posts:</h1></legend>
<?php 			// Query for retrieving all posts from the database.
				$query = "SELECT * FROM posts";

				// We use the fetch_all function to get all posts from the database in an associative array format.
				$posts = fetch_all($query);

				// We check if the $posts variable is available (This is to avoid errors when the $posts variable is empty). If it is, we do echo each post.
				if($posts)
				{
					foreach($posts as $post)
					{	?>
						<div class="well post pull-left">
							<p><?php echo $post['description']; ?></p>
						</div>
<?php 				}
				}	?>	
					</fieldset> <!-- END OF POSTS -->
				</div> <!-- END OF SPAN12 -->
			</div> <!-- END OF ROW -->
			<div class="row">
				<div class="span3">
					<fieldset>
						<legend>Add a post</legend>
						<!-- FORM FOR ADDING A NOTE -->
						<form id="add_note" action="process.php" method="post">
							<textarea name="description" placeholder="Enter your description..."></textarea>
							<input type="submit" value="Add Post" class="btn btn-success">
						</form>
						<!-- END OF FORM FOR ADDING A NOTE -->
					</fieldset>
				</div> <!-- END OF SPAN3 -->
			</div> <!-- END OF ROW -->
		</div> <!-- END OF CONTAINER -->
	</body>
</html>