<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	/* 
	*  Instance variable $view_data will store information that needs to be pass to a view.
	*  $user_session will store a copy of  session data that will be set once a user login. 
	*  Instead of directly accessing session array which is tedious e.g. $this->session->userdata('email')
	*  we will just do something like this e.g. $user_session['email'], $user_session['user_level'].
	*  The syntax of session array in native php is $_SESSION, in CI it is $this->session->userdata(). 
	*  Do not be confuse about session, it is just an array that lives in your browser.
	*/
	
	protected $view_data = array();
	protected $user_session = array();
	
	public function __construct()
	{
		parent::__construct();
		/*
		*  We are initializing the value of instance variable $user_session into the value of
		*  session array on its index user_session, in native php this is same with $_SESSION['user_session']. 
		*  user_session is not a constant way to name the index of session array to hold user information, 
		*  but to make it more readable we named it this way.
		*/
		
		$this->user_session = $this->session->userdata('user_session');
	}
	
	/*
	*  Displays the page with login and registration form, loads login_view.php
	*  This page will allow a guest to register a new account and allows a registered user to login.
 	*  This is also the main/home page of our application. 
 	*/
	
	public function index()
	{	
		/*
		*  $_POST is an array that will catch data submitted through a form with a method="post".
		*  In CI $_POST is replaced with $this->input->post(), $_POST['email'] is the same with $this->input->post('email').
		*  $this->input->post() has some security benefits to your application such preventing Cross Site Scripting 
		*  when xss filtering is set to TRUE in your configuration. (application/config/config.php)  
		*/
		$post_data = $this->input->post();
		
		/*
		*  If user is already login, redirect him to the welcome page else, display login and registration form.
		*/
		if($this->is_login())
			redirect(base_url('/login/welcome'));
		else
		{	
			/*
			*  In the login_view, registration and login form both have a hidden input field called "form_action".
			*  Registration form and login form both have action="", which means that the forms are submitted to itself.
			*  "form_action" will indicate which form is submitted, e.g. form_action="login" , form_action="register".
			*/
			
			if($post_data["form_action"] === 'login')
			{	
				/*
				*  If form_action is equal to "login" we will call function user_login() which is also in this controller. 
				*  function user_login() will check if the provided email and password exists in the database.
				*  We are putting the calling of function user_login() into a variable called $user_login so that we can
				*  use its return values, and check if user will be redirected to welcome page.
				*/
				
				$user_login = $this->user_login();
				
				if($user_login['status'] === TRUE)
					redirect(base_url("/login/welcome"));
				else
					$this->view_data['error_message'] = $user_login['error_message'];
			}
			else if($post_data["form_action"] === 'register')
			{
				/*
				*  If form_action is equal to "register" we will call function user_registration() which is also in this controller. 
				*  function user_registration() will check if the provided credentials/user information is allowed to be register.
				*  We are putting the calling of function register_user() into a variable called $register_user so that we can
				*  use the return values of function user_registration(), 
				*  Basically to check if user registration is successful, else show registration error messages.
				*/
				
				$register_user = $this->user_registration();
				
				if($register_user['status'] === TRUE)
					$this->view_data['success_message'] = $register_user['success_message'];
				else
					$this->view_data['error_message'] = $register_user['error_message'];
			}
			
			$this->view_data['submitted_form'] = $post_data["form_action"];
		}		
		
		$this->load->view('login_view', $this->view_data);
	}
	
	/*
	*  This function checks if a user exist in the database with the given email and password combination. 
	*  This function will also set the session array, that will basically login the user to the system.
	*  Notice that we are making this function protected since we don't want this function to be accessible through the url.
	*/
	protected function user_login()
	{	
		$post_data = $this->input->post();
		
		/*
		*  CI form validation class allows us validate information provided by the user. 
		*  We have already loaded form_validation library in our autoload. 
		*  set_rules is a method inside form_validation class that expects three parameters:
		*  the index/field of post data to be check: e.g. 'email'
		*  the label to be use in the error message: e.g. 'Email'
		*  the rules for the field we need to validate: e.g. 'trim|required|valid_email'
		*  
		*  Like for email, just add the rules required|valid_email, 
		*  and it will make sure that email field required and should be a valid email address.
		*/
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		/*
		*  After setting form validation rules, lets call "run" method of form validation class. 
		*  This will validate our post data with the rules we provided.
		*  Validation errors will be generated if a rule is not met.
		*  e.g. The Email field must contain a valid email address.
		*/
		
		if($this->form_validation->run() === FALSE)
		{
			$data['status'] = FALSE;
			$data['error_message'] = validation_errors();
		}
		else
		{	
			/*
			*  If form validation went well, check if user exists in the users table w/ the 
			*  given email & password combination.
			*
			*  In passing data from a function to another function, we are going to put the data in array format. 
			*  The indecies of the array will be the same as the field of the table. 
			*  For example, have email field in users table, in our array we will have 'email' => $post_data["email"]. 
			*
			*  In CI Active Record, where('email', 'john@yahoo.com') 
			*  is the same with where(array('email' => 'john@yahoo.com'))
			*  So passing parameters in array format will allow as to save some lines of code as well, specially in our
			*  models.
			*  
			*  In normal query where('email', 'john@yahoo.com') is the same with WHERE 'email' = 'john@yahoo.com'
			*/
			
			$user = array(
				'email' => $post_data["email"], 
				'password' => md5(HASH_START . $post_data["password"] . HASH_END)
			);
			
			/*
			*  User model has the functions we need to interact with our database. 
			*  For this activity, User model has the following functions.
			*  function register_user - saves new user to databse, needed for user registration
			*  function get_user - checks if user exists in the database, needed for user login
			*  
			*  $this->load->model('User_model') will load user_model.php located in application/models folder.
			*  $this->User_model->get_user($user) means that we are calling function get_user of User_model
			*  and we are also passing the $user array as the parameter.
			*  
			*  function get_user will receive $user and will process the query to the database for us.
			*/
			
			$this->load->model('User_model');
			$user = $this->User_model->get_user($user);
			
			/*
			*  count is a PHP code to check the number of elements in an array.
			*  count($user) will check if there is record returned by $this->User_model->get_user($user),
			*  if count($user) is greater than zero, that means that a user exist with the given email and 
			*  password combination.
			*  
			*/
			
			if(count($user) > 0)
			{
				/*
				*  If user exists in database, login the user by setting the user session array. 
				*  
				*  The value of $user will be in object format, almost the same with array but 
				*  in order to access its values we are going to use -> instead of ['']
				*  e.g. In array: $user['email'] 
				*       In object: $user->email. 
				*  Run var_dump($user) in order to see the structure of $user.
				*
				*  $user_data variable will contain the user information that we will set in user session 
				*  array. We are also adding 'is_logged_in' index which basically means that the user is
				*  currently login.
				*/
				
				$user_data = array(
					'user_id' => $user->id,
					'email' => $user->email,
					'firstname' => $user->firstname,
					'lastname' => $user->lastname,
					'is_logged_in' => TRUE
				);
				
				/*
				*  This is the part where user login happens.
				*  We are now going to set session variables.
				*  $this->session->set_userdata('user_session', $user_data) will be same as 
				*  $_SESSION['user_session'] = $user_data in native PHP. 
				*/
				
				$this->session->set_userdata('user_session', $user_data);
				$this->user_session = $this->session->userdata('user_session');
				
				/*
				*  If the login attempt is successful, set status to true, else false.
				*  If status is false, provide error message as well.
				*/
				
				$data['status'] = TRUE;
			}
			else
			{
				$data['status'] = FALSE;
				$data["error_message"] = "Invalid email and Password! Please Try Again!";
			}
		}
		
		return $data;
	}
	
	/*
	* This function processes/handles the user registration.
	* It also used form validation to validate information provided by the user. 
	* We are also going to call User model and pass values to functions inside it in array format.
	*/
	protected function user_registration()
	{	
		$post_data = $this->input->post();
		
		/*
		*  Observe how we validate if user enters a unique email address, by the rule is_unique[users.email]
		*  where users refers to the users table in the database and email refers to the email field of 
		*  users table. 
		*  
		*  We also have matches[password], which means that the confirm password field should be the same as
		*  the value of password field.
		*/
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('re_password', 'Confirm Password', 'trim|required|matches[password]');
		
		if($this->form_validation->run() === FALSE)
		{
			$data['status'] = FALSE;
			$data['error_message'] = validation_errors();
		}
		else
		{
			/*
			*   Since we are going to add a user, it is better to put all the user data in to an array. 
			*	$user will contain the information of the user, the indecies of $user will be the same 
			*   with the fields of users table in the database. 
			*	
			*   HASH_START & HASH_END makes the encryption more secure. We are just simply adding additional
			*   characters to the beginning and ending of the submitted password before md5 encryption. 
			*   Constant variables are available in application/config/constants.php
			*/
			
			$user = array(
				'email'	=> $post_data["email"],
				'password' => md5(HASH_START . $this->input->post("password") . HASH_END),
				'firstname' => $post_data["firstname"],
				'lastname'	=> $post_data["lastname"],
				'created_at' => date("Y-m-d H:i:s")
			);
				
			/*
			*   To register the user we need to load the user model and call function register_user, 
			*   passing the $user array containing the user information.
			*   Function register_user will be responsible in adding the user to the users table.
			*/
			
			$this->load->model('User_model');
			$register_user = $this->User_model->register_user($user);	
			
			/*
			*  Return success message if registration is successful, else
			*  return error message.
			*/
			
			if($register_user)
			{
				$data["status"] = TRUE;
				$data["success_message"] = "Registration successful! You can now login!";
			}
			else
			{
				$data["status"] = FALSE;
				$data["error_message"] = "Registration failed! Please Try Again!";
			}	
		}
		
		return $data;
	}
	
	/*
	*  If user is successfully login, he will be redirected to the welcome page.
	*  $this->view_data['user'] =  $this->user_session allows us to pass the user
	*  information to the view, without having to query to the database again.
	*/
	
	public function welcome()
	{		
		if($this->is_login())
		{		
			$this->view_data['user'] = $this->user_session;
			$this->load->view('welcome', $this->view_data);
		}
		else
			redirect(base_url());
	}
	
	/*
	*  Checks if user is login or not. 
	*  It is expected that we will always check if user is login or not,
	*  creating a function to do this will make our coding faster and will make our codes shorter.
	*/
	
	protected function is_login()
	{
		if($this->user_session['is_logged_in'] && is_numeric($this->user_session['user_id']))
			return TRUE;
		else
			return FALSE;
	}
	
	/*
	*  To logout a user, we need to destroy the session data and 
	*  redirect the user to the home page of our application.
	*  sess_destroy will basically remove all information that we have added in the session array.
	*/
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

/* end of file */