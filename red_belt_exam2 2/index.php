<?php
	include "process.php";

	$all = new Users();	
	$users = $all->all_users();
	// // echo "<pre>";
	// // 	var_dump($users);
	// // echo "</pre>";	

	// echo "<pre>";
	// var_dump($user_info);
	// echo "</pre>";
?>	
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Red Belt Exam 2</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#select').submit(function()
			{
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(user_info)
				{
					if (user_info.user_info) {

						$('#user_info_table').html(user_info.user_info);
					}
					if (user_info.user_friend) {

						$('#friends_with_user').html(user_info.user_friend);
					}


				}, "json");
				return false;
			});
		});
	</script>
</head>
<body>

	<h3>Select User:</h3>
	List of Users: 
	
	<form id="select" method="post" action="process.php">
		<select name ="selected_id">
<?php
			foreach($users as $user)
			{
?>	
				<option value="<?php echo $user['id'] ?>"><?= $user['name'] ?></option>
<?php
			}
?>
		</select>
		<input type="submit" value="View Friends">
	</form>	
	<div id="user_info_table">

	</div>
	<div id="friends_with_user">

	</div>	






</body>
</html>