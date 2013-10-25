<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Calculator</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<script type="text/javascript">
		$(document).ready(function (){
			//submits the calculator form and get result
			$("#calculator").submit(function (){
				form = $(this);

				$.post(form.attr("action"), form.serialize(), function (data){
					$("#result").html("<h1>" + data.result + "</h1>" + "Process: " + data.operation)
				}, 'json');

				return false;
			});

			//get the operation and trigger submission
			$("button.action").click(function (){
				var operation = $(this).attr("id");
				$("#operation").val(operation);
				$(this).parent().submit();
			});
		});
	</script>
</head>
<body>
	<form id="calculator" action="process.php" method="post">
		<label for="">Enter a number</label>
		<input type="text" name="first_number">
		<label for="">Enter another number</label>
		<input type="text" name="second_number">
		<input type="hidden" name="operation"  value="" id="operation">
		<button type="button" class="action" id="sum">Sum</button>
		<button type="button" class="action" id="multiply">Multiply</button>
		<button type="button" class="action" id="is_greater_than">></button>
		<button type="button" class="action" id="is_lesser_than"><</button>
	</form>
	<fieldset>
		<legend>Result</legend>
		<div id="result"></div>
	</fieldset>
</body>
</html>