<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model(['stock_model', 'supplier_model', 'item_model']);
      cek_not_login();
   }

   public function stock_in_data()
   {
      $data = [
         'row'    => $this->stock_model->get_stock_in()->result_array(),
         'aktif'  => 'stock_in',
         'menu'   => 'Stok In',
      ];
      $this->template->load('template', 'Transaction/Stock_in/stock_in_data', $data);
   }

   public function stock_in_add()
   {
      $data = [
         'item'      => $this->item_model->get()->result_array(),
         'supplier'  => $this->supplier_model->get()->result_array(),
         'aktif'     => 'stock_in',
         'menu'      => 'Stok In',
         'page'      => 'in_add',
      ];
      $this->template->load('template', 'Transaction/Stock_in/stock_in_form', $data);
   }

   public function stock_in_delete()
   {
      $stock_id   = $this->uri->segment(4);
      $item_id    = $this->uri->segment(5);
      $qty        = $this->stock_model->get($stock_id)->row()->qty;
      $stock_out  = ['qty' => $qty, 'item_id' => $item_id];

      $this->item_model->update_stock_out($stock_out);
      $this->stock_model->delete($stock_id);
      pesan_alert('Dihapus', 'stock/in');
   }

   public function stock_out_data()
   {
      $data = [
         'row'    => $this->stock_model->get_stock_out()->result_array(),
         'aktif'  => 'stock_out',
         'menu'   => 'Stok Out',
      ];
      $this->template->load('template', 'Transaction/Stock_out/stock_out_data', $data);
   }

   public function stock_out_add()
   {
      $data = [
         'item'      => $this->item_model->get()->result_array(),
         'aktif'     => 'stock_out',
         'menu'      => 'Stok Out',
         'page'      => 'out_add',
      ];
      $this->template->load('template', 'Transaction/Stock_out/stock_out_form', $data);
   }

   public function stock_out_delete()
   {
      $stock_id   = $this->uri->segment(4);
      $item_id    = $this->uri->segment(5);
      $qty        = $this->stock_model->get($stock_id)->row()->qty;
      $stock_out  = ['qty' => $qty, 'item_id' => $item_id];

      $this->item_model->update_stock_in($stock_out);
      $this->stock_model->delete($stock_id);
      pesan_alert('Dihapus', 'stock/out');
   }

   public function process()
   {
      $post = $this->input->post(null, TRUE);

      if (isset($_POST['in_add'])) {
         $this->stock_model->add_stock_in($post);
         $this->item_model->update_stock_in($post);
         pesan_alert('Ditambahkan', 'stock/in');
      } else if (isset($_POST['out_add'])) {
         $this->stock_model->add_stock_out($post);
         $this->item_model->update_stock_out($post);
         pesan_alert('Ditambahkan', 'stock/out');
      }
   }
}
