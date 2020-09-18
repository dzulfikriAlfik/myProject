<?php

class Hubungi_kami extends CI_Controller
{

   public function index()
   {
      $data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/hubungi_kami', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function kirim_email($id)
   {
      $where = ['id_hubungi' => $id];
      $data['hubungi'] = $this->hubungi_model->kirim_data($where, 'hubungi')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/form_kirim_email', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function kirim_email_aksi()
   {
      $config = [
         'protocol'  => 'smtp',
         'smtp_host' => 'ssl://smtp.googlemail.com',
         'smtp_user' => 'latihan.programming.alfik@gmail.com',
         'smtp_pass' => '114306666hafidz',
         'smtp_port' => 465,
         'mailtype'  => 'html',
         'charset'   => 'utf-8',
         'newline'   => "\r\n"
      ];

      $this->load->library('email', $config);
      $this->email->initialize($config);
      $this->email->from('alfikperfect@gmail.com', 'Dzulfikri Alkautsari');
      $this->email->to($this->input->post('email'));
      $this->email->subject($this->input->post('subject'));
      $this->email->message($this->input->post('pesan'));

      if ($this->email->send()) {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pesan Terkirim<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/hubungi_kami');
      } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Pesan Gagal Terkirim!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/hubungi_kami');
      }
   }
}
