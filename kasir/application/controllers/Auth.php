<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_model');
   }

   // -------------------------------------------------------------------------
   public function login()
   {
      cek_already_login();
      $this->load->view('login');
   }

   // -------------------------------------------------------------------------
   public function process()
   {
      $post = $this->input->post(null, TRUE);

      if (isset($post['login'])) {
         $query = $this->User_model->login($post);
         if ($query->num_rows() > 0) {
            $row     = $query->row();
            $params  = [
               'userid' => $row->user_id,
               'level'  => $row->level
            ];
            $this->session->set_userdata($params);
            $this->session->set_flashdata('pesan_login', 'Berhasil Login');
            redirect('dashboard');
         } else {
            $this->session->set_flashdata('error_login', 'Username/Password Salah!');
            redirect('auth/login');
         }
      }
   }

   // -------------------------------------------------------------------------
   public function logout()
   {
      $params = ['userid', 'level'];
      $this->session->unset_userdata($params);
      $this->session->set_flashdata('pesan_logout', 'Berhasil Logout');
      redirect('auth/login');
   }
}
