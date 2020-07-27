<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekdes extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Sekdes_model');
        if($this->session->userdata('status')=='')
        {
        	redirect('Auth');
        }
        if ($this->session->userdata('role') != 'sekdes')
        {
        	//redirect('Error/404');
        	show_404();
        }
    }

	public function index()
	{
		$data ['title'] = "sekdes";
		$data['sekdes'] = $this->Sekdes_model->get_all_sekdes();
		$this->load->view('layout/head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('sekdes/contentheader');
		$this->load->view('sekdes/index', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function add()
	{
		$data ['title'] = "Sekdes";
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
		            
	            $sekdes_id = $this->Sekdes_model->add_sekdes($params);
	            redirect('sekdes/index');
	        }
	        else
	        {            
	           $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('sekdes/contentheader');
				$this->load->view('sekdes/add');
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
	        }
		
	}

		public function edit($id)
		{
			// check if the sekdes exists before trying to edit it
        $data['sekdes'] = $this->Sekdes_model->get_sekdes($id);
        
        if(isset($data['sekdes']['id_kepdes']))
        {
          $data ['title'] = "Sekdes";
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

                $this->Sekdes_model->update_sekdes($id,$params);            
                redirect('sekdes/index');
            }
            else
            {
                $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('sekdes/contentheader');
				$this->load->view('sekdes/edit' , $data);
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
            }
        }
        else
            show_error('The sekdes you are trying to edit does not exist.');


		}

		public function remove($id)
		{
			$sekdes = $this->Sekdes_model->get_sekdes($id);

        // check if the sekdes exists before trying to delete it
        if(isset($sekdes['id_kepdes']))
        {
            $this->Sekdes_model->delete_sekdes($id);
            redirect('sekdes/index');
        }
        else
            show_error('The sekdes you are trying to delete does not exist.');
		}
}