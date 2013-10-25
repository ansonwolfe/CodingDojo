<?php
	include ("process.php");

// var_dump($_SESSION);

	class Friends {

		var $users;
		var $my_friends;
		var $process;

		function __construct(){
			$this->process = new Process();
			$this->all_users();
			$this->my_friends();
		}
		// get all users
		function all_users(){
			$query = "SELECT first_name, last_name, email, id FROM users";
			return $this->users = $this->process->connection->fetch_all($query);	
			//var_dump($friends);
		}
		// get my friends
		function my_friends(){
			$query = "SELECT first_name, last_name, email, friend_id FROM users
						LEFT JOIN friends ON friend_id = users.id 
						WHERE user_id = {$_SESSION['user']['id']}
						";
			return $this->my_friends = $this->process->connection->fetch_all($query);			
		}

	}
	// adding a friend relationship
		function add_friend(){
		$query = "INSERT INTO friends (user_id, friend_id)
		VALUES ('{$_SESSION['user']['id']}','{$_POST['friend_id']}'), 
		('{$_POST['friend_id']}' , '{$_SESSION['user']['id']}')";

		mysql_query($query);	
		header('Location: friends.php');
		}

		if(isset($_POST['friend_id'])){
		add_friend();	
		}

?>