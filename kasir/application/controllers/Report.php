<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('sales_model', 'sales');
      cek_not_login();
   }

   public function sales()
   {
      $data = [
         'aktif'     => 'report sales',
         'menu'      => 'report sales',
         'row'       => $this->sales->get_sales()->result()
      ];
      $this->template->load('template', 'Report/sales_report', $data);
   }

   public function sales_product($sales_id = null)
   {
      $detail = $this->sales->get_sales_detail($sales_id)->result();
      echo json_encode($detail);
   }

   public function stock()
   {
      $data = [
         'aktif'     => 'report stock',
         'menu'      => 'report stock',
      ];
      $this->template->load('template', 'Report/stock_report', $data);
   }
}
