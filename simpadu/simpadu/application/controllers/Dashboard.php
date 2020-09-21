<?php
class Dashboard extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('model_user');
  }

  function index(){
    $this->load->view('header');
    $this->load->view('dashboard');
    $this->load->view('footer');
  }

  

}
