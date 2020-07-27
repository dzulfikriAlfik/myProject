<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Pelayanan_model');
        if($this->session->userdata('status')=='')
        {
        	redirect('Auth');
        }
        if ($this->session->userdata('role') != 'pelayanan')
        {
        	//redirect('Error/404');
        	show_404();
        }
    }

	public function index()
	{
		$data ['title'] = "Pelayanan";
		$data['pelayanan'] = $this->Pelayanan_model->get_all_pelayanan();
		$this->load->view('layout/head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('pelayanan/contentheader');
		$this->load->view('pelayanan/index', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function add()
	{
		$data ['title'] = "Pelayanan";
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
		            
	            $pelayanan_id = $this->Pelayanan_model->add_pelayanan($params);
	            redirect('pelayanan/index');
	        }
	        else
	        {            
	           $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('pelayanan/contentheader');
				$this->load->view('pelayanan/add');
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
	        }
		
	}

		public function edit($id)
		{
			// check if the pelayanan exists before trying to edit it
        $data['pelayanan'] = $this->Pelayanan_model->get_pelayanan($id);
        
        if(isset($data['pelayanan']['id_pelayanan']))
        {
          $data ['title'] = "Pelayanan";
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

                $this->Pelayanan_model->update_pelayanan($id,$params);            
                redirect('pelayanan/index');
            }
            else
            {
                $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('pelayanan/contentheader');
				$this->load->view('pelayanan/edit' , $data);
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
            }
        }
        else
            show_error('The pelayanan you are trying to edit does not exist.');


		}

		public function remove($id)
		{
			$pelayanan = $this->Pelayanan_model->get_pelayanan($id);

        // check if the pelayanan exists before trying to delete it
        if(isset($pelayanan['id_pelayanan']))
        {
            $this->Pelayanan_model->delete_pelayanan($id);
            redirect('pelayanan/index');
        }
        else
            show_error('The pelayanan you are trying to delete does not exist.');
		}
}