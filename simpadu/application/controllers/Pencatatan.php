<?php
class Pencatatan extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('model_user');
    $this->load->model('model_penduduk');
    $this->load->model('model_pencatatan');
  }

  public function pencatatan_kelahiran(){
      $data['kelahirans']= $this->model_pencatatan->get_all_kelahiran();

      $this->load->view('header');
      $this->load->view('data_p_kelahiran', $data);
      $this->load->view('footer');

  }

  public function add_kelahiran(){
    $data = array(
      'kelahiran_nama' => $this->input->post('kelahiran_nama'),
      'kelahiran_jk' => $this->input->post('kelahiran_jk'),
      'kelahiran_orangtua' => $this->input->post('kelahiran_orangtua'),
      'kelahiran_alamat' => $this->input->post('kelahiran_alamat'),
      'kelahiran_date' => $this->input->post('kelahiran_date'),
      'kelahiran_keterangan' => $this->input->post('kelahiran_keterangan')
    );

    $insert = $this->model_pencatatan->save_kelahiran($data);
    echo json_encode(array("status" => TRUE));
  }

  public function edit_kelahiran($id){
    $data = $this->model_pencatatan->kelahiran_by_id($id);
    echo json_encode($data);
  }

  public function update_kelahiran(){
    $data = array(
      'kelahiran_nama' => $this->input->post('kelahiran_nama'),
      'kelahiran_jk' => $this->input->post('kelahiran_jk'),
      'kelahiran_orangtua' => $this->input->post('kelahiran_orangtua'),
      'kelahiran_alamat' => $this->input->post('kelahiran_alamat'),
      'kelahiran_date' => $this->input->post('kelahiran_date'),
      'kelahiran_keterangan' => $this->input->post('kelahiran_keterangan')
    );
    
    $update = $this->model_pencatatan->update_kelahiran(array('kelahiran_id' => $this->input->post('kelahiran_id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function delete_kelahiran($id){
    $delete = $this->model_pencatatan->delete_kelahiran_by_id($id);
    echo json_encode(array("status" => TRUE));
  }


  public function pencatatan_kematian(){
    $data['kematians']= $this->model_pencatatan->get_all_kematian();

    $this->load->view('header');
    $this->load->view('data_p_kematian', $data);
    $this->load->view('footer');

  }

  public function add_kematian(){
    $data = array(
      'kematian_nama' => $this->input->post('kematian_nama'),
      'kematian_umur' => $this->input->post('kematian_umur'),
      'kematian_alasan' => $this->input->post('kematian_alasan'),
      'kematian_alamat' => $this->input->post('kematian_alamat'),
      'kematian_date' => $this->input->post('kematian_date'),
      'kematian_keterangan' => $this->input->post('kematian_keterangan')
    );

    $insert = $this->model_pencatatan->save_kematian($data);
    echo json_encode(array("status" => TRUE));
  }

  public function edit_kematian($id){
    $data = $this->model_pencatatan->kematian_by_id($id);
    echo json_encode($data);
  }

  public function update_kematian(){
    $data = array(
      'kematian_nama' => $this->input->post('kematian_nama'),
      'kematian_umur' => $this->input->post('kematian_umur'),
      'kematian_alasan' => $this->input->post('kematian_alasan'),
      'kematian_alamat' => $this->input->post('kematian_alamat'),
      'kematian_date' => $this->input->post('kematian_date'),
      'kematian_keterangan' => $this->input->post('kematian_keterangan')
    );
    
    $update = $this->model_pencatatan->update_kematian(array('kematian_id' => $this->input->post('kematian_id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function delete_kematian($id){
    $delete = $this->model_pencatatan->delete_kematian_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

  public function pencatatan_mutasi(){
    $data['mutasis']= $this->model_pencatatan->get_all_mutasi();

    $this->load->view('header');
    $this->load->view('data_p_mutasi', $data);
    $this->load->view('footer');

  }

  public function add_mutasi(){
    $data = array(
      'mutasi_nama' => $this->input->post('mutasi_nama'),
      'mutasi_kelahiran' => $this->input->post('mutasi_kelahiran'),
      'mutasi_birthday' => $this->input->post('mutasi_birthday'),
      'mutasi_jk' => $this->input->post('mutasi_jk'),
      'mutasi_kewarganegaraan' => $this->input->post('mutasi_kewarganegaraan'),
      'mutasi_asal' => $this->input->post('mutasi_asal'),
      'mutasi_tujuan' => $this->input->post('mutasi_tujuan'),
      'mutasi_date' => $this->input->post('mutasi_date'),
      'mutasi_keterangan' => $this->input->post('mutasi_keterangan')
    );

    $insert = $this->model_pencatatan->save_mutasi($data);
    echo json_encode(array("status" => TRUE));
  }

  public function edit_mutasi($id){
    $data = $this->model_pencatatan->mutasi_by_id($id);
    echo json_encode($data);
  }

  public function update_mutasi(){
    $data = array(
      'mutasi_nama' => $this->input->post('mutasi_nama'),
      'mutasi_kelahiran' => $this->input->post('mutasi_kelahiran'),
      'mutasi_birthday' => $this->input->post('mutasi_birthday'),
      'mutasi_jk' => $this->input->post('mutasi_jk'),
      'mutasi_kewarganegaraan' => $this->input->post('mutasi_kewarganegaraan'),
      'mutasi_asal' => $this->input->post('mutasi_asal'),
      'mutasi_tujuan' => $this->input->post('mutasi_tujuan'),
      'mutasi_date' => $this->input->post('mutasi_date'),
      'mutasi_keterangan' => $this->input->post('mutasi_keterangan')
    );
    
    $update = $this->model_pencatatan->update_mutasi(array('mutasi_id' => $this->input->post('mutasi_id')), $data);
    echo json_encode(array("status" => TRUE));
  }

  public function delete_mutasi($id){
    $delete = $this->model_pencatatan->delete_mutasi_by_id($id);
    echo json_encode(array("status" => TRUE));
  }




}
