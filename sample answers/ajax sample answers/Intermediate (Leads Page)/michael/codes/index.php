<?php
	require("connection.php");
?>

<html>
<head>
	<title>Ajax - lead example</title>
	<link media="all" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.date').datepicker();
		$('.date').change(function(){
			$('#test_form').submit();
		})

		$('#search_text').keyup(function(){
			$('#page').val(1);
			$('#test_form').submit();
		});

		$('#test_form').submit(function(){
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					$('#results').html(data.html);

					$('ul.page_link li a').click(function(){
						$('#page').val($(this).html());
						$('#test_form').submit();
						return false;
					})
				},
				"json"
			);
			return false;
		});

		$('#test_form').submit();

	});
	</script>

	<style type="text/css">

	ul.page_link li{
		list-style:none;
		display:inline;
		font-size:11px;
		margin-left:5px;
	}

	ul.page_link {
		text-align: right;
	}

	</style>
</head>
<body>

	<form id="test_form" action="process.php" method="post">
		Name: <input id="search_text" type="text" name="name" />
		From: <input class="date" type="text" name="from_date" />
		To: <input class="date" type="text" name="to_date" />
		<input type="hidden" id="page" name="page" value="1" />
		<input type="submit" value="Submit" />
	</form>

	<div id="results"></div>
</body>
</html>