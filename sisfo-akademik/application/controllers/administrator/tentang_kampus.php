<?php

class Tentang_kampus extends CI_Controller
{
   public function index()
   {
      $data['tentang'] = $this->tentang_model->tampil_data('tentang_kampus')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/tentang_kampus', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update($id)
   {
      $where = ['id_tentang' => $id];

      $data['tentang'] = $this->tentang_model->edit_data($where, 'tentang_kampus')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/tentang_kampus_update', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update_aksi()
   {
      $id = $this->input->post('id_tentang');
      $data = [
         'sejarah'   => $this->input->post('sejarah', TRUE),
         'visi'      => $this->input->post('visi', TRUE),
         'misi'      => $this->input->post('misi', TRUE)
      ];

      $where = ['id_tentang' => $id];

      $this->tentang_model->update_data($where, $data, 'tentang_kampus');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tentang Kampus berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/tentang_kampus');
   }
}
