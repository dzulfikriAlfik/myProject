<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_bidang_kegiatan extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_bidang_kegiatan');

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


public function ExportToExcel()
	{
		$query = $this->data_anggaran->get_dataForExportExcel();
		$this->excel_generator->getActiveSheet()->setCellValue('A1', 'Data Bidang & Kegiatan');
		$this->excel_generator->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel_generator->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel_generator->getActiveSheet()->mergeCells('A1:F1');
		$this->excel_generator->getActiveSheet()->getStyle('A1:F300')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
					)
			)
		);
		$this->excel_generator->getActiveSheet()->getStyle('A3:F16')->applyFromArray($styleArray);
		unset($styleArray);

		$this->excel_generator->start_at(3);
		$this->excel_generator->set_header(array('ID Bidang & Kegiatan', 'Nama Bidang & Kegiatan'));
		$this->excel_generator->set_column(array('id_bidang_kegiatan', 'bidang_kegiatan'));
        $this->excel_generator->set_width(array(15, 20, 20, 15, 15, 20));

        $this->excel_generator->exportTo2007('Data Bidang & Kegiatan');
	}

    function lists() {
        $colModel['tbl_bidang_kegiatan.id_bidang_kegiatan'] = array('No.',20,TRUE,'left',0);
		$colModel['ref_desa.nama_desa'] = array('Nama Desa',250,TRUE,'left',2);
		$colModel['tbl_bidang_kegiatan.bidang_kegiatan'] = array('Bidang & Kegiatan',250,TRUE,'left',2);
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

        $grid_js = build_grid_js('flex1',site_url('datapenduduk/c_bidang_kegiatan/load_data'),$colModel,'id_bidang_kegiatan','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'DATA BIDANG & KEGIATAN';
		$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
        $data['content'] = $this->load->view('bidang_kegiatan/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {

		$this->load->library('flexigrid');
        $valid_fields = array('tbl_bidang_kegiatan.id_bidang_kegiatan','ref_desa.nama_desa','tbl_bidang_kegiatan.bidang_kegiatan');

		$this->flexigrid->validate_post('tbl_bidang_kegiatan.id_bidang_kegiatan','ASC',$valid_fields);
		$records = $this->m_bidang_kegiatan->get_bidang_kegiatan_flexigrid();

		$this->output->set_header($this->config->item('json_header'));

		$record_items = array();

    $count=0;
		foreach ($records['records']->result() as $row)
		{
      $count++;
			$record_items[] = array(
  			$row->id_bidang_kegiatan,
        $count,
        $row->nama_desa,
				$row->bidang_kegiatan,
//				'<input type="button" value="Edit" class="ubah" onclick="edit_gizi_buruk(\''.$row->id_gizi_buruk.'\')"/>'
        '<button type="submit" class="btn btn-default btn-xs" title="Edit Data Bidang & Kegiatan" onclick="edit_bidang_kegiatan(\''.$row->id_bidang_kegiatan.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah BIDANG & KEGIATAN';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('bidang_kegiatan/v_tambah', $data, TRUE);

			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');

    }

	function simpan_bidang_kegiatan() {

		$bidang_kegiatan = $this->input->post('bidang_kegiatan', TRUE);

    $this->form_validation->set_rules('bidang_kegiatan', 'Bidang & Kegiatan', 'required');

    $id_desa = $this->input->post('id_desa', TRUE);

    $this->form_validation->set_rules('id_desa', 'Bidang & Kegiatan', 'required');


		if ($this->form_validation->run() == TRUE)
		{
      if ($id_desa != '') {

				$data = array(
          'id_desa' => $id_desa,
          'bidang_kegiatan' => $bidang_kegiatan
				);

				$this->m_bidang_kegiatan->insertbidang_kegiatan($data);
				redirect('datapenduduk/c_bidang_kegiatan','refresh');
			/* Handle ketika nomer gizi_buruk telah digunakan */
      }
      else $this->add();
    }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
		{
			$data['hasil']		= $this->m_bidang_kegiatan->getbidang_kegiatanByIdbidang_kegiatan($id);
			$data['page_title'] = 'Edit Data BIDANG & KEGIATAN';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('bidang_kegiatan/v_ubah', $data, TRUE);

			$this->load->view('utama', $data);

    }
      else redirect('c_login', 'refresh');
    }

	function update_bidang_kegiatan() {

		$id_bidang_kegiatan = $this->input->post('id_bidang_kegiatan', TRUE);

    $id_desa = $this->input->post('id_desa', TRUE);

		$bidang_kegiatan = $this->input->post('bidang_kegiatan', TRUE);


		 if ($id_desa != '')
		 {
			$data = array(
          'id_desa' => $id_desa,
					'bidang_kegiatan' => $bidang_kegiatan
				);

		  	$result = $this->m_bidang_kegiatan->updatebidang_kegiatan(array('id_bidang_kegiatan' => $id_bidang_kegiatan), $data);

		  	redirect('datapenduduk/c_bidang_kegiatan','refresh');
		 }
		 else $this->edit($id_bidang_kegiatan);
    }

	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_bidang_kegiatan->deletebidang_kegiatan($id);
            $sucess++;
        }

        redirect('admin/c_bidang_kegiatan', 'refresh');
    }


    public function cari_desa()
  	{
  		// tangkap variabel keyword dari URL
  		$keyword = $this->uri->segment(4);

  		// cari di database
  		$data = $this->db->from('ref_desa')->like('nama_desa',$keyword)->get();

  		// format keluaran di dalam array
  		foreach($data->result() as $row)
  		{
  			$arr['query'] = $keyword;
  			$arr['suggestions'][] = array(
  				'value'	=>$row->nama_desa,
  				'id_desa'	=>$row->id_desa

  			);
  		}
  		// minimal PHP 5.2
  		echo json_encode($arr);
  	}

}
?>
