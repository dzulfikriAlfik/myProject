<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('category_model');
      cek_not_login();
   }

   public function index()
   {
      $data = [
         'row'    => $this->category_model->get()->result_array(),
         'aktif'  => 'category',
         'menu'   => 'category',
      ];
      $this->template->load('template', 'Product/Category/category_data', $data);
   }

   public function add()
   {
      $category = new stdClass();
      $category->category_id = null;
      $category->name = null;
      $data = [
         'aktif'  => 'category',
         'menu'   => 'category',
         'page'   => 'add',
         'row'    => $category
      ];
      $this->template->load('template', 'Product/Category/category_form', $data);
   }

   public function edit($id)
   {
      $query = $this->category_model->get($id);
      if ($query->num_rows() > 0) {
         $category = $query->row();
         $data = [
            'aktif'  => 'category',
            'menu'   => 'category',
            'page'   => 'edit',
            'row'    => $category
         ];
         $this->template->load('template', 'Product/Category/category_form', $data);
      } else {
         pesan_error('Data category tidak ditemukan', 'category');
      }
   }

   public function process()
   {
      $post = $this->input->post(null, TRUE);

      if (isset($_POST['add'])) {
         $this->category_model->add($post);
         pesan_alert('Ditambahkan', 'category');
      } else if (isset($_POST['edit'])) {
         $this->category_model->edit($post);
         pesan_alert('Diupdate', 'category');
      }
   }

   public function delete($id)
   {
      $where = ['category_id' => $id];
      $this->category_model->delete($where, 'p_category');
      pesan_alert('Dihapus', 'category');
   }
}
