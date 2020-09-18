<?php

class Nilai extends CI_Controller
{

   public function index()
   {
      $data = [
         'nim'          => set_value('nim'),
         'id_thn_aka'   => set_value('id_thn_aka')
      ];

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/masuk_khs', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('id_thn_aka', 'id tahun akademik', 'required');
      $this->form_validation->set_rules('nim', 'NIM', 'required', ['required' => 'NIM harus diisi']);
      $this->form_validation->set_rules('kode_matakuliah', 'Kode Matakuliah', 'required', ['required' => 'Kode Matakuliah harus diisi']);
   }

   public function _rulesKhs()
   {
      $this->form_validation->set_rules('nim', 'NIM', 'required', ['required' => 'NIM harus diisi']);
      $this->form_validation->set_rules('id_thn_aka', 'id tahun akademik', 'required');
   }

   public function _rulesInputNilai()
   {
      $this->form_validation->set_rules('kode_matakuliah', 'Kode Mata kuliah', 'required', ['required' => 'Kode mata kuliah harus diisi']);
      $this->form_validation->set_rules('id_thn_aka', 'id tahun akademik', 'required', ['required' => 'Tahun Akademik harus diisi']);
   }

   public function nilai_aksi()
   {
      $this->_rulesKhs();

      if ($this->form_validation->run() == FALSE) {
         $this->index();
      } else {
         $nim           = $this->input->post('nim', TRUE);
         $id_thn_aka    = $this->input->post('id_thn_aka', TRUE);

         $query =
            "SELECT 
               krs.id_thn_aka,
               krs.kode_matakuliah,
               matakuliah.nama_matakuliah,
               matakuliah.sks,
               krs.nilai
               FROM 
                  krs INNER JOIN matakuliah
               ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
               WHERE krs.nim = '$nim' AND krs.id_thn_aka = '$id_thn_aka'
               ";
         $sql        = $this->db->query($query)->result();
         $smt        = $this->db->select('tahun_akademik, semester')
            ->from('tahun_akademik')
            ->where(['id_thn_aka' => $id_thn_aka])->get()->row();
         $query_str  = "SELECT 
                        mahasiswa.nim,
                        mahasiswa.nama_lengkap,
                        prodi.nama_prodi
                        FROM
                        mahasiswa INNER JOIN prodi
                        ON (mahasiswa.nama_prodi = prodi.nama_prodi)
                        ";
         $mhs        = $this->db->query($query_str)->row();

         if ($smt->semester == 'Ganjil') {
            $tampilSemester = 'Ganjil';
         } else {
            $tampilSemester = 'Genap';
         }

         $data = [
            'mhs_data'  => $sql,
            'mhs_nim'   => $nim,
            'mhs_nama'  => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
            'mhs_prodi' => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
            'thn_aka'   => $smt->tahun_akademik . "(" . $tampilSemester . ")"
         ];

         $this->load->view('templates_administrator/header');
         $this->load->view('templates_administrator/sidebar');
         $this->load->view('administrator/khs', $data);
         $this->load->view('templates_administrator/footer');
      }
   }

   public function input_nilai()
   {
      $data = [
         'kode_matakuliah'    => set_value('kode_matakuliah'),
         'id_thn_aka'         => set_value('id_thn_aka')
      ];

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/input_nilai_form', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function input_nilai_aksi()
   {
      $this->_rulesInputNilai();

      if ($this->form_validation->run() == FALSE) {
         $this->input_nilai();
      } else {
         $kode_matakuliah  = $this->input->post('kode_matakuliah', TRUE);
         $id_thn_aka       = $this->input->post('id_thn_aka', TRUE);

         $this->db->select('k.id_krs, k.nim, m.nama_lengkap, k.nilai, d.nama_matakuliah');
         $this->db->from('krs as k');
         $this->db->join('mahasiswa as m', 'm.nim = k.nim');
         $this->db->join('matakuliah as d', 'k.kode_matakuliah = d.kode_matakuliah');
         $this->db->where('k.id_thn_aka', $id_thn_aka);
         $this->db->where('k.kode_matakuliah', $kode_matakuliah);

         $query = $this->db->get()->result();

         $data = [
            'list_nilai'         => $query,
            'kode_matakuliah'    => $kode_matakuliah,
            'id_thn_aka'         => $id_thn_aka
         ];

         $this->load->view('templates_administrator/header');
         $this->load->view('templates_administrator/sidebar');
         $this->load->view('administrator/form_nilai', $data);
         $this->load->view('templates_administrator/footer');
      }
   }

   public function simpan_nilai()
   {
      $query   = [];
      $id_krs  = $_POST['id_krs'];
      $nilai   = $_POST['nilai'];

      for ($i = 0; $i < count($id_krs); $i++) {
         $this->db->set('nilai', $nilai[$i])->where('id_krs', $id_krs[$i])->update('krs');
      }

      $data = [
         'id_krs' => $id_krs
      ];

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/daftar_nilai', $data);
      $this->load->view('templates_administrator/footer');
   }
}
