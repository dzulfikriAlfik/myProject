<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('unit_model');
      cek_not_login();
   }

   public function index()
   {
      $data = [
         'row'    => $this->unit_model->get()->result_array(),
         'aktif'  => 'unit',
         'menu'   => 'unit',
      ];
      $this->template->load('template', 'Product/Unit/unit_data', $data);
   }

   public function add()
   {
      $unit = new stdClass();
      $unit->unit_id = null;
      $unit->name = null;
      $data = [
         'aktif'  => 'unit',
         'menu'   => 'unit',
         'page'   => 'add',
         'row'    => $unit
      ];
      $this->template->load('template', 'Product/Unit/unit_form', $data);
   }

   public function edit($id)
   {
      $query = $this->unit_model->get($id);
      if ($query->num_rows() > 0) {
         $unit = $query->row();
         $data = [
            'aktif'  => 'unit',
            'menu'   => 'unit',
            'page'   => 'edit',
            'row'    => $unit
         ];
         $this->template->load('template', 'Product/Unit/unit_form', $data);
      } else {
         pesan_error('Data unit tidak ditemukan', 'unit');
      }
   }

   public function process()
   {
      $post = $this->input->post(null, TRUE);

      if (isset($_POST['add'])) {
         $this->unit_model->add($post);
         pesan_alert('Ditambahkan', 'unit');
      } else if (isset($_POST['edit'])) {
         $this->unit_model->edit($post);
         pesan_alert('Diupdate', 'unit');
      }
   }

   public function delete($id)
   {
      $where = ['unit_id' => $id];
      $this->unit_model->delete($where, 'p_unit');
      pesan_alert('Dihapus', 'unit');
   }
}
