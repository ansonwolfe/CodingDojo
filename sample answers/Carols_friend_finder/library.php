<?php 
include("connection.php");

class Process
{
	var $connection;
	public function __construct(){
		$this->connection = new Database();
	}
}
	
$process = new Process();


Class Table extends Process
{
	// var $connection;
	// public function __construct(){
	// 	$this->connection = new Database();
	// }

	function friendsTable()
	{
		$users=array();
		$query = "SELECT CONCAT (users.first_name, ' ', users.last_name) AS name, users.email AS email FROM users LEFT JOIN friends ON friends.friend_id = users.id WHERE friends.user_id = {$_SESSION['user']['id']}";
		$users = $this->connection->fetch_all($query);	
		$html = "<table id='friendstable' class='tablesorter'> 
				<thead> 
					<tr> 
					    <th>Name</th> 
					    <th>E-mail</th> 
					</tr> 
				</thead> 
				<tbody>";
		if(!(count($users))>0)
		{
			$html=$html . "<tr><td>None</td><td> </td></tr>";
		}
		else
		{
			foreach($users as $friend)
		{
			$html=$html . "<tr><td>" . $friend['name'] . "</td><td>" . $friend['email'] . "</td></tr>";
		}

		}
		$html=$html . "</tbody>
			</table>";
		echo $html;
	}

	function usersTable()
	{
		$users=array();
		$query = "SELECT users.id, CONCAT (users.first_name, ' ', users.last_name) AS name, users.email AS email FROM users WHERE users.id <> {$_SESSION['user']['id']}";
		$users = $this->connection->fetch_all($query);	
		$html = "<table id='userstable' class='tablesorter'> 
				<thead> 
					<tr> 
					    <th>Name</th> 
					    <th>E-mail</th>
					    <th>Action</th>
					</tr> 
				</thead> 
				<tbody>";
		foreach($users as $user)
		{
			$query="SELECT friends.user_id, friends.friend_id FROM friends WHERE ((friends.user_id={$_SESSION['user']['id']}) && (friends.friend_id={$user['id']}))";
			$check=$this->connection->fetch_all($query);
			if(count($check)>0)
			{
				$html=$html . "<tr><td>" . $user['name'] . "</td><td>" . $user['email'] . "</td><td> Friends </td></tr>";
			}
			else
			{
				$html=$html . "<tr><td>" . $user['name'] . "</td><td>" . $user['email'] . "</td><td>
				<form id = 'friending' action='library.php' method='post'><input type='hidden' name='action' value='select_friend'><input type='hidden' name='user_id' value='" . $_SESSION['user']['id'] . "' /><input type='hidden' name='friend_id' value='" . $user['id'] . "'/><input type='submit' class='submit_button' value='Add as a Friend' /></form>
				</td></tr>";	
			}
		}
			$html=$html . "</tbody>
		</table>";
		echo $html;
	}
}

$table = new Table();

Class Friend extends Process
{
	function addFriend()
	{
		$query="INSERT INTO friends (user_id, friend_id) VALUES ({$_POST['user_id']}, {$_POST['friend_id']})";
		mysql_query($query);
		$query="INSERT INTO friends (user_id, friend_id) VALUES ({$_POST['friend_id']}, {$_POST['user_id']})";
		mysql_query($query);
		header("location: main.php");
	}
}

if(isset($_POST['action']) and $_POST['action'] == "select_friend")
{
	$friend = new Friend;
	$friend->addFriend();
}

?>