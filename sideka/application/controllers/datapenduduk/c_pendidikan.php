<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pendidikan extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_pendidikan');
    }

    function index()    {
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
		{
			$this->lists();
		}else
			redirect('c_login', 'refresh');
        	
    }

    function lists() {
        $colModel['id_pendidikan'] = array('ID',20,TRUE,'center',0);	
		$colModel['deskripsi'] = array('Deskripsi',150,TRUE,'left',2);
        $colModel['aksi'] = array('AKSI',60,FALSE,'center',0);
		
		//Populate flexigrid buttons..
        $buttons[] = array('Select All','check','btn');
		$buttons[] = array('separator');
        $buttons[] = array('DeSelect All','uncheck','btn');
        $buttons[] = array('separator');
		$buttons[] = array('Add','add','btn');
        $buttons[] = array('separator');
        $buttons[] = array('Delete Selected Items','delete','btn');
        $buttons[] = array('separator');
       		
        $gridParams = array(
            'height' => 300,
            'rp' => 10,
            'rpOptions' => '[10,20,30,40]',
            'pagestat' => 'Displaying: {from} to {to} of {total} items.',
            'blockOpacity' => 0.5,
            'title' => '',
            'showTableToggleBtn' => false
	);

        $grid_js = build_grid_js('flex1',site_url('datapenduduk/c_pendidikan/load_data'),$colModel,'id_pendidikan','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'DATA PENDIDIKAN';		
		$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
        $data['content'] = $this->load->view('pendidikan/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {	
		$this->load->library('flexigrid');
        $valid_fields = array('id_pendidikan','deskripsi');

		$this->flexigrid->validate_post('id_pendidikan','ASC',$valid_fields);
		$records = $this->m_pendidikan->get_pendidikan_flexigrid();
	
		$this->output->set_header($this->config->item('json_header'));
	
		$record_items = array();
		
		foreach ($records['records']->result() as $row)
		{
			$record_items[] = array(
				$row->id_pendidikan,
				$row->id_pendidikan,
				$row->deskripsi,
				'<button type="submit" class="btn btn-default btn-xs" title="Edit" onclick="edit_pendidikan(\''.$row->id_pendidikan.'\')"/><i class="fa fa-pencil"></i></button>'
			);  
		}
		//Print please
		$this->output->set_output($this->flexigrid->json_build($records['record_count'],$record_items));
    }
    
    function add(){		
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
		{			
			$data['page_title'] = 'Tambah Pendidikan';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('pendidikan/v_tambah', $data, TRUE);
		
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
        
    }
	
	function simpan_pendidikan() {
		$deskripsi = $this->input->post('deskripsi', TRUE);
		
		$this->form_validation->set_rules('deskripsi', 'Nama Pendidikan', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$result['hasil'] = $this->m_pendidikan->cekFIleExist($deskripsi);				
			
			if ($result['hasil'] == NULL) {				
				$data = array(
					'deskripsi' => $deskripsi
				);

			$this->m_pendidikan->insertPendidikan($data);	
			redirect('datapenduduk/c_pendidikan','refresh');
			}			
			else $this->add();
			/* Handle ketika nomer pendidikan telah digunakan */
        }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
		{
			$data['hasil'] = $this->m_pendidikan->getPendidikanByIdPendidikan($id);
			$data['page_title'] = 'Edit Data Pendidikan';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('pendidikan/v_ubah', $data, TRUE);
        
			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');
    }
	
	function update_pendidikan() {	
	
		$id_pendidikan = $this->input->post('id_pendidikan', TRUE);
		$deskripsi = $this->input->post('deskripsi', TRUE);
		
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
					'deskripsi' => $deskripsi
				);
	
		  	$result = $this->m_pendidikan->updatePendidikan(array('id_pendidikan' => $id_pendidikan), $data);
			
		  	redirect('datapenduduk/c_pendidikan','refresh');
		}
		else $this->edit($id_penduduk);
    }
	
	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_pendidikan->deletePendidikan($id);
            $sucess++;
        }
		
        redirect('admin/c_pendidikan', 'refresh');
    }
	

}
?>