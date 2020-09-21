<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_lap_anggaran extends CI_Controller {

    function  __construct()
    {
		parent::__construct();

        //Load flexigrid helper and library
        $this->load->helper('flexigrid_helper');
        $this->load->library('flexigrid');
        $this->load->helper('form');
        $this->load->model('m_pendapatan');

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

        $data['page_title'] = 'CETAK DATA PENGANGGARAN';
		    $data['menu'] = $this->load->view('menu/v_pengelolaData', $data, TRUE);
        $data['content'] = $this->load->view('lap_anggaran/v_list', $data, TRUE);
        $this->load->view('utama', $data);

        if (isset($_POST['cetak_pendapatan'])) {
            $tgl1 = $_POST['tgl_pendapatan'];
            $tgl2 = $_POST['tgl_pendapatan2'];

            if ($tgl1 == '' or $tgl2 == '') {
                redirect('datapenduduk/c_lap_anggaran');
            }else{
                redirect("datapenduduk/c_lap_anggaran/pendapatan/$tgl1/$tgl2");
            }
        }

        if (isset($_POST['cetak_belanja'])) {
            $tgl1 = $_POST['tgl_belanja'];
            $tgl2 = $_POST['tgl_belanja2'];

            if ($tgl1 == '' or $tgl2 == '') {
                redirect('datapenduduk/c_lap_anggaran');
            }else{
                redirect("datapenduduk/c_lap_anggaran/belanja/$tgl1/$tgl2");
            }
        }

        if (isset($_POST['cetak_pembiayaan'])) {
            $tgl1 = $_POST['tgl_pembiayaan'];
            $tgl2 = $_POST['tgl_pembiayaan2'];

            if ($tgl1 == '' or $tgl2 == '') {
                redirect('datapenduduk/c_lap_anggaran');
            }else{
                redirect("datapenduduk/c_lap_anggaran/pembiayaan/$tgl1/$tgl2");
            }
        }
    }

    public function pendapatan($tgl1='',$tgl2='')
    {
      $session['hasil'] = $this->session->userdata('logged_in');
  		$role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
  		{
        if ($tgl1 == '' or $tgl2 == '') {
            redirect('datapenduduk/c_lap_anggaran');
        }

        $tgl1 = date('Y-m-d', strtotime($tgl1));
        $tgl2 = date('Y-m-d', strtotime($tgl2));

        $query = $this->db->query("SELECT * FROM tbl_pendapatan
                                  INNER JOIN ref_desa ON ref_desa.id_desa=tbl_pendapatan.id_desa
                                  WHERE tgl_pendapatan BETWEEN '$tgl1' AND '$tgl2'
                                  ORDER BY tgl_pendapatan ASC");

        $total = $this->db->query("SELECT SUM(tbl_pendapatan.anggaran) as t_anggaran, SUM(tbl_pendapatan.anggaran) as t_anggaranpak, SUM(tbl_pendapatan.jumlah) as t_jumlah  FROM tbl_pendapatan
                                  INNER JOIN ref_desa ON ref_desa.id_desa=tbl_pendapatan.id_desa
                                  WHERE tgl_pendapatan BETWEEN '$tgl1' AND '$tgl2'
                                  ORDER BY tgl_pendapatan ASC")->row();


        $data['page_title'] = 'CETAK DATA ANGGARAN PENDAPATAN';
        $data['v_pendapatan'] = $query;
        $data['v_total'] = $total;
        $this->load->view('lap_anggaran/v_pendapatan', $data);

  		}else{
  			redirect('c_login', 'refresh');
      }
    }


    public function belanja($tgl1='',$tgl2='')
    {
      $session['hasil'] = $this->session->userdata('logged_in');
  		$role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
  		{
        if ($tgl1 == '' or $tgl2 == '') {
            redirect('datapenduduk/c_lap_anggaran');
        }

        $tgl1 = date('Y-m-d', strtotime($tgl1));
        $tgl2 = date('Y-m-d', strtotime($tgl2));

        $query = $this->db->query("SELECT * FROM tbl_belanja
                                  INNER JOIN ref_desa ON ref_desa.id_desa=tbl_belanja.id_desa
                                  INNER JOIN tbl_bidang_kegiatan ON tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_belanja.id_bidang_kegiatan
                                  WHERE tgl_belanja BETWEEN '$tgl1' AND '$tgl2'
                                  ORDER BY tgl_belanja ASC");

        $total = $this->db->query("SELECT SUM(tbl_belanja.anggaran) as t_anggaran, SUM(tbl_belanja.anggaran) as t_anggaranpak, SUM(tbl_belanja.jumlah) as t_jumlah, SUM(tbl_belanja.harga_satuan) as t_harga_satuan FROM tbl_belanja
                                  INNER JOIN ref_desa ON ref_desa.id_desa=tbl_belanja.id_desa
                                  INNER JOIN tbl_bidang_kegiatan ON tbl_bidang_kegiatan.id_bidang_kegiatan=tbl_belanja.id_bidang_kegiatan
                                  WHERE tgl_belanja BETWEEN '$tgl1' AND '$tgl2'
                                  ORDER BY tgl_belanja ASC")->row();


        $data['page_title'] = 'CETAK DATA ANGGARAN BELANJA';
        $data['v_belanja'] = $query;
        $data['v_total'] = $total;
        $this->load->view('lap_anggaran/v_belanja', $data);

  		}else{
  			redirect('c_login', 'refresh');
      }
    }

    public function pembiayaan($tgl1='',$tgl2='')
    {
      $session['hasil'] = $this->session->userdata('logged_in');
  		$role = $session['hasil']->role;
      if($this->session->userdata('logged_in') AND $role == 'Pengelola Data')
  		{
        if ($tgl1 == '' or $tgl2 == '') {
            redirect('datapenduduk/c_lap_anggaran');
        }

        $tgl1 = date('Y-m-d', strtotime($tgl1));
        $tgl2 = date('Y-m-d', strtotime($tgl2));

        $query = $this->db->query("SELECT * FROM tbl_pembiayaan
                                  INNER JOIN ref_desa ON ref_desa.id_desa=tbl_pembiayaan.id_desa
                                  WHERE tgl_pembiayaan BETWEEN '$tgl1' AND '$tgl2'
                                  ORDER BY tgl_pembiayaan ASC");

        $total = $this->db->query("SELECT SUM(tbl_pembiayaan.anggaran) as t_anggaran, SUM(tbl_pembiayaan.anggaran) as t_anggaranpak, SUM(tbl_pembiayaan.jumlah) as t_jumlah FROM tbl_pembiayaan
                                  INNER JOIN ref_desa ON ref_desa.id_desa=tbl_pembiayaan.id_desa
                                  WHERE tgl_pembiayaan BETWEEN '$tgl1' AND '$tgl2'
                                  ORDER BY tgl_pembiayaan ASC")->row();


        $data['page_title'] = 'CETAK DATA ANGGARAN PEMBIAYAAN';
        $data['v_pembiayaan'] = $query;
        $data['v_total'] = $total;
        $this->load->view('lap_anggaran/v_pembiayaan', $data);

  		}else{
  			redirect('c_login', 'refresh');
      }
    }

}
?>
