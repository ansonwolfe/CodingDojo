<?php
	require_once('connection.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>My Posts</title>
	<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type ="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type = text/javascript>
		$(document).ready(function(){
			
			//add new note
			$("#add_note").submit(function(){
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(data){
					if(data.status)
					{
						$("#posts p").remove();
						$("#validation").html(data.success_message);
						$("#posts table tbody tr").append(data.note_description);
					}
					else
					{
						$("#validation").html(data.error_message);
					}
				}, "json");
				return false;
			});
			
			//get all notes
			function get_all_post(){ 
				$.post('process.php', { get_all_post: true }, function(data){
					if(data.status)
					{
						$("#posts table tbody tr").append(data.notes);
					}
					else
					{
						$("#posts").append(data.error_message);
					}
				}, "json");
				return false;
			}
			
			//trigger get all notes
			get_all_post();
		});
	
	</script>

</head>
<body>
	<div id="wrapper">
		<h2>My Notes</h2>
		<div id = "posts">
			<table>
				<tbody>
					<tr>
					<!-- notes will be append here -->
					</tr>
				</tbody>
			</table>
		</div>
		<div>
			<h4>Add a note:</h4>
			<data id="validation"></data>
			<form id="add_note" action="process.php" method = "post">	
				<textarea name = "new_note" class = "span6" rows = "3" ></textarea>
				<input type = "submit" value = "Post It!">
			</form>
		</div>
	</div>
</body>
</html>