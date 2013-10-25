<?php
	require('connection.php');
?>

<html>
<head>
	<title>Advanced Ajax</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	
	<script type="text/javascript">

	function displayNotes()
	{
		$.post(
			"display_notes.php",
			function(data){
				$('#notes').html(data);

				//since the new html tags may not have the eventListeners attached, attach the eventListerns
				attachEventListners();
			}
		);
	}

	function attachEventListners()
	{
		//add a submit event listner for .update_note forms
		$('.update_note').submit(function(){
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					displayNotes();
				},
				"json"
			);
			return false;
		});
	}
	
	$(document).ready(function(){
		displayNotes();
	});
	</script>
</head>
<body>


	<h1>Notes</h1>

	<div id="notes"></div>

</body>
</html>