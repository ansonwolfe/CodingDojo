<?php

	Class User_model extends CI_model {


		public function get_user($user) {

	
		// $decode_pwd = $this->encrypt->decode($user['password']);

			$user_data = $this->db->where('email', $user['email'])
						// ->where('password', $this->encrypt->decode($user['password']))
						->get("users")
						->row();
			return $user_data;
		}

		public function insert_user($user) {
		// set the timestamp for created_at 
		$this->db->set('created_at', 'NOW()', FALSE);
			// insert into database 
		$this->db->insert('users', $user);
	}

}