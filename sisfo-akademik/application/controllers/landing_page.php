<?php

class Landing_page extends CI_Controller
{
   public function index()
   {
      $data = [
         'identitas'       => $this->identitas_model->tampil_data('identitas')->row(),
         'tentang'         => $this->tentang_model->tampil_data('tentang_kampus')->row(),
         'informasi'       => $this->informasi_model->tampil_data('informasi')->result(),
         'hubungi'         => $this->hubungi_model->tampil_data('hubungi')->result()
      ];

      $this->load->view('templates_administrator/header');
      $this->load->view('landing_page', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('nama', 'Nama', 'required', [
         'required' => 'Nama harus diisi'
      ]);
      $this->form_validation->set_rules('email', 'Email', 'required', [
         'required' => 'Email harus diisi'
      ]);
      $this->form_validation->set_rules('pesan', 'Pesan', 'required', [
         'required' => 'Pesan harus diisi'
      ]);
   }

   public function kirim_pesan()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->index();
      } else {

         $data = [
            'nama'   => $this->input->post('nama'),
            'email'  => $this->input->post('email'),
            'pesan'  => $this->input->post('pesan')
         ];

         $this->hubungi_model->insert_data($data, 'hubungi');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pesan berhasil dikirim ke Admin<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('landing_page');
      }
   }
}
