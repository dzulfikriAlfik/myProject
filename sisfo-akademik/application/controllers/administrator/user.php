<?php

class User extends CI_Controller
{
   public function index()
   {
      $data['user'] = $this->user_model->tampil_data('user')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/daftar_user', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function tambah_user()
   {
      $data = [
         'username'  => set_value('username'),
         'password'  => set_value('password'),
         'email'     => set_value('email'),
         'level'     => set_value('level'),
         'blokir'    => set_value('blokir'),
      ];

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/user_form', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username harus diisi']);
      $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password harus diisi']);
      $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email harus diisi']);
      $this->form_validation->set_rules('level', 'Level', 'required', ['required' => 'Level harus diisi']);
      $this->form_validation->set_rules('blokir', 'Blokir', 'required', ['required' => 'Blokir harus diisi']);
   }

   public function tambah_user_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah_user();
      } else {
         $data = [
            'username'     => $this->input->post('username', TRUE),
            'password'     => MD5($this->input->post('password', TRUE)),
            'email'        => $this->input->post('email', TRUE),
            'level'        => $this->input->post('level', TRUE),
            'blokir'       => $this->input->post('blokir', TRUE),
            'id_sessions'  => MD5($this->input->post('id_sessions', TRUE)),
         ];

         $this->user_model->insert_data($data, 'user');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data user berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/user');
      }
   }

   public function update($id)
   {
      $where = ['id' => $id];

      $data['user'] = $this->user_model->edit_data($where, 'user')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/user_update', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update_aksi()
   {
      $id = $this->input->post('id');
      $data = [
         'username'     => $this->input->post('username', TRUE),
         'password'     => MD5($this->input->post('password', TRUE)),
         'email'        => $this->input->post('email', TRUE),
         'level'        => $this->input->post('level', TRUE),
         'blokir'       => $this->input->post('blokir', TRUE)
      ];

      $where = ['id' => $id];

      $this->user_model->update_data($where, $data, 'user');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data user berhasil diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/user');
   }

   public function delete($id)
   {
      $where = ['id' => $id];
      $this->user_model->hapus_data($where, 'user');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data user berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/user');
   }
}
