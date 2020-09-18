<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('user_model');
      cek_not_login();
      check_role();
   }

   public function index()
   {
      $data = [
         'row'    => $this->user_model->get()->result_array(),
         'aktif'  => 'user',
         'menu'   => 'user',
      ];

      $this->template->load('template', 'user/user_data', $data);
   }

   public function _rules()
   {
      $this->form_validation->set_rules('fullname', 'Nama', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|min_length[7]|is_unique[user.username]');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
      $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|min_length[8]|matches[password]', [
         'matches' => 'Konfirmasi Password Harus sesuai dengan Password'
      ]);
      $this->form_validation->set_rules('level', 'Level', 'required');
      $this->form_validation->set_message('required', '%s Harus diisi!');
      $this->form_validation->set_message('min_length', '{field} harus diisi minimal {param} karakter.');
      $this->form_validation->set_message('is_unique', '%s sudah ada di database, silahkan pilih username lain.');
      // error delimiters
      $this->form_validation->set_error_delimiters('<span class="text-red small">', '</span>');
   }

   public function _rulesEdit()
   {
      $this->form_validation->set_rules('fullname', 'Nama', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|min_length[7]|callback_username_check');
      if ($this->input->post('password') || $this->input->post('passconf')) {
         $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
         $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|min_length[8]|matches[password]', [
            'matches' => 'Konfirmasi Password Harus sesuai dengan Password'
         ]);
      }
      $this->form_validation->set_rules('level', 'Level', 'required');
      $this->form_validation->set_message('required', '%s Harus diisi!');
      $this->form_validation->set_message('min_length', '{field} harus diisi minimal {param} karakter.');
      // error delimiters
      $this->form_validation->set_error_delimiters('<span class="text-red small">', '</span>');
   }

   function username_check()
   {
      $post    = $this->input->post(null, TRUE);
      $query   = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
      if ($query->num_rows() > 0) {
         $this->form_validation->set_message('username_check', '%s sudah ada di database, silahkan pilih username lain.');
         return FALSE;
      } else {
         return TRUE;
      }
   }

   public function add()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $data = [
            'aktif'  => 'user',
            'menu'   => 'user',
         ];
         $this->template->load('template', 'user/user_form_add', $data);
      } else {
         $post = $this->input->post(null, TRUE);
         $this->user_model->add($post);

         if ($this->db->affected_rows() > 0) {
            pesan_alert('Ditambahkan', 'user');
         }
      }
   }

   public function edit($id)
   {
      $this->_rulesEdit();

      if ($this->form_validation->run() == FALSE) {
         $query = $this->user_model->get($id);
         if ($query->num_rows() > 0) {
            $data = [
               'row'    => $query->row(),
               'aktif'  => 'user',
               'menu'   => 'user',
            ];
            $this->template->load('template', 'user/user_form_edit', $data);
         } else {
            pesan_alert('danger', 'Data user tidak ditemukan', 'user');
         }
      } else {
         $post = $this->input->post(null, TRUE);
         $this->user_model->edit($post);
         if ($this->db->affected_rows() > 0) {
            pesan_alert('Diupdate', 'user');
         }
      }
   }

   public function delete($id)
   {
      $where = ['user_id' => $id];
      $this->user_model->delete($where, 'user');
      pesan_alert('Dihapus', 'user');
   }
}
