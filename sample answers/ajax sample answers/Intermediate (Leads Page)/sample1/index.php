<?php
	// Includes the connection.php that will be used to connect to the database.
	// Now we can do queries in this page and use functions inside the connection.php
	require_once('connection.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Leads Ajax example</title>
		<!-- BOOTSTRAP THEME FROM BOOTSWATCH.COM -->
		<link rel="stylesheet" href="http://bootswatch.com/superhero/bootstrap.min.css">

		<!-- JQUERY UI (FOR DATEPICKER) -->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">

		<!-- USER-DEFINED STYLESHEET -->
		<link rel="stylesheet" href="style.css">

		<!-- JQUERY AND JQUERY UI -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
		
		<!-- JQUERY SCRIPTS -->
		<script>
			$(document).ready(function()
			{
				// Use the JQuery UI datepicker for all elements that have a class "datepicker"
				$(".datepicker").datepicker({
					// We use a MySQL database-friendly date format
					dateFormat: 'yy-mm-dd'
				});

				// Everytime a user types on the search field, the form for searching the leads is submitted.
				$("#name").on("keyup", function()
				{
					$("#search_leads").submit();

					// Refreshes the results page number to 1.
					$("#page_number").val(1);
				});

				// Everytime the date fields change, the form for searching the leads is submitted. 
				$("#date_from, #date_to").change(function()
				{
					$("#search_leads").submit();

					// Refreshes the results page number to 1.
					$("#page_number").val(1);
				});

				// Process of the #search_leads form.
				$("#search_leads").on("submit", function()
				{
					// $(this) means the parent selector which is the $("#search_leads") form.
					// We store $(this) into the form variable because we will later inside another selector.
					var form = $(this);

					$.post(form.attr("action"), form.serialize(), function(data)
					{
						// Displays the search results.
						$("#leads").html(data.leads);

						// Finds any element containing a class "pagination" and removes it before appending a new one.
						form.find(".pagination").remove();

						// Appends the pagination.
						form.append(data.pagination);
					}, "json");

					// This is usually forgotten when using submitting a form via Ajax. This is prevents the page to be refreshed when the form is submitted.
					return false;
				});

				// Inside the (document) or the web page, we select all links that have a "page" class.
				// This kind of .on function is usually used for several and/or appended elements via JQuery.
				$(document).on("click", "a.page", function(event)
				{
					event.preventDefault();
					var form = $("#search_leads");

					form.find("#page_number").val($(this).text());
					form.submit();
				});
			});
		</script>
		<!-- END OF JQUERY SCRIPTS -->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="span12">
					<!-- FORM FOR SEARCHING LEADS -->
					<form id="search_leads" action="process.php" class="form-inline">
						<div class="pull-left">
							<label for="name">Name:</label>
							<input type="text" name="name" id="name">
						</div>
						<div class="pull-right">
							<label for="date_from">From:</label>
							<input type="text" name="date_from" id="date_from" class="datepicker">
							<label for="date_to">To:</label>
							<input type="text" name="date_to" id="date_to" class="datepicker">
						</div>
						<input type="hidden" id="page_number" name="page_number" value="1">
						<div class="clearfix"></div>
					</form>
					<!-- END OF FORM FOR SEARCHING LEADS -->
				</div> <!-- END OF SPAN12 -->
			</div> <!-- END OF ROW -->
			<div class="row">
				<!-- THIS IS WHERE THE RESULTS ARE GOING TO BE APPENDED -->
				<div id="leads" class="span12">
				</div>
			</div> <!-- END OF ROW -->
		</div> <!-- END OF CONTAINER -->
	</body>
</html>