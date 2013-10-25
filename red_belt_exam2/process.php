<?php

	include_once "connection.php";
//  connection to db
	class Process 
	{
		var $connection;
		public function __construct(){
			$this->connection = new Database();
		}
	}

	class Users {

		var $users;

		function __construct(){
			$this->process = new Process();
			$this->all_users();

		}
		// get all users
		function all_users(){
			$query = "SELECT CONCAT (first_name, ' ',last_name) AS name,id FROM users";
			return $this->users = $this->process->connection->fetch_all($query);	
			
		}
	}
	
	class Friends extends Users{

		public $html = array();

		function user_info(){
		// get user info
			$query = "SELECT CONCAT (first_name, ' ',last_name) AS name, email, alias,id
			FROM users WHERE id = '{$_POST['selected_id']}'";

			$user_details = $this->process->connection->fetch_record($query);
	
			$this->html['user_info'] = "A.K.A: ". $user_details['alias'] ."<br/>
					 Email: " . $user_details['email'] ."<br />";
 		// run the user_friends function
			$this->user_friends();		 
			return $this->html;		 
		}
		// get friends
		function user_friends(){

			$query = "SELECT DISTINCT CONCAT (first_name, ' ',last_name) AS name, email, alias,id FROM users 
						LEFT JOIN friends ON users.id = friend_id
						WHERE user_id = '{$_POST['selected_id']}'";
			$user_friends = $this->process->connection->fetch_all($query);
			
			$this->html['user_friend'] = "<h3>List of Friends</h3>
						<table>
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Alias</th>	
								</tr>
							</thead>
							<tbody> ";

			foreach ($user_friends as $friend) {
				$this->html['user_friend'].= "<tr>
								<td>" . $friend['name'] . "</td>
						  		<td>" . $friend['email'] . "</td>
						  		<td>" . $friend['alias'] . "</td>
						  </tr>";
			}	

			$this->html['user_friend'] .= "</tbody>
				</table>";				
		}

	}
	
	if(isset($_POST['selected_id']))
	{
 		$friends = new Friends();
 		$user_info = $friends->user_info();
 		// $user_info .= $friends->user_friends();


 		echo json_encode($user_info);

	};



?>