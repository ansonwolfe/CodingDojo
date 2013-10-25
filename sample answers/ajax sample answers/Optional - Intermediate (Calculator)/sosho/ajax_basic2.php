<!DOCTYPE HTML>

<html>
	<head>
		<title>ajax_basic2</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="stylesheet" href="ajax_basic2.css" type="text/css">
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>	
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
		<script type="text/javascript">	
			$(document).ready(function(){

				$("#sum").click(function(){
					$("#hidden").attr('value', 'sum');
				});

				$("#multiply").click(function(){
					$("#hidden").attr('value', 'multiply');
				});

				$("#less_than").click(function(){
					$("#hidden").attr('value', 'less_than');
				});

				$("#greater_than").click(function(){
						$("#hidden").attr('value', 'greater_than');
				});

				$("#form_submit").submit(function(){
					$.post(
						$(this).attr('action'),
						$(this).serialize(),
						function(data){
							$("#result").html(data.answer);
							$("#result").prepend("<h2>Result</h2>")
							$("#result").append("<p>Process: " + data.process +"</p>")
						},
						"json"	
					);

					return false;
				});

			});// end of document ready
		</script>
	</head>

	<body>
		<div id="wrapper">
			<form method="post" action="ajax_basic2_process.php" id="form_submit">
				<input type="hidden" name="hidden" id="hidden" value="">
				<label for="num1">Enter a number:</label>
				<input type="text" id="num1" name="num1">
			
				<label for="num2">Another number:</label>
				<input type="text" id="num2" name="num2">
	
				<input type="submit" value="Sum" id="sum">
				<input type="submit" value="Multiply" id="multiply">
				<input type="submit" value="Less Than" id="less_than">
				<input type="submit" value="Greater Than" id="greater_than">
			</form>
		
			<div id="result"></div>
		</div><!--end of wrapper-->	
	</body>
</html>