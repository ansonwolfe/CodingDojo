<?php
	//session_start();
	include "friends_class.php";

	$friends = new Friends();
	$users = $friends->all_users();
	$my_friends = $friends->my_friends();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Friend Finder</title>
	<style type="text/css">
		table {
			border: 1px solid silver;
			margin: 10px;
			border-collapse: collapse;
		}
		table td {
			border: 1px solid silver;
			padding: 5px 15px;

		}
	</style>
</head>
<body>

	<h3>Welcome <?= $_SESSION['user']['first_name']?> !</h3>
	<?= $_SESSION['user']['email']?>

	<form method="post" action="process.php">
		<input type="hidden" name="action" value="logout">
		<input type="submit" value="Log Out">
	</form>


	<h2>List of Friends</h2>
	<div id="list_of_friends">
		<table>
			<thead>
				<tr>
					<td>Name</td>
					<td>Email</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($my_friends as $my_friend) {
						echo "<tr>
								<td>" . $my_friend['first_name'] . " " . $my_friend['last_name'] . "</td>
								<td>" . $my_friend['email'] . "</td>
						  	</tr>";
					} ?>
			</tbody>
		</table>		
	</div>
	<h2>List of Users who subscribed to FriendFinder</h2>
	<div id="list_of_subscribers">
		<table>
			<thead>
				<tr>
					<td>Name</td>
					<td>Email</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($users as $user) {
						echo "<tr>
								<td>" . $user['first_name'] ."</td> 								
								<td>" . $user['email'] . "</td> 
								<td>";
			// checking if friend, if not, add button (there's an easier to do this. Check Carol's!)
						$is_friend = FALSE;
						foreach ($my_friends as $my_friend) {
							if 	($user['id'] == $my_friend['friend_id'])
							{
								$is_friend = TRUE;
							}
						}
						if($is_friend)
						{
							echo "Friend already.";
						}
						else
						{
							echo	"<form action='friends_class.php' method='post'>
										<input type='hidden' name='friend_id' value=" . $user['id'] . ">
										<input type='submit' value='Add Friend'>
									</form>";
						}

						echo "</td>										
						  	</tr>";
					}
				?>
			</tbody>	
		</table>
	<div>	
</body>
</html>