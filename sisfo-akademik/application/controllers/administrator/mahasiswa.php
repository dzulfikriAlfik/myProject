<?php

class Mahasiswa extends CI_Controller
{

   public function index()
   {
      $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/mahasiswa', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function detail($id)
   {
      $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/mahasiswa_detail', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function tambah_mahasiswa()
   {
      $data = [
         'mahasiswa' => $this->mahasiswa_model->tampil_data('mahasiswa')->result(),
         'prodi'     => $this->mahasiswa_model->tampil_data('prodi')->result()
      ];

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/mahasiswa_form', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function _rules()
   {
      $this->form_validation->set_rules('nim', 'NIM', 'required', [
         'required' => 'NIM harus diisi'
      ]);
      $this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'required', [
         'required' => 'Nama lengkap harus diisi'
      ]);
      $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
         'required' => 'Alamat harus diisi'
      ]);
      $this->form_validation->set_rules('email', 'Email', 'required', [
         'required' => 'Email harus diisi'
      ]);
      $this->form_validation->set_rules('telepon', 'Telepon', 'required', [
         'required' => 'Telepon harus diisi'
      ]);
      $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
         'required' => 'Tempat Lahir harus diisi'
      ]);
      $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
         'required' => 'Tanggal Lahir harus diisi'
      ]);
      $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
         'required' => 'Jenis Kelamin harus diisi'
      ]);
      $this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required', [
         'required' => 'Nama prodi harus diisi'
      ]);
      if (empty($_FILES['photo']['name'])) {
         $this->form_validation->set_rules('photo', 'photo', 'required', [
            'required'  => 'Foto wajib diisi!'
         ]);
      }
   }

   public function tambah_mahasiswa_aksi()
   {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->tambah_mahasiswa();
      } else {
         $nim           = $this->input->post('nim');
         $nama_lengkap  = $this->input->post('nama_lengkap');
         $alamat        = $this->input->post('alamat');
         $email         = $this->input->post('email');
         $telepon       = $this->input->post('telepon');
         $tempat_lahir  = $this->input->post('tempat_lahir');
         $tanggal_lahir = $this->input->post('tanggal_lahir');
         $jenis_kelamin = $this->input->post('jenis_kelamin');
         $nama_prodi    = $this->input->post('nama_prodi');
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
            'nim'             => $nim,
            'nama_lengkap'    => $nama_lengkap,
            'alamat'          => $alamat,
            'email'           => $email,
            'telepon'         => $telepon,
            'tempat_lahir'    => $tempat_lahir,
            'tanggal_lahir'   => $tanggal_lahir,
            'jenis_kelamin'   => $jenis_kelamin,
            'nama_prodi'      => $nama_prodi,
            'photo'           => $photo
         ];

         $this->mahasiswa_model->insert_data($data, 'mahasiswa');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data mahasiswa berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/mahasiswa');
      }
   }

   public function update($id)
   {
      $where = ['id_mahasiswa' => $id];

      $data = [
         'mahasiswa' => $this->db->query("SELECT * FROM mahasiswa mhs, prodi prd WHERE mhs.nama_prodi = prd.nama_prodi AND mhs.id_mahasiswa = '$id'")->result(),
         'prodi'     => $this->matakuliah_model->tampil_data('prodi')->result(),
         'detail'    => $this->mahasiswa_model->ambil_id_mahasiswa($id)
      ];

      $this->load->view('templates_administrator/header');
      $this->load->view('templates_administrator/sidebar');
      $this->load->view('administrator/mahasiswa_update', $data);
      $this->load->view('templates_administrator/footer');
   }

   public function update_mahasiswa_aksi()
   {
      $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $this->input->get('id')])->row_array();
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
         $this->update($this->input->post('id_mahasiswa'));
      } else {
         $id            = $this->input->post('id_mahasiswa');
         $nim           = $this->input->post('nim');
         $nama_lengkap  = $this->input->post('nama_lengkap');
         $alamat        = $this->input->post('alamat');
         $email         = $this->input->post('email');
         $telepon       = $this->input->post('telepon');
         $tempat_lahir  = $this->input->post('tempat_lahir');
         $tanggal_lahir = $this->input->post('tanggal_lahir');
         $jenis_kelamin = $this->input->post('jenis_kelamin');
         $nama_prodi    = $this->input->post('nama_prodi');
         $photo         = $_FILES['photo']['name'];

         if ($photo = '') {
            // 
         } else {
            $config['upload_path'] = './assets/uploads/img/';
            $config['allowed_types'] = 'jpg|png|gif|tiff';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data mahasiswa gagal diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('administrator/mahasiswa');
               die();
            } else {
               $old_photo = $data['mahasiswa']['photo'];
               unlink(FCPATH . 'assets/uploads/img/' . $old_photo);
               $photo = $this->upload->data('file_name');
               $this->db->set('photo', $photo);
            }
         }

         $data = [
            'nim'             => $nim,
            'nama_lengkap'    => $nama_lengkap,
            'alamat'          => $alamat,
            'email'           => $email,
            'telepon'         => $telepon,
            'tempat_lahir'    => $tempat_lahir,
            'tanggal_lahir'   => $tanggal_lahir,
            'jenis_kelamin'   => $jenis_kelamin,
            'nama_prodi'      => $nama_prodi,
            'photo'           => $photo
         ];

         $where = ['id_mahasiswa' => $id];

         $this->mahasiswa_model->update_data($where, $data, 'mahasiswa');
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data mahasiswa berhasil diupdate<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('administrator/mahasiswa');
      }
   }

   public function delete($id)
   {
      $where = ['id_mahasiswa' => $id];
      $this->mahasiswa_model->hapus_data($where, 'mahasiswa');
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data mahasiswa berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('administrator/mahasiswa');
   }
}
