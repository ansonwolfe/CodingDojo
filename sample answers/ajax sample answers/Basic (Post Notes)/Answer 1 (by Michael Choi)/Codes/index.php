<?php
	include("connection.php");

	$query = "SELECT * FROM notes";
	$notes = fetch_all($query);
?>

<html>
<head>
	<title>My Posts</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$('#test_form').submit(function(){
			var note = $('#note').val();
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					if(data.status == 'success')
					{
						$('#notes').append("<div class='note'>"+note+"</div>");
					}
				},
				"json"
				);
			return false;
		});

	});

</script>

</head>

<body>

<h1>My Posts</h1>

<div id="notes">
<?php
	foreach($notes as $note){
?>
	<div class="note">
		<?= $note['note'] ?>
	</div>
<?php
	}
?>
</div>

<h2>Add a note</h2>
<form id="test_form" action="process.php" method="post">
	<textarea id="note" name="note"></textarea>
	<input type="submit" value="Post It" />
</form>

</body>
</html>