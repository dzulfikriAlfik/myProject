<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_data_anggaran extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_data_anggaran');

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
		$query = $this->m_data_anggaran->get_dataForExportExcel();
		$this->excel_generator->getActiveSheet()->setCellValue('A1', 'Data Anggaran');
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
		$this->excel_generator->set_header(array('ID Anggaran', 'Nama Kegiatan'));
		$this->excel_generator->set_column(array('id_data_anggaran', 'nama_kegiatan'));
        $this->excel_generator->set_width(array(15, 20, 20, 15, 15, 20));

        $this->excel_generator->exportTo2007('Data Bidang & Kegiatan');
	}

    function lists() {
        $colModel['id_data_anggaran'] = array('No.',20,TRUE,'left',0);
		$colModel['bidang_kegiatan'] = array('Nama Bidang & Kegiatan',250,TRUE,'left',2);
    $colModel['nama_desa'] = array('Nama Desa',100,TRUE,'left',2);
    $colModel['lokasi'] = array('Lokasi',100,TRUE,'left',2);
    $colModel['waktu'] = array('Waktu',100,TRUE,'left',2);
    $colModel['nama_pptkd'] = array('Nama PPTKD',100,TRUE,'left',2);
    $colModel['pagu'] = array('Pagu',100,TRUE,'left',2);
    $colModel['keluaran'] = array('Keluaran',100,TRUE,'left',2);
    $colModel['tgl_data_anggaran'] = array('Tanggal',100,TRUE,'left',2);
        $colModel['aksi'] = array('AKSI',50,FALSE,'center',0);

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

        $grid_js = build_grid_js('flex1',site_url('datapenduduk/c_data_anggaran/load_data'),$colModel,'id_data_anggaran','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'DATA ANGGARAN';
		$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
        $data['content'] = $this->load->view('data_anggaran/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {

		$this->load->library('flexigrid');
        $valid_fields = array('id_data_anggaran','bidang_kegiatan','nama_desa','lokasi','waktu','nama_pptkd','pagu','keluaran','tgl_data_anggaran');

		$this->flexigrid->validate_post('id_data_anggaran','ASC',$valid_fields);
		$records = $this->m_data_anggaran->get_data_anggaran_flexigrid();

		$this->output->set_header($this->config->item('json_header'));

		$record_items = array();

    $count=0;
		foreach ($records['records']->result() as $row)
		{
      $count++;
			$record_items[] = array(
  			$row->id_data_anggaran,
        $count,
				$row->bidang_kegiatan,
				$row->nama_desa,
				$row->lokasi,
				$row->waktu,
				$row->nama_pptkd,
				"Rp. ".number_format($row->pagu, 0,",","."),
				$row->keluaran,
				date('d-m-Y', strtotime($row->tgl_data_anggaran)),
//				'<input type="button" value="Edit" class="ubah" onclick="edit_gizi_buruk(\''.$row->id_gizi_buruk.'\')"/>'
        '<button type="submit" class="btn btn-default btn-xs" title="Edit Data Bidang & Kegiatan" onclick="edit_data_anggaran(\''.$row->id_data_anggaran.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah DATA ANGGARAN';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('data_anggaran/v_tambah', $data, TRUE);

			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');

    }

	function simpan_data_anggaran() {

		$id_bidang_kegiatan = $this->input->post('id_bidang_kegiatan', TRUE);
    $this->form_validation->set_rules('id_bidang_kegiatan', 'Bidang & Kegiatan', 'required');

    $lokasi = $this->input->post('lokasi', TRUE);
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

    $waktu = $this->input->post('waktu', TRUE);
    $this->form_validation->set_rules('waktu', 'Waktu', 'required');

    $nama_pptkd = $this->input->post('nama_pptkd', TRUE);
    $this->form_validation->set_rules('nama_pptkd', 'Nama PPTKD', 'required');

    $pagu = $this->input->post('pagu', TRUE);
    $this->form_validation->set_rules('pagu', 'Pagu', 'required');

    $keluaran = $this->input->post('keluaran', TRUE);
    $this->form_validation->set_rules('keluaran', 'Keluaran', 'required');

		if ($this->form_validation->run() == TRUE)
		{
				$data = array(
          'id_bidang_kegiatan' => $id_bidang_kegiatan,
  				'lokasi' => $lokasi,
          'waktu' => $waktu,
          'nama_pptkd' => $nama_pptkd,
  				'pagu' => str_replace(".", "", substr($pagu, 4)),
          'keluaran' => $keluaran,
          'tgl_data_anggaran' => date('Y-m-d')
				);

				$this->m_data_anggaran->insertdata_anggaran($data);
				redirect('datapenduduk/c_data_anggaran','refresh');
			/* Handle ketika nomer gizi_buruk telah digunakan */
    }
		else $this->add();
    }

    function edit($id){
		$session['hasil'] = $this->session->userdata('logged_in');
		$role = $session['hasil']->role;
		if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
		{
			$data['hasil']		= $this->m_data_anggaran->getdata_anggaranByIddata_anggaran($id);
			$data['page_title'] = 'Edit DATA ANGGARAN';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('data_anggaran/v_ubah', $data, TRUE);

			$this->load->view('utama', $data);

    }
      else redirect('c_login', 'refresh');
    }

	function update_data_anggaran() {

		$id_data_anggaran = $this->input->post('id_data_anggaran', TRUE);

    $id_bidang_kegiatan = $this->input->post('id_bidang_kegiatan', TRUE);

    $lokasi = $this->input->post('lokasi', TRUE);

    $waktu = $this->input->post('waktu', TRUE);

    $nama_pptkd = $this->input->post('nama_pptkd', TRUE);

    $pagu = $this->input->post('pagu', TRUE);

    $keluaran = $this->input->post('keluaran', TRUE);

		// if ($this->form_validation->run() == TRUE)
		// {
        $data = array(
          'id_bidang_kegiatan' => $id_bidang_kegiatan,
          'lokasi' => $lokasi,
          'waktu' => $waktu,
          'nama_pptkd' => $nama_pptkd,
          'pagu' => str_replace(".", "", substr($pagu, 4)),
          'keluaran' => $keluaran
        );

		  	$result = $this->m_data_anggaran->updatedata_anggaran(array('id_data_anggaran' => $id_data_anggaran), $data);

		  	redirect('datapenduduk/c_data_anggaran','refresh');
		// }
		// else $this->edit($id_bidang_kegiatan);
    }

	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_data_anggaran->deletedata_anggaran($id);
            $sucess++;
        }

        redirect('admin/c_data_anggaran', 'refresh');
    }

    public function cari_bidang_kegiatan()
  	{
  		// tangkap variabel keyword dari URL
  		$keyword = $this->uri->segment(4);

  		// cari di database
      $this->db->join('ref_desa','ref_desa.id_desa=tbl_bidang_kegiatan.id_desa');
  		$data = $this->db->from('tbl_bidang_kegiatan')->like('bidang_kegiatan',$keyword)->get();

  		// format keluaran di dalam array
  		foreach($data->result() as $row)
  		{
  			$arr['query'] = $keyword;
  			$arr['suggestions'][] = array(
  				'value'	=>$row->bidang_kegiatan,
  				'id_bidang_kegiatan'	=>$row->id_bidang_kegiatan,
          'nama_desa'	=>$row->nama_desa

  			);
  		}
  		// minimal PHP 5.2
  		echo json_encode($arr);
  	}

}
?>
