<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('supplier_model');
      cek_not_login();
   }

   public function index()
   {
      $data = [
         'row'    => $this->supplier_model->get()->result_array(),
         'aktif'  => 'supplier',
         'menu'   => 'supplier',
      ];
      $this->template->load('template', 'Supplier/supplier_data', $data);
   }

   public function add()
   {
      $supplier = new stdClass();
      $supplier->supplier_id = null;
      $supplier->name = null;
      $supplier->phone = null;
      $supplier->address = null;
      $supplier->description = null;
      $data = [
         'aktif'  => 'supplier',
         'menu'   => 'supplier',
         'page'   => 'add',
         'row'    => $supplier
      ];
      $this->template->load('template', 'Supplier/supplier_form', $data);
   }

   public function edit($id)
   {
      $query = $this->supplier_model->get($id);
      if ($query->num_rows() > 0) {
         $supplier = $query->row();
         $data = [
            'aktif'  => 'supplier',
            'menu'   => 'supplier',
            'page'   => 'edit',
            'row'    => $supplier
         ];
         $this->template->load('template', 'Supplier/supplier_form', $data);
      } else {
         pesan_error('Tidak Ditemukan', 'supplier');
      }
   }

   public function process()
   {
      $post = $this->input->post(null, TRUE);

      if (isset($_POST['add'])) {
         $this->supplier_model->add($post);
         pesan_alert('Ditambahkan', 'supplier');
      } else if (isset($_POST['edit'])) {
         $this->supplier_model->edit($post);
         pesan_alert('Diupdate', 'supplier');
      }
   }

   public function delete($id)
   {
      $where = ['supplier_id' => $id];
      $this->supplier_model->delete($where, 'supplier');
      $error = $this->db->error();
      if ($error['code'] != 0) {
         pesan_error('Data Supplier tidak dapat dihapus karena sudah berelasi', 'supplier');
      } else {
         pesan_alert('Data Supplier Berhasil dihapus', 'supplier');
      }
   }
}
