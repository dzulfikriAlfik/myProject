<?php

class Tahun_akademik extends CI_Controller
{

   public function index()
   {
      $data['tahun_akademik'] = $this->tahunakademik_model->tampil_data('tahun_akademik')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/tahun_akademik', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function tambah_tahun_akademik()
   {
      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/tahun_akademik_form');
      $this->load->view('templates_administrator/footer');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required', [
         'required' => 'Tahun Akademik harus diisi'
      ]);
      $this->form_validation->set_rules('semester', 'Semester', 'required', [
         'required' => 'Semester harus diisi'
      ]);
      $this->form_validation->set_rules('status', 'Status', 'required', [
         'required' => 'Status harus diisi'
      ]);
   }

   public function tambah_tahun_akademik_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah_tahun_akademik();
      } else {
         $data = [
            'tahun_akademik'  => $this->input->post('tahun_akademik', TRUE),
            'semester'        => $this->input->post('semester', TRUE),
            'status'          => $this->input->post('status', TRUE)
         ];

         $this->tahunakademik_model->input_data($data, 'tahun_akademik');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data tahun akademik berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/tahun_akademik');
      }
   }

   public function update($id)
   {
      $where = ['id_thn_aka' => $id];
      $data['tahun_akademik'] = $this->tahunakademik_model->edit_data($where, 'tahun_akademik')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/tahun_akademik_update', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update_aksi()
   {
      $this->_rules();

      $id = $this->input->post('id');

      if ($this->form_validation->run() == FALSE) {
         $this->update($id);
      } else {
         $data = [
            'tahun_akademik'  => $this->input->post('tahun_akademik'),
            'semester'        => $this->input->post('semester'),
            'status'          => $this->input->post('status')
         ];

         $where = ['id_thn_aka' => $id];

         $this->tahunakademik_model->update_data($where, $data, 'tahun_akademik');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data tahun akademik berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/tahun_akademik');
      }
   }

   public function delete($id)
   {
      $where = ['id_thn_aka' => $id];

      $this->tahunakademik_model->hapus_data($where, 'tahun_akademik');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data tahun akademik berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/tahun_akademik');
   }
}
