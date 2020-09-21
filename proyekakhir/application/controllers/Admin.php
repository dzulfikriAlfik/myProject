<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        if($this->session->userdata('status')=='')
        {
        	redirect('Auth');
        }
        if ($this->session->userdata('role') != 'admin')
        {
        	//redirect('Error/404');
        	show_404();
        }
    }

	public function index()
	{
		$data ['title'] = "Admin";
		$data['admin'] = $this->Admin_model->get_all_admin();
		$this->load->view('layout/head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('admin/contentheader');
		$this->load->view('admin/index', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function add()
	{
		$data ['title'] = "Admin";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_tanggal_lahir','Tempat Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','No Telp','required|numeric');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
	  
		  if($this->form_validation->run())     
		    {   
			     $params = array(
				    'nama_lengkap' => $this->input->post('nama_lengkap'),
				    'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
				    'no_telp' => $this->input->post('no_telp'),
				    'email' => $this->input->post('email'),
				    'username' => $this->input->post('username'),
				    'password' => $this->input->post('password'),
			     );
		            
	            $admin_id = $this->Admin_model->add_admin($params);
	            redirect('admin/index');
	        }
	        else
	        {            
	           $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('admin/contentheader');
				$this->load->view('admin/add');
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
	        }
		
	}

		public function edit($id)
		{
			// check if the admin exists before trying to edit it
        $data['admin'] = $this->Admin_model->get_admin($id);
        
        if(isset($data['admin']['id_admin']))
        {
        $data ['title'] = "Admin";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('tempat_tanggal_lahir','Tempat Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','No Telp','required|numeric');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
  
		   if($this->form_validation->run())     
		            {   
                $params = array(
     				'nama_lengkap' => $this->input->post('nama_lengkap'),
				    'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
				    'no_telp' => $this->input->post('no_telp'),
				    'email' => $this->input->post('email'),
				    'username' => $this->input->post('username'),
				    'password' => $this->input->post('password'),
                );

                $this->Admin_model->update_admin($id,$params);            
                redirect('admin/index');
            }
            else
            {
                $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('admin/contentheader');
				$this->load->view('admin/edit' , $data);
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
            }
        }
        else
            show_error('The admin you are trying to edit does not exist.');


		}

		public function remove($id)
		{
			$admin = $this->Admin_model->get_admin($id);

        // check if the admin exists before trying to delete it
        if(isset($admin['id_admin']))
        {
            $this->Admin_model->delete_admin($id);
            redirect('admin/index');
        }
        else
            show_error('The admin you are trying to delete does not exist.');
		}
}