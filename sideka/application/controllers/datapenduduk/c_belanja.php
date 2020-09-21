<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_belanja extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_belanja');

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
		$this->excel_generator->getActiveSheet()->setCellValue('A1', 'Data Belanja');
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
		$this->excel_generator->set_header(array('ID Belanja', 'Uraian'));
		$this->excel_generator->set_column(array('id_belanja', 'uraian'));
        $this->excel_generator->set_width(array(15, 20, 20, 15, 15, 20));

        $this->excel_generator->exportTo2007('Data Belanja');
	}

    function lists() {
        $colModel['id_belanja'] = array('No.',20,TRUE,'left',0);
		$colModel['nama_desa'] = array('Nama Desa',200,TRUE,'left',2);
		$colModel['bidang_kegiatan'] = array('Uraian',250,TRUE,'left',2);
		$colModel['anggaran'] = array('Anggaran',100,TRUE,'left',2);
		$colModel['anggaranpak'] = array('Perubahan',100,TRUE,'left',2);
		$colModel['jumlah'] = array('Jumlah',100,TRUE,'left',2);
		$colModel['jumlah_satuan'] = array('Jumlah Satuan',100,TRUE,'left',2);
		$colModel['harga_satuan'] = array('Harga Satuan',100,TRUE,'left',2);
		$colModel['sumber_dana'] = array('Sumber Dana',100,TRUE,'left',2);
		$colModel['nama_rek'] = array('Nama Rekening',100,TRUE,'left',2);
		$colModel['tgl_belanja'] = array('Tanggal',100,TRUE,'left',2);
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

        $grid_js = build_grid_js('flex1',site_url('datapenduduk/c_belanja/load_data'),$colModel,'id_belanja','asc',$gridParams,$buttons);

		$data['js_grid'] = $grid_js;

        $data['page_title'] = 'DATA Belanja';
		$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
        $data['content'] = $this->load->view('belanja/v_list', $data, TRUE);
        $this->load->view('utama', $data);
    }

    function load_data() {

		$this->load->library('flexigrid');
        $valid_fields = array('id_belanja','nama_desa','bidang_kegiatan','anggaran','anggaranpak','jumlah','jumlah_satuan','harga_satuan','sumber_dana','nama_rek','tgl_belanja');

		$this->flexigrid->validate_post('id_belanja','ASC',$valid_fields);
		$records = $this->m_belanja->get_belanja_flexigrid();

		$this->output->set_header($this->config->item('json_header'));

		$record_items = array();

    $count=0;
		foreach ($records['records']->result() as $row)
		{
      $count++;
			$record_items[] = array(
  			$row->id_belanja,
        $count,
        $row->nama_desa,
				$row->bidang_kegiatan,
        "Rp. ".number_format($row->anggaran,0,",","."),
				"Rp. ".number_format($row->anggaranpak,0,",","."),
        "Rp. ".number_format($row->jumlah,0,",","."),
        $row->jumlah_satuan,
        "Rp. ".number_format($row->harga_satuan,0,",","."),
        $row->sumber_dana,
        $row->nama_rek,
        date('d-m-Y', strtotime($row->tgl_belanja)),
//				'<input type="button" value="Edit" class="ubah" onclick="edit_gizi_buruk(\''.$row->id_gizi_buruk.'\')"/>'
        '<button type="submit" class="btn btn-default btn-xs" title="Edit Data Belanja" onclick="edit_belanja(\''.$row->id_belanja.'\')"/><i class="fa fa-pencil"></i></button>'
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
			$data['page_title'] = 'Tambah Belanja';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('belanja/v_tambah', $data, TRUE);

			$this->load->view('utama', $data);
		}else
			redirect('c_login', 'refresh');

    }

	function simpan_belanja() {

    $id_desa = $this->input->post('id_desa', TRUE);
    $this->form_validation->set_rules('id_desa', 'Nama Desa', 'required');

		$id_bidang_kegiatan = $this->input->post('id_bidang_kegiatan', TRUE);
    $this->form_validation->set_rules('id_bidang_kegiatan', 'Nama Bidang & Kegiatan', 'required');

    $anggaran = $this->input->post('anggaran', TRUE);
    $this->form_validation->set_rules('anggaran', 'Anggaran', 'required');

    $anggaranpak = $this->input->post('anggaranpak', TRUE);
    $this->form_validation->set_rules('anggaranpak', 'Anggaran PAK', 'required');

    $jumlah_satuan = $this->input->post('jumlah_satuan', TRUE);
    $this->form_validation->set_rules('jumlah_satuan', 'Jumlah Satuan', 'required');

    $harga_satuan = $this->input->post('harga_satuan', TRUE);
    $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required');

    $sumber_dana = $this->input->post('sumber_dana', TRUE);
    $this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'required');

    $nama_rek = $this->input->post('nama_rek', TRUE);
    $this->form_validation->set_rules('nama_rek', 'Nama Rekening', 'required');

		if ($this->form_validation->run() == TRUE)
		{
      if ($id_desa != '') {
        $jumlah = str_replace(".", "", substr($anggaran, 4)) + str_replace(".", "", substr($anggaranpak, 4));
				$data = array(
          'id_desa' => $id_desa,
          'id_bidang_kegiatan' => $id_bidang_kegiatan,
          'anggaran' => str_replace(".", "", substr($anggaran, 4)),
          'anggaranpak' => str_replace(".", "", substr($anggaranpak, 4)),
          'jumlah' => $jumlah,
          'jumlah_satuan' => $jumlah_satuan,
          'harga_satuan' => str_replace(".", "", substr($harga_satuan, 4)),
          'sumber_dana' => $sumber_dana,
          'nama_rek' => $nama_rek,
          'tgl_belanja' => date('Y-m-d')
				);

				$this->m_belanja->insertbelanja($data);
				redirect('datapenduduk/c_belanja','refresh');
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
			$data['hasil']		= $this->m_belanja->getbelanjaByIdbelanja($id);
			$data['page_title'] = 'Edit Data Belanja';
			$data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
			$data['content'] = $this->load->view('belanja/v_ubah', $data, TRUE);

			$this->load->view('utama', $data);

    }
      else redirect('c_login', 'refresh');
    }

	function update_belanja() {

		$id_belanja = $this->input->post('id_belanja', TRUE);

    $id_desa = $this->input->post('id_desa', TRUE);

    $id_bidang_kegiatan = $this->input->post('id_bidang_kegiatan', TRUE);

		$nama_rincian = $this->input->post('nama_rincian', TRUE);

    $anggaran = $this->input->post('anggaran', TRUE);

    $anggaranpak = $this->input->post('anggaranpak', TRUE);

    $jumlah_satuan = $this->input->post('jumlah_satuan', TRUE);

    $harga_satuan = $this->input->post('harga_satuan', TRUE);

    $sumber_dana = $this->input->post('sumber_dana', TRUE);

    $nama_rek = $this->input->post('nama_rek', TRUE);


		 if ($id_desa != '')
		 {
       $jumlah = str_replace(".", "", substr($anggaran, 4)) + str_replace(".", "", substr($anggaranpak, 4));
       $data = array(
         'id_desa' => $id_desa,
         'id_bidang_kegiatan' => $id_bidang_kegiatan,
         'anggaran' => str_replace(".", "", substr($anggaran, 4)),
         'anggaranpak' => str_replace(".", "", substr($anggaranpak, 4)),
         'jumlah' => $jumlah,
         'jumlah_satuan' => $jumlah_satuan,
         'harga_satuan' => str_replace(".", "", substr($harga_satuan, 4)),
         'sumber_dana' => $sumber_dana,
         'nama_rek' => $nama_rek
       );

		  	$result = $this->m_belanja->updatebelanja(array('id_belanja' => $id_belanja), $data);

		  	redirect('datapenduduk/c_belanja','refresh');
		 }
		 else $this->edit($id_belanja);
    }

	function delete()    {
        $post = explode(",", $this->input->post('items'));
        array_pop($post); $sucess=0;
        foreach($post as $id){
            $this->m_belanja->deletebelanja($id);
            $sucess++;
        }

        redirect('admin/c_belanja', 'refresh');
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


    public function cari_bidang_kegiatan()
    {
      // tangkap variabel keyword dari URL
      $keyword = $this->uri->segment(5);

      // cari di database
      $this->db->where('id_desa', $this->uri->segment(4));
      $data = $this->db->from('tbl_bidang_kegiatan')->like('bidang_kegiatan',$keyword)->get();

      // format keluaran di dalam array
      foreach($data->result() as $row)
      {
        $arr['query'] = $keyword;
        $arr['suggestions'][] = array(
          'value'	=>$row->bidang_kegiatan,
          'id_bidang_kegiatan'	=>$row->id_bidang_kegiatan

        );
      }
      // minimal PHP 5.2
      echo json_encode($arr);
    }

}
?>
