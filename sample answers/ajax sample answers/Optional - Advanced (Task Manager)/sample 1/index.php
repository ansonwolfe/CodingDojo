<?php
	require_once('includes/connection.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Task Manager</title>

		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="includes/css/bootstrap.css">
		<link rel="stylesheet" href="includes/css/bootstrap-responsive.min.css">
		<!-- END OF BOOTSTRAP CSS -->

		<!-- USER DEFINED STYLESHEET/CSS -->
		<link rel="stylesheet" href="includes/css/style.css">
		<!-- END OF USER DEFINED STYLESHEET/CSS -->
		
		<!-- JQUERY FROM GOOGLE CDN -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<!-- END OF JQUERY FROM GOOGLE CDN -->

		<!-- JQUERY SCRIPTS -->
		<script>
			$(document).ready(function() 
			{
				/* Here we select an element where id is equal to "create_task"
					Then we use the .post function to:
						1. Pass data from the form to the backend (process.php)
						2. Return results from the backend in json format ("echo json_encode" -- see process.php)
						3. Display the information on the page 
				*/
				$("#create_task").on("submit", function()
				{
					// We save the selector for $(this) to a variable named "form" so that we can call it later.
					var form = $(this);

					/* Here we used the "form" variable. You might be asking... 
						Why are we going to use the "form" variable when we can use the "$(this)" selector (or the selector pointing to your form)?
						Well that's an easy question...
						First, we will use the "form" variable because we have already declared it above.
						Second, it will look much cleaner instead of using the "$(this)" (or the selector pointing to your form) function because naming convention is important. 
						Third, we need it to be in a variable in case we want to use it inside the .post function.

						NOTE: If you use $(this) selector inside the .post function, the $(this) selector will use the .post function itself.
					*/
					$.post(form.attr("action"), form.serialize(), function(data)
					{
						// Here we will check if the value of the "status" variable passed from the backend (process.php) is true or false and will execute the codes below:
						if(data.status)
						{
							// Appends the "task" variable given from the backend to the html page.
							$(data.task).appendTo($("#edit_task_form").find("fieldset")).hide().fadeIn();
						}
						// If the "status" variable is false, it will retrieve the "message" variable from the backend and then display it in an alert box.
						else
						{
							alert(data.message);
						}
					}, "json");

					return false;
				});

				$("html").on("click", "button.edit_task", function(event)
				{
					event.preventDefault();

					var edit_button = $(this);
					var form = $("#edit_task_form");
					var task_name = edit_button.siblings("span").text();
					var task_id = edit_button.siblings("input[name='task_id']").val();
					var task_checkbox = edit_button.siblings("input[type='checkbox']");

					if(edit_button.siblings("span").is(":visible"))
					{
						edit_button.siblings("span").replaceWith("<input type='text' name='tasks["+ task_id +"]' class='task_name' value='"+ task_name +"'>");
						task_checkbox.hide();
					}
					else
					{
						$.post(form.attr("action"), form.serialize(), function(data)
						{
							if(data.status)
							{
								edit_button.siblings("input.task_name").replaceWith("<span>"+ data.tasks[task_id] +"</span>");
							}
							else
							{
								edit_button.siblings("input.task_name").replaceWith("<span>"+ edit_button.siblings("input.task_name").val() +"</span>");
							}

							task_checkbox.show();
						}, "json");
					}	
				});

				$("#edit_task_form").on("click", "input[type='checkbox']", function()
				{
					var checkbox = $(this);

					if(checkbox.prop("checked") == true)
					{
						checkbox.siblings("span").addClass("muted");
					}
					else
					{
						checkbox.siblings("span").removeClass("muted");
					}
				});
			});
		</script>
		<!-- END OF JQUERY SCRIPTS -->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="span6">
					<form id="edit_task_form" action="process.php" method="post" class="form-horizontal">
						<fieldset>
							<legend>List of Tasks</legend>
							<input type="hidden" name="edit_task" value="1">
<?php 				$query = "SELECT * FROM tasks";
					$tasks = fetch_all($query);

					if($tasks)
					{
						foreach($tasks as $task)
						{	?>
							<div class="control-group">
								<button class="btn btn-mini edit_task">Edit</button>
								<input type="checkbox" name="tasks[]">
								<input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
								<span><?php echo $task['name']; ?></span>
							</div>
<?php					}
					}	?>
						</fieldset>
					</form>
				</div>
				<div class="span6">
					<!-- FORM FOR CREATING A TASK -->
					<form action="process.php" id="create_task" method="post">
						<fieldset>
							<legend>Create a new task</legend>
							<textarea name="task_name" id="task_description" rows="5"></textarea>
							<input type="hidden" name="create_task" value="1">
							<input type="submit" value="Create Task" class="btn btn-primary btn-mini">
						</fieldset>
					</form>
					<!-- END OF FORM FOR CREATING A TASK -->
				</div>
			</div>
		</div>
	</body>
</html>