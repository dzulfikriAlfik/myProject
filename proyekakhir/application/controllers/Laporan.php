<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

	public function index()
	{
		$data ['title'] = "Laporan";
		$data['laporan'] = $this->Laporan_model->get_all_laporan();
		$this->load->view('layout/head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('laporan/contentheader');
		$this->load->view('laporan/index', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function add()
	{
		
		$data ['title'] = "Laporan";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('data_warga','Data Warga');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
	  
		  if($this->form_validation->run())     
		    {   
		    	$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'pdf|doc|docx';
				$config['max_size'] = 1000;
				$this->load->library('upload' , $config);
				if(!$this->upload->do_upload('data_warga')){
					echo "upload gagal".$this->upload->display_errors(); 
					exit();
				}
				else
				{
					$upload_data  = $this->upload->data();
		      		$file_name  =   $upload_data['file_name'];
				}
			     $params = array(
				    'data_warga' => $file_name,
				    'keterangan' => $this->input->post('keterangan'),
			     );
		            
	            $laporan_id = $this->Laporan_model->add_laporan($params);
	            redirect('laporan/index');
	        }
	        else
	        {            
	           $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('laporan/contentheader');
				$this->load->view('laporan/add');
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
	        }
		
	}

		public function edit($id)
		{
			// check if the laporan exists before trying to edit it
        $data['laporan'] = $this->Laporan_model->get_laporan($id);
        
        if(isset($data['laporan']['id_laporan']))
        {
        $data ['title'] = "Laporan";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('data_warga','Data Warga','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
  
		   if($this->form_validation->run())     
		            {   
                $params = array(
				    'data_warga' => $this->input->post('data_warga'),
				    'keterangan' => $this->input->post('keterangan'),
                );

                $this->Laporan_model->update_laporan($id,$params);            
                redirect('laporan/index');
            }
            else
            {
                $this->load->view('layout/head' , $data);
				$this->load->view('layout/header');
				$this->load->view('layout/sidebar');
				$this->load->view('laporan/contentheader');
				$this->load->view('laporan/edit' , $data);
				$this->load->view('layout/footer');
				$this->load->view('layout/javascript'); 
            }
        }
        else
            show_error('The laporan you are trying to edit does not exist.');


		}

		public function remove($id)
		{
			$laporan = $this->Laporan_model->get_laporan($id);

        // check if the laporan exists before trying to delete it
        if(isset($laporan['id_laporan']))
        {
            $this->Laporan_model->delete_laporan($id);
            redirect('laporan/index');
        }
        else
            show_error('The laporan you are trying to delete does not exist.');
		}
}