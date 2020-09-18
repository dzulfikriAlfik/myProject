<?php

class Informasi extends CI_Controller
{

   public function index()
   {
      $data['informasi'] = $this->informasi_model->tampil_data('informasi')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/informasi', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function tambah_informasi()
   {
      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/informasi_form');
      $this->load->view('templates_administrator/footer');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('icon', 'Icon', 'required', [
         'required' => 'Icon harus diisi'
      ]);
      $this->form_validation->set_rules('judul_informasi', 'Judul Informasi', 'required', [
         'required' => 'Judul Informasi harus diisi'
      ]);
      $this->form_validation->set_rules('isi_informasi', 'Isi Informasi', 'required', [
         'required' => 'Isi Informasi harus diisi'
      ]);
   }

   public function tambah_informasi_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah_informasi();
      } else {
         $id_informasi     = $this->input->post('id_informasi');
         $icon             = $this->input->post('icon');
         $judul_informasi  = $this->input->post('judul_informasi');
         $isi_informasi    = $this->input->post('isi_informasi');

         $data = [
            'id_informasi'       => $id_informasi,
            'icon'               => $icon,
            'judul_informasi'    => $judul_informasi,
            'isi_informasi'      => $isi_informasi
         ];

         $this->informasi_model->insert_data($data, 'informasi');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data informasi berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/informasi');
      }
   }

   public function update($id)
   {
      $data['informasi'] = $this->informasi_model->ambil_id_informasi($id);

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/informasi_update', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update_informasi_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->update($this->input->post('id_informasi'));
      } else {
         $id_informasi     = $this->input->post('id_informasi');
         $icon             = $this->input->post('icon');
         $judul_informasi  = $this->input->post('judul_informasi');
         $isi_informasi    = $this->input->post('isi_informasi');

         $data = [
            'id_informasi'       => $id_informasi,
            'icon'               => $icon,
            'judul_informasi'    => $judul_informasi,
            'isi_informasi'      => $isi_informasi
         ];

         $where = ['id_informasi' => $id_informasi];

         $this->informasi_model->update_data($where, $data, 'informasi');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data informasi berhasil diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/informasi');
      }
   }

   public function delete($id)
   {
      $where = ['id_informasi' => $id];
      $this->informasi_model->hapus_data($where, 'informasi');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data informasi berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/informasi');
   }
}
