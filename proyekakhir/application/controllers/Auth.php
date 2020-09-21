<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

	public function index()
	{
		$session = $this->session->userdata('status');
		if($session == '')
		{
			$this->load->view('login');
		}
		else{
			redirect('Home');	
		}

	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())     
		{   
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->Auth_model->login($username, $password);
			if($data == false)
			{
				redirect('Auth');
			}
			else
			{
				$session = ['status' => 'Loged in' , 'role' => $data[0]['role']];
				$this->session->set_userdata($session); 
				redirect('Home');
			}	    
	    }
	    else
	    {         
	    	redirect('Auth');   
	            
	    }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}