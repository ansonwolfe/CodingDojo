<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {

	public function index()
	{
		$this->load->view('main');
	}

	public function money()
	{
		if ($this->session->userdata('log') == NULL) $this->session->set_userdata('log', array());

		$post = $this->input->post();
		foreach($post as $key => $value){
			switch($value)
			{
				case "farm":
					$this->change_gold(10, 20, "farm");
					break;
				case "cave":
					$this->change_gold(5, 10, "cave");
					break;
				case "house":
					$this->change_gold(2, 5, "house");
					break;
				case "casino":
					$this->change_gold(-50, 50, "casino");
					break;
				case "reset":
					$this->session->sess_destroy();
					break;
			}
		}

		$this->load->view('main');
	}

	public function change_gold($num1, $num2, $location)
	{
		$date = date('F jS Y g:i a');
		$num = rand($num1, $num2);
		$gold = $this->session->userdata('gold');
		$gold += $num;
		$this->session->set_userdata('gold', $gold);
		if ($num < 0)
		{
			$array = $this->session->userdata('log');
			array_push($array, "You entered a {$location} and lost {$num} gold... Ouch... ({$date})");
			$this->session->set_userdata('log', $array);
		}
		else
		{
			$array = $this->session->userdata('log');
			array_push($array, "You entered a {$location} and earned {$num} gold. ({$date})");
			$this->session->set_userdata('log', $array);
		}
	}
}