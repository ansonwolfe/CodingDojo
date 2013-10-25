<?php
	// Includes connection.php so we can interact with the database within this page.
	require_once('connection.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ajax Advanced</title>
		<!-- BOOTSTRAP THEME FROM BOOTSWATCH.COM -->
		<link rel="stylesheet" href="http://bootswatch.com/cosmo/bootstrap.min.css">

		<!-- USER-DEFINED STYLESHEET -->
		<link rel="stylesheet" href="style.css">

		<!-- INCLUDE JQUERY LIBRARY FROM GOOGLE HOST -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		
		<!-- JQUERY SCRIPTS -->
		<script>
			$(document).ready(function()
			{
				// Form for adding a note
				$("#add_note").on("submit", function()
				{
					var form = $(this);

					$.post(form.attr("action"), form.serialize(), function(data)
					{
						if(data.status)
						{
							$(data.note).appendTo("#notes").hide().fadeIn();
							form.find("input[type='text']").val("");
						}
						else
						{
							alert(data.message);
						}
					}, "json");

					return false;
				});

				$("#notes").on("submit", "form.edit_note", function()
				{
					var form = $(this);
					var note_description = form.find("textarea").val();

					$.post(form.attr("action"), form.serialize(), function(data)
					{
						form.find("textarea").parent().remove();
						form.find("input[type='submit']").remove();

						form.prepend(data.note);

						if(data.status)
						{
							form.find(".note_description p").text(data.note_description);
						}
						else
						{
							form.find(".note_description p").text(note_description);
						}
					}, "json");

					return false;
				});

				$("#notes").on("click", "button.edit_description", function(event)
				{
					var edit_button = $(this);
					var form = edit_button.closest("form");
					var note_id = form.find("input[name='note_id']").val();
					var edit_form = "<div class='control-group'>\n"+
										"<textarea name='description' placeholder='Please enter your description...'>"+ form.find(".note_description p").text() +"</textarea>\n"+
									"</div>\n"+
									"<input type='submit' value='Save' class='btn btn-success btn-mini'>";

					form.find(".note_description").replaceWith(edit_form);

					event.preventDefault();
				});

				$("#notes").on("click", ".delete_note button", function(event)
				{
					var form = $(this).parent();

					$.post(form.attr("action"), form.serialize(), function(data)
					{
						if(data.status)
						{
							form.closest(".row-fluid").fadeOut();
						}
						else
						{
							alert(data.message);
						}
					}, "json");
					
					event.preventDefault();
				});
			});
		</script>
		<!-- END OF JQUERY SCRIPTS -->
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="well">
						<h1>Notes</h1>
					</div>
				</div>
			</div>
			<div id="notes">
<?php	$query = "SELECT * FROM notes";
		$notes = fetch_all($query);

		if($notes)
		{
			foreach($notes as $note)
			{	?>
				<div class="row-fluid">
					<div class="offset3 span6 offset3 well">
						<h3 class="pull-left"><?php echo $note['title']; ?></h3>
						<form class="delete_note" action="process.php" method="post">
							<button class="btn btn-link pull-right">delete</button>
							<input type="hidden" name="action" value="delete">
							<input type="hidden" name="note_id" value="<?php echo $note['id']; ?>">
						</form>
						<div class="clearfix"></div>
						<form action="process.php" method="post" class="edit_note form-horizontal">
<?php 					if($note['description'] != NULL)
						{	?>
							<div class="note_description">
								<p><?php echo $note['description']; ?></p>
								<button class="btn btn-mini btn-success edit_description">Edit</button>
							</div>
<?php 					}
						else
						{	?>
							<div class="control-group">
								<textarea name="description" placeholder="Please enter your description..."></textarea>
							</div>
							<input type="submit" value="Save" class="btn btn-success btn-mini">
<?php 					}	?>						
							<input type="hidden" name="note_id" value="<?php echo $note['id']; ?>">
						</form>
					</div>
				</div>
<?php 		}
		}	?>
			</div>
			<div class="row-fluid">
				<div class="offset3 span6 offset3">
					<form id="add_note" action="process.php" method="post" class="form-horizontal">
						<div class="control-group">
							<input type="text" name="title">
						</div>
						<input type="submit" value="Add note" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>