<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepaladesa extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Kepaladesa_model');
        if($this->session->userdata('status')=='')
        {
        	redirect('Auth');
        }
        if ($this->session->userdata('role') != 'kepaladesa')
        {
        	//redirect('Error/404');
        	show_404();
        }
    }

	public function index()
	{
		$data ['title'] = "Kepaladesa";
		$data['kepaladesa'] = $this->Kepaladesa_model->get_all_kepaladesa();
		$this->load->view('layout/head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('kepaladesa/contentheader');
		$this->load->view('kepaladesa/index', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function add()
	{
		$data ['title'] = "Kepaladesa";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('tempat_tanggal_lahir','Tempat Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','No Telp','required|numeric');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('agama','Agama','required');
		$this->form_validation->set_rules('status','Status Kawin','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
	  
		  if($this->form_validation->run())     
		    {   
			     $params = array(
				    'nama_lengkap' => $this->input->post('nama_lengkap'),
				    'alamat' => $this->input->post('alamat'),
				    'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
				    'no_telp' => $this->input->post('no_telp'),
				    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				    'agama' => $this->input->post('agama'),
				    'status' => $this->input->post('status'),
				    'username' => $this->input->post('username'),
				    'password' => $this->input->post('password'),
			     );
		            
	            $kepaladesa_id = $this->Kepaladesa_model->add_kepaladesa($params);
	            redirect('kepaladesa/index');
	        }
	        else
	        {            
	           $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('kepaladesa/contentheader');
				$this->load->view('kepaladesa/add');
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
	        }
		
	}

		public function edit($id)
		{
			// check if the kepaladesa exists before trying to edit it
        $data['kepaladesa'] = $this->Kepaladesa_model->get_kepaladesa($id);
        
        if(isset($data['kepaladesa']['id_kepdes']))
        {
          $data ['title'] = "Kepaladesa";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('tempat_tanggal_lahir','Tempat Tanggal Lahir','required');
		$this->form_validation->set_rules('no_telp','No Telp','required|numeric');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('agama','Agama','required');
		$this->form_validation->set_rules('status','Status Kawin','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
  
		   if($this->form_validation->run())     
		            {   
                $params = array(
     				 'nama_lengkap' => $this->input->post('nama_lengkap'),
				    'alamat' => $this->input->post('alamat'),
				    'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
				    'no_telp' => $this->input->post('no_telp'),
				    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				    'agama' => $this->input->post('agama'),
				    'status' => $this->input->post('status'),
				    'username' => $this->input->post('username'),
				    'password' => $this->input->post('password'),
                );

                $this->Kepaladesa_model->update_kepaladesa($id,$params);            
                redirect('kepaladesa/index');
            }
            else
            {
                $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('kepaladesa/contentheader');
				$this->load->view('kepaladesa/edit' , $data);
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
            }
        }
        else
            show_error('The kepaladesa you are trying to edit does not exist.');


		}

		public function remove($id)
		{
			$kepaladesa = $this->Kepaladesa_model->get_kepaladesa($id);

        // check if the kepaladesa exists before trying to delete it
        if(isset($kepaladesa['id_kepdes']))
        {
            $this->Kepaladesa_model->delete_kepaladesa($id);
            redirect('kepaladesa/index');
        }
        else
            show_error('The kepaladesa you are trying to delete does not exist.');
		}
}