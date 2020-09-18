<?php

class Dosen extends CI_Controller
{

   public function index()
   {
      $data['dosen'] = $this->dosen_model->tampil_data('dosen')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/dosen', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function detail($id)
   {
      $data['detail'] = $this->dosen_model->ambil_id_dosen($id);

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/dosen_detail', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function tambah_dosen()
   {
      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/dosen_form');
      $this->load->view('templates_administrator/footer');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('nidn', 'NIDN', 'required', [
         'required' => 'NIDN harus diisi'
      ]);
      $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required', [
         'required' => 'Nama Dosen harus diisi'
      ]);
      $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
         'required' => 'Alamat harus diisi'
      ]);
      $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
         'required' => 'Jenis Kelamin harus diisi'
      ]);
      $this->form_validation->set_rules('email', 'Email', 'required', [
         'required' => 'Email harus diisi'
      ]);
      $this->form_validation->set_rules('telp', 'Telepon', 'required', [
         'required' => 'Telepon harus diisi'
      ]);
      if (empty($_FILES['photo']['name'])) {
         $this->form_validation->set_rules('photo', 'photo', 'required', [
            'required'  => 'Foto wajib diisi!'
         ]);
      }
   }

   public function tambah_dosen_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah_dosen();
      } else {
         $nidn          = $this->input->post('nidn');
         $nama_dosen    = $this->input->post('nama_dosen');
         $alamat        = $this->input->post('alamat');
         $jenis_kelamin = $this->input->post('jenis_kelamin');
         $email         = $this->input->post('email');
         $telp          = $this->input->post('telp');
         $photo         = $_FILES['photo']['name'];

         if ($photo = '') {
            // 
         } else {
            $config['upload_path'] = './assets/uploads/img/';
            $config['allowed_types'] = 'jpg|png|gif|tiff';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
               echo "Gagal Upload!";
               die();
            } else {
               $photo = $this->upload->data('file_name');
            }
         }

         $data = [
            'nidn'            => $nidn,
            'nama_dosen'      => $nama_dosen,
            'alamat'          => $alamat,
            'jenis_kelamin'   => $jenis_kelamin,
            'email'           => $email,
            'telp'            => $telp,
            'photo'           => $photo
         ];

         $this->dosen_model->insert_data($data, 'dosen');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data dosen berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/dosen');
      }
   }

   public function update($id)
   {
      $where = ['nidn' => $id];

      $data['dosen'] = $this->dosen_model->ambil_id_dosen($id);

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/dosen_update', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update_dosen_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->update($this->input->post('id_dosen'));
      } else {
         $id            = $this->input->post('id_dosen');
         $nidn          = $this->input->post('nidn');
         $nama_dosen    = $this->input->post('nama_dosen');
         $alamat        = $this->input->post('alamat');
         $jenis_kelamin = $this->input->post('jenis_kelamin');
         $email         = $this->input->post('email');
         $telp          = $this->input->post('telp');
         $photo         = $_FILES['photo']['name'];

         if ($photo = '') {
            // 
         } else {
            $config['upload_path'] = './assets/uploads/img/';
            $config['allowed_types'] = 'jpg|png|gif|tiff';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data dosen gagal diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('administrator/dosen');
               die();
            } else {
               $photo = $this->upload->data('file_name');
               $this->db->set('photo', $photo);
            }
         }

         $data = [
            'nidn'            => $nidn,
            'nama_dosen'      => $nama_dosen,
            'alamat'          => $alamat,
            'jenis_kelamin'   => $jenis_kelamin,
            'email'           => $email,
            'telp'            => $telp,
            'photo'           => $photo
         ];

         $where = ['id_dosen' => $id];

         $this->dosen_model->update_data($where, $data, 'dosen');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data dosen berhasil diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/dosen');
      }
   }

   public function delete($id)
   {
      $where = ['nidn' => $id];
      $this->dosen_model->hapus_data($where, 'dosen');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data dosen berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/dosen');
   }
}
