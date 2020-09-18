<?php

class matakuliah extends CI_Controller
{

   public function index()
   {
      $data['matakuliah'] = $this->matakuliah_model->tampil_data('matakuliah')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/matakuliah', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function tambah_matakuliah()
   {
      $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/matakuliah_form', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function tambah_matakuliah_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah_matakuliah();
      } else {
         $kode_matakuliah  = $this->input->post('kode_matakuliah');
         $nama_matakuliah  = $this->input->post('nama_matakuliah');
         $sks              = $this->input->post('sks');
         $semester         = $this->input->post('semester');
         $nama_prodi       = $this->input->post('nama_prodi');

         $data = [
            'kode_matakuliah' => $kode_matakuliah,
            'nama_matakuliah' => $nama_matakuliah,
            'sks'             => $sks,
            'semester'        => $semester,
            'nama_prodi'      => $nama_prodi
         ];

         $this->matakuliah_model->insert_data($data, 'matakuliah');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data mata kuliah berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/matakuliah');
      }
   }

   public function _rules()
   {
      $this->form_validation->set_rules('kode_matakuliah', 'Kode Matakuliah', 'required', [
         'required' => 'Kode matakuliah harus diisi'
      ]);
      $this->form_validation->set_rules('nama_matakuliah', 'Nama Matakuliah', 'required', [
         'required' => 'Nama matakuliah harus diisi'
      ]);
      $this->form_validation->set_rules('sks', 'SKS', 'required', [
         'required' => 'SKS harus diisi'
      ]);
      $this->form_validation->set_rules('semester', 'Semester', 'required', [
         'required' => 'Semester harus diisi'
      ]);
      $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required', [
         'required' => 'Nama Prodi harus diisi'
      ]);
   }

   public function detail($kode)
   {
      $data['detail'] = $this->matakuliah_model->ambil_kode_matakuliah($kode);

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/matakuliah_detail', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update($id)
   {
      $where = ['kode_matakuliah' => $id];

      $data['matakuliah']  = $this->db->query("SELECT * FROM matakuliah mk, prodi prd WHERE mk.nama_prodi = prd.nama_prodi AND mk.kode_matakuliah = '$id' ")->result();
      $data['prodi']       = $this->matakuliah_model->tampil_data('prodi')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/matakuliah_update', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update_aksi()
   {
      $this->_rules();

      $id = $this->input->post('id_matakuliah');

      if ($this->form_validation->run() == FALSE) {
         $this->update($id);
      } else {
         $data = [
            'kode_matakuliah' => $this->input->post('kode_matakuliah'),
            'nama_matakuliah' => $this->input->post('nama_matakuliah'),
            'sks'             => $this->input->post('sks'),
            'semester'        => $this->input->post('semester'),
            'nama_prodi'      => $this->input->post('nama_prodi')
         ];

         $where = ['id_matakuliah' => $id];

         $this->matakuliah_model->update_data($where, $data, 'matakuliah');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data mata kuliah berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/matakuliah');
      }
   }

   public function delete($id)
   {
      $where = ['id_matakuliah' => $id];
      $this->matakuliah_model->hapus_data($where, 'matakuliah');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data matakuliah berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/matakuliah');
   }
}
