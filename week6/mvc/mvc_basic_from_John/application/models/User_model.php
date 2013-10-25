<?php

class User_model extends CI_Model
{
	/*
	* This function queries to the database and gets the user with the given email and password combination.
	*/
	public function get_user($user)
	{
		/*
		* In here we are using CI active record.
		* where('email', $user['email']) has two parameters, the field in table and the expected value
		* get("users") means that we are going to get the data from the users table
		* row() means that we are just going to fetch a single record/result from the users table.
		*/
		
		return $this->db->where('email', $user['email'])
					->where('password', $user['password'])
					->get("users")
					->row();
		
		/*
		*	Shortcut method	using CI Active Record
		*   Since fields and values are already in $user array we can just put it imediatelly inside where()
		
		return $this->db->where($user)
					->get("users")
					->row();
		*/
		
		/*
		* Using normal MySQL Query
		* The equivalent of the query we need to run is: 
		* SELECT * FROM users WHERE email = '{$user['email']}' and password = '{$user['password']}'
		
		return $this->db->query("SELECT * 
								 FROM users 
								 WHERE email = '{$user['email']}' 
								 AND password = '{$user['password']}'"
								 )->row();
		*/
	}
	
	/*
	* This function allows us to save new user record to the database.
	*/
	
	public function register_user($user)
	{
		return $this->db->insert("users", $user);
		
		/*
		* Using normal MySQL Query
		* The equivalent of the query we need to run is:
		* INSERT INTO users (firstname, lastname, email, password, created_at)
		  VALUES ('{$user['firstname']}', '{$user['lastname']}', '{$user['email']}', '{$user['password']}' '{$user['created_at']}')  
		*/
	}
}

//eof
