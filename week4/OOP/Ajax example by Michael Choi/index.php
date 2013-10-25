<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax example</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script type="text/javascript">

	function attachEventListenerForTheCommentForm(){
		//attach an event listner to the .comment_form 
		$('form.comment_form').submit(function(){
							
			form = $(this);
			
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(cobie){
					if(cobie.error)
					{
						$(form).parent().children('.comments').html(cobie.error);
					}
				},
				"json"
			);

			return false;
		});

		//remove the class .comment_form so that the event listener doesn't keep getting added
		$('form.comment_form').removeClass('comment_form');
	}

	$(document).ready(function(){
		$('form').submit(function(){
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(cobie){
					if(cobie.errors)
					{
						$('#error').html(cobie.errors);
					}
					else
					{
						$('#notes').append(cobie.html);
						attachEventListenerForTheCommentForm();
					}
					console.log(cobie);
				},
				"json"
			);
			return false;
		});
	});
	</script>

</head>
<body>

	<div id="notes">
		
	</div>	

	<h1>Create a new note</h1>
	<div id="error"></div>

	<form action="process.php" method="post">
		<input type="hidden" name="action" value="create_note" />
		<input type="text" name="title" placeholder="Title" /><br />
		<textarea name="note"></textarea>
		<input type="submit" value="Post" />
	</form>
	
</body>
</html>