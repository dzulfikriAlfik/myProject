<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status')=='')
        {
        	redirect('Auth');
        }
    }

	public function index()
	{
		$data ['title'] = "Admin";
		$this->load->view('layout/head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/contentheader');
		$this->load->view('layout/content');
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}
}