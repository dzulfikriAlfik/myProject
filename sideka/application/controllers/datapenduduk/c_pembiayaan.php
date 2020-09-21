<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_pembiayaan extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_pembiayaan');

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
		$this->excel_generator->getActiveSheet()->setCellValue('A1', 'Data Pembiayaan');
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
		$this->excel_generator->set_header(array('ID Pembiayaan', 'Nama Rincian'));
		$this->excel_generator->set_column(array('id_pembiayaan', 'nama_rincian'));
        $this->excel_generator->set_width(array(15, 20, 20, 15, 15, 20));

        $this->excel_generator->exportTo2007('Data Pembiayaan');
	}

    function lists() {
        $colModel['id_pembiayaan'] = array('No.',20,TRUE,'left',0);
		$colModel['nama_desa'] = array('Nama Desa',200,TRUE,'left',2);
		$colModel['nama_rincian'] = array('Nama Rincian',250,TRUE,'left',2);
		$colModel['jenis_pembiayaan'] = array('Jenis Pembiayaan',250,TRUE,'left',2);
		$colModel['obyek_pembiayaan'] = array('Obyek Pembiayaan',250,TRUE,'left',2);
		$colModel['anggaran'] = array('Anggaran',100,TRUE,'left',2);
		$colModel['anggaranpak'] = array('Perubahan',100,TRUE,'left',2);
		$colModel['jumlah'] = array('Jumlah',100,TRUE,'left',2);
		$colModel['nama_rek'] = array('Nama Rekening',100,TRUE,'left',2);
		$colModel['tgl_pembiayaan'] = array('Tanggal',100,TRUE,'left',2);
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

        $grid_js = build_grid_js('flex1',site_url('datapenduduk/c_pembiayaan/load_data'),$colModel,'id_pembiayaan','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'DATA Pembiayaan';
		$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
        $data['content'] = $this->load->view('pembiayaan/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {

		$this->load->library('flexigrid');
        $valid_fields = array('id_pembiayaan','nama_desa','nama_rincian','jenis_pembiayaan','obyek_pembiayaan','anggaran','anggaranpak','jumlah','nama_rek','tgl_pembiayaan');

		$this->flexigrid->validate_post('id_pembiayaan','ASC',$valid_fields);
		$records = $this->m_pembiayaan->get_pembiayaan_flexigrid();

		$this->output->set_header($this->config->item('json_header'));

		$record_items = array();

    $count=0;
		foreach ($records['records']->result() as $row)
		{
      $count++;
			$record_items[] = array(
  			$row->id_pembiayaan,
        $count,
        $row->nama_desa,
				$row->nama_rincian,
				$row->jenis_pembiayaan,
				$row->obyek_pembiayaan,
        "Rp. ".number_format($row->anggaran,0,",","."),
				"Rp. ".number_format($row->anggaranpak,0,",","."),
        "Rp. ".number_format($row->jumlah,0,",","."),
        $row->nama_rek,
        date('d-m-Y', strtotime($row->tgl_pembiayaan)),
//				'<input type="button" value="Edit" class="ubah" onclick="edit_gizi_buruk(\''.$row->id_gizi_buruk.'\')"/>'
        '<button type="submit" class="btn btn-default btn-xs" title="Edit Data Pembiayaan" onclick="edit_pembiayaan(\''.$row->id_pembiayaan.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah Pembiayaan';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('pembiayaan/v_tambah', $data, TRUE);

			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');

    }

	function simpan_pembiayaan() {

    $id_desa = $this->input->post('id_desa', TRUE);
    $this->form_validation->set_rules('id_desa', 'Nama Desa', 'required');

		$nama_rincian = $this->input->post('nama_rincian', TRUE);
    $this->form_validation->set_rules('nama_rincian', 'Nama Rincian', 'required');

    $jenis_pembiayaan = $this->input->post('jenis_pembiayaan', TRUE);
    $this->form_validation->set_rules('jenis_pembiayaan', 'Jenis Pembiayaan', 'required');

    $obyek_pembiayaan = $this->input->post('obyek_pembiayaan', TRUE);
    $this->form_validation->set_rules('obyek_pembiayaan', 'Obyek Pembiayaan', 'required');

    $anggaran = $this->input->post('anggaran', TRUE);
    $this->form_validation->set_rules('anggaran', 'Anggaran', 'required');

    $anggaranpak = $this->input->post('anggaranpak', TRUE);
    $this->form_validation->set_rules('anggaranpak', 'Anggaran PAK', 'required');

    $nama_rek = $this->input->post('nama_rek', TRUE);
    $this->form_validation->set_rules('nama_rek', 'Nama Rekening', 'required');

		if ($this->form_validation->run() == TRUE)
		{
      if ($id_desa != '') {
        $jumlah = str_replace(".", "", substr($anggaran, 4)) + str_replace(".", "", substr($anggaranpak, 4));
				$data = array(
          'id_desa' => $id_desa,
          'nama_rincian' => $nama_rincian,
          'jenis_pembiayaan' => $jenis_pembiayaan,
          'obyek_pembiayaan' => $obyek_pembiayaan,
          'anggaran' => str_replace(".", "", substr($anggaran, 4)),
          'anggaranpak' => str_replace(".", "", substr($anggaranpak, 4)),
          'jumlah' => $jumlah,
          'nama_rek' => $nama_rek,
          'tgl_pembiayaan' => date('Y-m-d')
				);

				$this->m_pembiayaan->insertpembiayaan($data);
				redirect('datapenduduk/c_pembiayaan','refresh');
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
			$data['hasil']		= $this->m_pembiayaan->getpembiayaanByIdpembiayaan($id);
			$data['page_title'] = 'Edit Data Pembiayaan';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('pembiayaan/v_ubah', $data, TRUE);

			$this->load->view('utama', $data);

    }
      else redirect('c_login', 'refresh');
    }

	function update_pembiayaan() {

		$id_pembiayaan = $this->input->post('id_pembiayaan', TRUE);

    $id_desa = $this->input->post('id_desa', TRUE);

		$nama_rincian = $this->input->post('nama_rincian', TRUE);

    $jenis_pembiayaan = $this->input->post('jenis_pembiayaan', TRUE);

    $obyek_pembiayaan = $this->input->post('obyek_pembiayaan', TRUE);

    $anggaran = $this->input->post('anggaran', TRUE);

    $anggaranpak = $this->input->post('anggaranpak', TRUE);

    $nama_rek = $this->input->post('nama_rek', TRUE);


		 if ($id_desa != '')
		 {
       $jumlah = str_replace(".", "", substr($anggaran, 4)) + str_replace(".", "", substr($anggaranpak, 4));
       $data = array(
         'id_desa' => $id_desa,
         'nama_rincian' => $nama_rincian,
         'jenis_pembiayaan' => $jenis_pembiayaan,
         'obyek_pembiayaan' => $obyek_pembiayaan,
         'anggaran' => str_replace(".", "", substr($anggaran, 4)),
         'anggaranpak' => str_replace(".", "", substr($anggaranpak, 4)),
         'jumlah' => $jumlah,
         'nama_rek' => $nama_rek
       );

		  	$result = $this->m_pembiayaan->updatepembiayaan(array('id_pembiayaan' => $id_pembiayaan), $data);

		  	redirect('datapenduduk/c_pembiayaan','refresh');
		 }
		 else $this->edit($id_pembiayaan);
    }

	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_pembiayaan->deletepembiayaan($id);
            $sucess++;
        }

        redirect('admin/c_pembiayaan', 'refresh');
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
