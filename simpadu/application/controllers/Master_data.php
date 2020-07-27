<?php
class Master_data extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('model_user');
    $this->load->model('model_penduduk');
  }

  function index(){
    $this->load->view('login');
  }

  public function data_penduduk(){
      $data['penduduks']= $this->model_penduduk->get_all_penduduk();

      $this->load->view('header');
      $this->load->view('data_penduduk', $data);
      $this->load->view('footer');

  }

  public function add_penduduk(){
      
      $data = array(
        'penduduk_nokk' => $this->input->post('penduduk_nokk'),
        'penduduk_nik' => $this->input->post('penduduk_nik'),
        'penduduk_nama' => $this->input->post('penduduk_nama'),
        'penduduk_jk' => $this->input->post('penduduk_jk'),
        'penduduk_alamat' => $this->input->post('penduduk_alamat'),
        'penduduk_kelahiran' => $this->input->post('penduduk_kelahiran'),
        'penduduk_birthday' => $this->input->post('penduduk_birthday'),
        'penduduk_agama' => $this->input->post('penduduk_agama'),
        'penduduk_pendidikan' => $this->input->post('penduduk_pendidikan'),
        'penduduk_pekerjaan' => $this->input->post('penduduk_pekerjaan'),
        'penduduk_status' => $this->input->post('penduduk_status'),
        'penduduk_status_keluarga' => $this->input->post('penduduk_status-keluarga')
      );

      $insert = $this->model_penduduk->save($data);
      echo json_encode(array("status" => TRUE));
    
  }

  public function delete_penduduk($id){
    $delete = $this->model_penduduk->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

  public function edit_penduduk($id){
    $data = $this->model_penduduk->get_by_id($id);
    echo json_encode($data);
  }

  public function update_penduduk(){
    $data = array(
        'penduduk_nokk' => $this->input->post('penduduk_nokk'),
        'penduduk_nik' => $this->input->post('penduduk_nik'),
        'penduduk_nama' => $this->input->post('penduduk_nama'),
        'penduduk_jk' => $this->input->post('penduduk_jk'),
        'penduduk_alamat' => $this->input->post('penduduk_alamat'),
        'penduduk_kelahiran' => $this->input->post('penduduk_kelahiran'),
        'penduduk_birthday' => $this->input->post('penduduk_birthday'),
        'penduduk_agama' => $this->input->post('penduduk_agama'),
        'penduduk_pendidikan' => $this->input->post('penduduk_pendidikan'),
        'penduduk_pekerjaan' => $this->input->post('penduduk_pekerjaan'),
        'penduduk_status' => $this->input->post('penduduk_status'),
        'penduduk_status_keluarga' => $this->input->post('penduduk_status_keluarga')
      );

      $update = $this->model_penduduk->update(array('penduduk_id' => $this->input->post('penduduk_id')), $data);
      echo json_encode(array("status" => TRUE));
  }

}
