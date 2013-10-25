<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	protected $view_data = array();
	protected $user_session = array();

	function __construct()
	{
		parent::__construct();
		
		$this->user_session = $this->session->userdata('user_session');
		$this->load->model('User_model');	
	}
	public function index()
	{
		$this->login();
	}

	public function login() 
	{
		$this->load->view('login');
	}

	public function process_login() 
	{
		$this->load->library('encrypt');
		// var_dump($this->input->post);
		$user = array('email' => $this->input->post('email', TRUE),
						'password' => $this->encrypt->encode($this->input->post('password')));
		// var_dump($user);
		// die();
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules('email','Email','valid_email|required');
		$this->form_validation->set_rules('password','Password','md5|required');

		// if login is unsuccessful, show errors, else, log user in
		if($this->form_validation->run() === FALSE)
		{
			$data['login_errors'] = validation_errors();
			$this->load->view('login', $data);
		}
		else
		{

			$zebra = $this->User_model->get_user($user);
			// var_dump($user);
			// var_dump($result);
			// die();
			// var_dump($zebra);
			if(!empty($zebra))
			{
				$this->session->set_userdata('user_data', $zebra);
				// if (count($user) > 0)

				// {
					$user_data = array(
						'user_id' => $zebra->id,
						'email' => $zebra->email,
						'firstname' => $zebra->first_name,
						'lastname' => $zebra->last_name,
						'is_logged_in' => TRUE
					);
					// var_dump($zebra);
					// die();
					$this->load->view('welcome', $zebra);
				// }
			}
			else 
			{
				redirect(base_url('user'));
			}	

		}
	}

	public function process_register() 
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname','First Name','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('lastname','Last Name','trim|required|alpha|xss_clean');
		$this->form_validation->set_rules('email','Email',"trim|valid_email|required|is_unique(email, 'email')");
		$this->form_validation->set_rules('password','Password','required|min_length[6]|md5');
		$this->form_validation->set_rules('cpassword','Password Confirmation','matches[password]');

		if($this->form_validation->run() === FALSE)
		{
			$data['errors'] = validation_errors();
			$this->load->view('login', $data);
		}
		else
		{
		// encrypt password
			$this->load->library('encrypt');
			$encrypt_pwd = $this->encrypt->encode($this->input->post('password'));

			$user = array('first_name'=> $this->input->post('firstname'),
						'last_name'=> $this->input->post('lastname'),
						'email'=> $this->input->post('email'),
						'password'=> $encrypt_pwd);

			$this->User_model->insert_user($user);
			// set session
			$this->session->set_userdata($user);
			// redirect(base_url('welcome'));
			$this->load->view('welcome', $user);	
		}	
	}
	// logout
	public function process_logout() {

		  $this->session->sess_destroy();
		  redirect(base_url('user'));

	}
}	