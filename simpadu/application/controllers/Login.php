<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('model_user');
  }

  function index(){
    $this->load->view('login');
  }

  function auth(){
    $email    = $this->input->post('username',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->model_user->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $user_id = $data['user_id'];
        $name  = $data['user_nama'];
        $sesdata = array(
            'user_id'  => $user_id,
            'nama'     => $name,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($user_id > 0){
            redirect(base_url().'dashboard');
        };
    }else{
        echo $this->session->set_flashdata('msg','Informasi yang dimasukan salah !');
        redirect(base_url());
    }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

}
