 <?php
 	require ('connection.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AJAX - lead example</title>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/cupertino/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		 $('.date').datepicker();
		 // event listener to hear when key is entered & submit
		 $('#key_up').keyup(function(){
		 	$('#page').val(1);
		 	$('#test_form').submit();
		 })

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
		 	return false
		 });
		 // submits form on page load so list is visible on load
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
		Name:  <input id="key_up" type="text" name="name" />
		From:  <input class="date" type="text" name="from_date" />
		To:  <input class="date" type="text" name="to_date" />
		<input type="submit" value="Submit" />
		<input type="hidden" id="page" name="page" value="1" />
	</form>	

	<div id="results">
		
	</div>
	
	
</body>
</html>